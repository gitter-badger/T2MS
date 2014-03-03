<?php
App::uses('AppController', 'Controller');



class SmsController extends AppController{


	public function index() {
		$this->loadModel('Customer');
		if($this->request->is('get')&&$this->request->query!=null){
			$this->Customer->create();
			/*$data = array("Customer"=>array("phone" => $this->request->data['Sms']['phone'], "name" => $this->request->data['Sms']['text'],
			"blacklisted"=>0,"maxFare" => 60));*/
            $message = $this->request->data['Sms']['text'];
            $phone = $this->request->data['Sms']['phone'];

            $this->decodeSms($message,$phone);

			/*if ($this->Customer->save($data)) {
				
				$this->Session->setFlash(__('The SMS has been processed.'));
				$this->request->query=null;
				//return $this->redirect(array('action' => 'index','query'=>array()));
			} else {
				$this->Session->setFlash(__( 'The SMS could not be processed. Please, try again.'));
			}
			//echo(json_encode($this->request));
			}*/
		}
	}

    private function decodeSms($message, $phone){
        echo($message);
    }

}

?>