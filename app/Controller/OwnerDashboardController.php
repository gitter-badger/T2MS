<?php

class OwnerDashboardController extends AppController{
    public function beforeFilter(){

    }
    public function index() {
        if($this->getOwnerId()==null){
           
            return $this->redirect('/users/login');
        }
    }

    private function getOwnerId(){
        $id= $this->Session->read('userid');
        //$role = $this->Session->read('userrole');
        if($id!=null&&$id!='admin'){
            return $id;
        }
        return null;
    }
	
	public function listVehicles(){
		$id=$this->getOwnerId();
		if($id==null){
           
            return $this->redirect('/users/login');
        }
		
         
		$this->loadModel('Vehicle');
		$vehicles = $this->Vehicle->findAllByOwnerid($id);
		$this->set('vehicles',$vehicles);
		//$this->Session->setFlash('You are not logged inasdas');
	}
	
	public function add(){
		if ($this->request->is('post')) {
			$this->request->data['Vehicle']['ownerID']= $this->getOwnerId();
			$this->loadModel('Vehicle');
			
			$this->Vehicle->create();
			if ($this->Vehicle->save($this->request->data)) {
				$this->Session->setFlash(__('The vehicle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vehicle could not be saved. Please, try again.'));
			}
		}
	}
	
	public function view($id = null) {
		$this->loadModel('Vehicle');
		
		
		//get vehicle
		$options = array('conditions' => array('Vehicle.' . $this->Vehicle->primaryKey => $id, 'Vehicle.ownerID' => $this->getOwnerId()));
		$vehicle=$this->Vehicle->find('first', $options);
		
		//search for vehicle
		if ($vehicle == null) {
			$this->Session->setFlash(__('You are not authorized to view DAT vehicle.'));
			return $this->redirect(array('action' => 'listVehicles'));
		}
		//get owner list
		$this->loadModel('Owner');
		$owner=$this->Owner->findById($vehicle['Vehicle']['ownerID']);
		
		//add owner details to the vehicle array
		$vehicle['Vehicle']['ownerName']=$owner['Owner']['name'];
		$vehicle['Vehicle']['ownerContact']=$owner['Owner']['contact'];
		
		$this->set('vehicle', $vehicle);
	}
	
	public function edit($id = null) {
		$this->loadModel('Vehicle');

		//$this->loadModel('Owner');
		//$this->set('owners',$this->Owner->getOwnerList());
		if (!$this->Vehicle->exists($id)) {
			throw new NotFoundException(__('Invalid vehicle'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Vehicle->save($this->request->data)) {
				$this->Session->setFlash(__('The vehicle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vehicle could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Vehicle.' . $this->Vehicle->primaryKey => $id, 'Vehicle.ownerID' => $this->getOwnerId()));
			$this->request->data = $this->Vehicle->find('first', $options);
		}
	}
	
}

?>
