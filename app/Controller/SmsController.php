<?php
App::uses('AppController', 'Controller');



class SmsController extends AppController{

    const TIMEZONE_OFFSET = 19800; //GMT+5.30

    public function index() {
        $this->loadModel('Customer');
        if($this->request->is('get')&&$this->request->query!=null){
            //$this->Customer->create();
            /*$data = array("Customer"=>array("phone" => $this->request->data['Sms']['phone'], "name" => $this->request->data['Sms']['text'],
            "blacklisted"=>0,"maxFare" => 60));*/

            /*if ($this->Customer->save($data)) {

                $this->Session->setFlash(__('The SMS has been processed.'));
                $this->request->query=null;
                //return $this->redirect(array('action' => 'index','query'=>array()));
            } else {
                $this->Session->setFlash(__( 'The SMS could not be processed. Please, try again.'));
            }*/
            //echo(json_encode($this->request->query));

            $phone = $this->request->query['phone'];
            $message = trim($this->request->query['text']);

            if(strchr($phone,'+') !== false)
                $phone = substr($phone,1);
            $this->decodeSms($message,$phone);
        }


    }

    /**
     * Decoding the sms message from the pre-defined message format
     * Customer Registration: REG <name>
     * Customer New Trip    : TRIP <start_location> TO <end_location> FARE <max_fare>
     * Driver Location      : SET LOCATION <location>
     * Driver Fare per Km   : SET FARE <fare_per_km>
     * Driver Session Update: ON DUTY or OFF DUTY
     * Trip data update     : DATA <amount>
     *
     * combined messages can be send
     * e.g. REG <name> TRIP <start_location> TO <end_location> FARE <max_fare>
     *      SET LOCATION <location> FARE <fare_per_km>
     * @param $message
     * @param $phone
     */
    private function decodeSms($message, $phone){
        $maxFare = null;
        $tripMessage = null;
        $regMessage = null;
        $driverMessage[0] = $message;
        $tokenized[0] = $message;


        //customer message decode
        if(strpos($message,'FARE') !== false && strpos($message,'SET') === false){
            $tokenized = explode('FARE',$message,2);
            $maxFare = $tokenized[1];
        }
        if(strpos($message,'TRIP') !== false){
            $tokenized = explode('TRIP',$tokenized[0],2);
            $tripMessage = $tokenized[1];
        }
        if(strpos($message,'REG') !== false){
            $regMessage = $tokenized[0];
        }

        if($regMessage != null)
            $this->createCustomer($regMessage,$phone);
        if($tripMessage != null){
            if($maxFare==null)
                $maxFare=100;
            $this->processTrip($tripMessage,$maxFare,$phone);
        }

        //driver message decode
        if(strpos($message,'SET') !== false){
            if(strpos($message,'FARE') !== false){
                $driverMessage = explode('FARE',$message,2);
                $this->updateDriver($driverMessage[1],$phone);
            }
            if(strpos($message,'LOCATION') !== false){
                $driverMessage = explode('LOCATION',$driverMessage[0],2);
                $this->updateSession(null,trim($driverMessage[1]),$phone);
            }
        }elseif(strpos($message,'OFF DUTY') !== false){
            $this->updateSession('OFF',null,$phone);
        }elseif(strpos($message,'ON DUTY') !== false){
            $this->updateSession('ON',null,$phone);
        }

        //trip data message decode
        if(strpos($message,'DATA')!== false){
            $message = substr($message,5);
            $this->updateTrip($message,$phone);
        }
    }

    /**
     * Creates a new customer from the sms message and saves in the database
     * @param $regMessage
     * @param $phone
     */
    private function createCustomer($regMessage, $phone){
        $this->loadModel('Customer');

        if($this->Customer->hasAny(array("phone" => $phone))){
            return;
        }else{
            $name = trim(substr($regMessage,strpos($regMessage,'REG')+3));
            $this->Customer->create();
            $customerData = array("Customer"=>array("phone" => $phone, "name" => $name));

            if($this->Customer->save($customerData))
                $this->Session->setFlash(__('The SMS has been processed.'));
            else
                $this->Session->setFlash(__( 'The SMS could not be processed. Please, try again.'));
        }

        return;
    }

