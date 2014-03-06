<?php
App::uses('AppController', 'Controller');



class SmsController extends AppController{

    const TIMEZONE_OFFSET = 19800;

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
     *
     * combined messages can be send
     * e.g. REG <name> TRIP <start_location> TO <end_location> FARE <max_fare>
     *      SET LOCATION <location> FARE <fare_per_km>
     * @param $message
     * @param $phone
     */
    private function decodeSms($message, $phone){
        $maxFair = null;
        $tripMessage = null;
        $regMessage = null;
        $driverMessage[0] = $message;
        $tokenized[0] = $message;


        //customer message decode
        if(strpos($message,'FARE') !== false && strpos($message,'SET') === false){
            $tokenized = explode('FARE',$message,2);
            $maxFair = $tokenized[1];
        }
        if(strpos($message,'TRIP') !== false){
            $tokenized = explode('TRIP',$tokenized[0],2);
            $tripMessage = $tokenized[1];
        }
        if(strpos($message,'REG') !== false)
            $regMessage = $tokenized[0];

        //driver message decode
        if(strpos($message,'SET') !== false){
            if(strpos($message,'FARE') !== false){
                $driverMessage = explode('FARE',$message,2);
                $this->updateDriver($driverMessage[1],$phone);
            }
            if(strpos($message,'LOCATION') !== false){
                $driverMessage = explode('LOCATION',$driverMessage[0],2);
                $this->updateSession(null,$driverMessage[1],$phone);
            }
        }elseif(strpos($message,'OFF DUTY') !== false){
            $this->updateSession('OFF',null,$phone);
        }elseif(strpos($message,'ON DUTY') !== false){
            $this->updateSession('ON',null,$phone);
        }

        if($regMessage != null)
            $this->createCustomer($regMessage,$phone);
        if($tripMessage != null)
            $this->processTrip($tripMessage,$maxFair,$phone);
    }

    /**
     * Creates a new customer from the sms message and saves in the database
     * @param $regMessage
     * @param $phone
     */
    private function createCustomer($regMessage, $phone){
        $this->loadModel('Customer');

        if($this->Customer->findByPhone($phone) != null){
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
    private function processTrip($tripMessage, $maxFair, $phone){
        $tripMessage = explode('TO',$tripMessage,2);
        $startLocation = $tripMessage[0];
        $endLocation = $tripMessage[1];

        //send data to process trip
    }

    /**
     * Updates driver details
     * @param $fare
     * @param $phone
     */
    private function updateDriver($fare, $phone){
        $this->loadModel('Vehicle');
        $vehicles = $this->Vehicle->findByDriverContact($phone);

        /*if($location != null){
            $this->loadModel('Tag');
            $tags = $this->Tag->findByTag($location);

            if($tags != null){
                $locationID = $tags[0]['locality_id'];
            }
        }*/
        if($vehicles != null){
            $vehicle = $vehicles[0];
            if($fare != null){
                $vehicle['fare'] = $fare;
                $this->Vehicle->save($vehicle);
            }
        }

    }

    /**
     * Update session of the driver
     * @param $status
     * @param $location
     * @param $phone
     */
    private function updateSession($status, $location, $phone){
        $this->loadModel('Tuksession');
        $tukSession = $this->Tuksession->find('first',array('conditions'=>array('Vehicle.driverContact'=>$phone)));

        if($status == 'OFF'){
            $tukSession['Tuksession']['endTime'] = date('Y-m-d H:i:s',time()+self::TIMEZONE_OFFSET);
            $this->Tuksession->save($tukSession['Tuksession']);
        }

    }
}

?>