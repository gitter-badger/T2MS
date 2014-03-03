<?php
App::uses('AppController', 'Controller');



class SmsController extends AppController{

	
	public function index() {
		$this->loadModel('Customer');
		if($this->request->is('get')&&$this->request->query!=null){
			$this->Customer->create();
			$data = array("Customer"=>array("phone" => $this->request->query['phone'], "name" => $this->request->query['text'],
			"blacklisted"=>0,"maxFare" => 60));

			if ($this->Customer->save($data)) {
				
				$this->Session->setFlash(__('The SMS has been processed.'));
				$this->request->query=null;
				//return $this->redirect(array('action' => 'index','query'=>array()));
			} else {
				$this->Session->setFlash(__( 'The SMS could not be processed. Please, try again.'));
			}
			//echo(json_encode($this->request));
		}
	}

}

?>