    /**
     * Decode trip details from the message and create a new record for the database
     * @param $tripMessage
     * @param $maxFair
     * @param $phone
     */
    private function processTrip($tripMessage, $maxFare, $phone){
        $this->loadModel('Customer');
        $this->loadModel('Tag');
        $this->loadModel('Trip');

        $resultSet = $this->Customer->find('first',array(
                                           'conditions'=>array('Customer.phone'=>$phone),
                                           'recursive'=> -1)
                                          );
        if($resultSet['Customer']['blacklisted'] == 1){
            //customer is blacklisted. need to handle
            echo('BLACKLISTED');
            return;
        }
        $tripMessage = explode('TO',$tripMessage,2);

        $startLocation = trim($tripMessage[0]);
        $endLocation = trim($tripMessage[1]);

        $vehicle=$this->Customer->query(
            'SELECT * FROM
            (
                SELECT vehicleID,driverName,driverContact
                FROM tuksessions
                INNER JOIN tags ON tags.locality_id = tuksessions.localityID
               	INNER JOIN vehicles ON tuksessions.vehicleID=vehicles.id
                WHERE tag LIKE ?
                    AND endTime IS NULL
                    AND vehicles.fare <=?
                    AND vehicleID NOT
                    IN (
                        SELECT vehicleID
                        FROM trips
                        WHERE STATUS =1 OR STATUS =0
                    )

            ) AS t1
            LEFT OUTER JOIN (
                SELECT vehicleID, max( time ) as lastTrip
                FROM trips
                GROUP BY vehicleID
                )
            AS t2 ON t1.vehicleID = t2.vehicleID
            ORDER BY lastTrip ASC LIMIT 1',
            array($startLocation,$maxFare)
            );

        echo(json_encode($vehicle));

        $vehicleID=null;
        $startLocationId=null;
        $endLocationId=null;
        if($vehicle!=null)
            $vehicleID=$vehicle[0]['t1']['vehicleID'];
        $this->Tag->recursive = 1;
        $start=$this->Tag->find('first',array('conditions'=>array('Tag.tag LIKE '=>$startLocation)));
        $end=$this->Tag->find('first',array('conditions'=>array('Tag.tag LIKE '=>$endLocation)));
        if($start!=null)
            $startLocationId=$start['Locality']['id'];
        if($end!=null)
            $endLocationId=$end['Locality']['id'];
        $customerID=$resultSet['Customer']['id'];

        echo($startLocationId);
        echo($endLocationId);
        echo($vehicleID);
        echo($customerID);

        if($startLocationId!=null){
           // $this->Trip->create();
            if($vehicleID==null){
                $this->Trip->save(array('Trip'=>array('startLocation'=>$startLocationId,
                    'endLocation'=>$endLocationId,'vehicleID'=>$vehicleID,
                    'customerID'=>$customerID,'status'=>-1)));

            }
            if($vehicleID!=null){
                $this->Trip->save(array('Trip'=>array('startLocation'=>$startLocationId,
                    'endLocation'=>$endLocationId,'vehicleID'=>$vehicleID,
                    'customerID'=>$customerID,'status'=>0)));


                $customerMsg='T2MS Driver Name = '.$vehicle[0]['t1']['driverName'].'\n Driver Contact = '.$vehicle[0]['t1']['driverContact'];
                $driverMsg='T2MS Customer Name = '.$resultSet['Customer']['name'].'\n Customer Contact = '.$resultSet['Customer']['phone'];

                //Send a message to the customer
            //    $response = file_get_contents('http://localhost:9090/sendsms?phone='.$resultSet['Customer']['phone'].'&text='.$customerMsg);

                //Send a message to the driver
            //    $response = file_get_contents('http://localhost:9090/sendsms?phone='.$vehicle[0]['t1']['driverContact'].'&text='.$driverMsg);


            }

        }



        //send data to process trip
    }

