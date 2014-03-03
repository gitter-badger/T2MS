<?php
App::uses('AppController', 'Controller');



class SmsController extends AppController{

	
	public function index() {
		$this->loadModel('Customer');
		if ($this->request->is('post')) {
			
			$this->Customer->create();
			$data = array("Customer"=>array("phone" => $this->request->data['Sms']['phone'], "name" => $this->request->data['Sms']['text'],
			"blacklisted"=>0,"maxFare" => 60));

			if ($this->Customer->save($data)) {
				
				$this->Session->setFlash(__('The SMS has been processed.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__( 'The SMS could not be processed. Please, try again.'));
			}
		}
	}

}

?>