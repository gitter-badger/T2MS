<?php
App::uses('AppController', 'Controller');



class SmsController extends AppController{


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
     * Driver Session Update: ON DUTY or OFF DUTY
     *
     * combined messages can be send
     * @param $message
     * @param $phone
     */
    private function decodeSms($message, $phone){
        $maxFair = null;
        $tripMessage = null;
        $regMessage = null;
        $tokenized[0] = $message;

        if(strpos($message,'FARE') !== false){
            $tokenized = explode('FARE',$message,2);
            $maxFair = $tokenized[1];
        }
        if(strpos($message,'TRIP') !== false){
            $tokenized = explode('TRIP',$tokenized[0],2);
            $tripMessage = $tokenized[1];
        }
        if(strpos($message,'REG') !== false)
            $regMessage = $tokenized[0];

        if($regMessage != null)
            $this->createCustomer($regMessage,$phone);
        if($tripMessage != null)
            $this->tripHandler($tripMessage,$maxFair,$phone);
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
    private function tripHandler($tripMessage, $maxFair, $phone){
        $tripMessage = explode('TO',$tripMessage,2);
        $startLocation = $tripMessage[0];
        $endLocation = $tripMessage[1];

        //create a trip record. Database Table should be updated
    }
}

?>