    /**
     * Updates driver details
     * @param $fare
     * @param $phone
     */
    private function updateDriver($fare, $phone){
        $this->loadModel('Vehicle');
        //getting result set without join
        $resultSet = $this->Vehicle->find('first',array(
                                          'fields'=>array('Vehicle.id','Vehicle.fare'),
                                          'conditions'=>array('Vehicle.driverContact'=>$phone),
                                          'recursive'=> -1)
                                         );

        if($resultSet != null){
            if($fare != null){
                $resultSet['Vehicle']['fare'] = $fare;
                $this->Vehicle->id = $resultSet['Vehicle']['id'];
                $this->Vehicle->saveField('fare',$fare);
            }
        }

    }

    /**
     * Updates status of the session
     * status => OFF end current session, status => ON create a new session.
     * If a current session exists, by default it will be ended.
     *
     * Updates location of the driver.
     * When an location update is made, current session will be ended and a new
     * session will be created. By default the status will be => ON
     *
     * @param $status
     * @param $location
     * @param $phone
     */
    private function updateSession($status, $location, $phone){
        $this->loadModel('Tuksession');
        $currentTime = date('Y-m-d H:i:s',time()+self::TIMEZONE_OFFSET);

        $resultSet  = $this->Tuksession->find('first',array(
                                              'fields'=>array('Tuksession.vehicleID','Tuksession.localityID','Tuksession.endTime'),
                                              'conditions'=>array('Vehicle.driverContact'=>$phone, 'TukSession.endTime'=>null))
        );
        if($location == null){
            //if not a location update
            if($status == 'OFF'){
               if($resultSet != null){
                    $this->Tuksession->updateAll(array('endTime'=>"'".$currentTime."'"),
                                                 array('Vehicle.driverContact'=>$phone,'Tuksession.endTime'=>null)
                                                );
               }else{
                    //no active sessions
               }

            }elseif($status == 'ON'){
                if($resultSet != null){
                    //if last session is not ended, end it
                    $this->Tuksession->updateAll(array('endTime'=>"'".$currentTime."'"),
                                                 array('Vehicle.driverContact'=>$phone,'Tuksession.endTime'=>null)
                                                );
                }else{
                    //create a new session
                    $resultSet = $this->Tuksession->find('first',array(
                                                         'fields'=>array('Tuksession.vehicleID','Tuksession.localityID','Tuksession.startTime','Tuksession.endTime AS lastSession'),
                                                         'conditions'=>array('Vehicle.driverContact'=>$phone),
                                                         'order'=>array('lastSession DESC'),
                                                         'limit'=>1)
                                                        );
                    $resultSet['Tuksession']['startTime'] = $currentTime;
                    $resultSet['Tuksession']['endTime'] = null;

                    $this->Tuksession->save($resultSet);
                }
            }
        }else{
            //if a location update
            $this->loadModel('Tag');
            $localityID = $this->Tag->find('first',array('fields'=>array('Tag.locality_id'),'conditions'=>array('Tag.tag'=>$location),'recursive'=>-1));

            if($resultSet != null){
                //if last session is not ended, end it
                $this->Tuksession->updateAll(array('endTime'=>"'".$currentTime."'"),
                                             array('Vehicle.driverContact'=>$phone,'Tuksession.endTime'=>null)
                                            );
            }

            $resultSet = $this->Tuksession->find('first',array('fields'=>array('Tuksession.vehicleID'),'conditions'=>array('Vehicle.driverContact'=>$phone)));
            $newSession = array('Tuksession'=>array('vehicleID'=>$resultSet['Tuksession']['vehicleID'],
                                                    'localityID'=>$localityID['Tag']['locality_id'],
                                                    'startTime'=>$currentTime,
                                                    'endTime'=>null)
                                                   );
            $this->Tuksession->save($newSession);
        }

    }

    private function updateTrip($fare, $phone){
        $this->loadModel('Trip');
        $resultSet = $this->Trip->find('first',array(
                                       'fields'=>array('Trip.id','Trip.time','Trip.status'),
                                       'conditions'=>array('Vehicle.driverContact'=>$phone,'Trip.status'=>'ongoing'))
                                      );

        if($resultSet !== null){
            $this->Trip->updateAll(array('status'=>'\'FINISHED\'','fare'=>$fare),
                                   array('Vehicle.driverContact'=>$phone,'Trip.status'=>'ongoing')
                                  );
        }
    }
}

?>