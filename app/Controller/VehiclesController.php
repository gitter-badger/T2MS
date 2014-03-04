<?php
App::uses('AppController', 'Controller');
/**
 * Vehicles Controller
 *
 * @property Vehicle $Vehicle
 * @property PaginatorComponent $Paginator
 */
class VehiclesController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->loadModel('Owner');
		$this->Vehicle->recursive = 0;
		
		//paginate
		$this->paginate = array('limit' => 40);
		$vehicles=$this->Paginator->paginate();
		
		//get owners and add ownerdetails to vehicle
		$owners=$this->Owner->getOwnerList();
		foreach($vehicles as $key => $vehicle){
			$vehicles[$key]['Vehicle']['ownerDetails']=$owners[$vehicles[$key]['Vehicle']['ownerID']];
		}

		$this->set('vehicles', $vehicles);
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
	
		//search for vehicle
		if (!$this->Vehicle->exists($id)) {
			throw new NotFoundException(__('Invalid vehicle'));
		}
		
		//get vehicle
		$options = array('conditions' => array('Vehicle.' . $this->Vehicle->primaryKey => $id));
		$vehicle=$this->Vehicle->find('first', $options);
		
		//get owner list
		$this->loadModel('Owner');
		$owner=$this->Owner->findById($vehicle['Vehicle']['ownerID']);
		
		//add owner details to the vehicle array
		$vehicle['Vehicle']['ownerName']=$owner['Owner']['name'];
		$vehicle['Vehicle']['ownerContact']=$owner['Owner']['contact'];
		
		$this->set('vehicle', $vehicle);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
	
		$this->loadModel('Owner');
		$this->set('owners',$this->Owner->getOwnerList());
		
		if ($this->request->is('post')) {
			
			$this->Vehicle->create();
			if ($this->Vehicle->save($this->request->data)) {
				$this->Session->setFlash(__('The vehicle has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vehicle could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->loadModel('Owner');
		$this->set('owners',$this->Owner->getOwnerList());
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
			$options = array('conditions' => array('Vehicle.' . $this->Vehicle->primaryKey => $id));
			$this->request->data = $this->Vehicle->find('first', $options);
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		$this->loadModel('Owner');
		$this->set('owners',$this->Owner->getOwnerList());
		if (!$this->Vehicle->exists()) {
			throw new NotFoundException(__('Invalid vehicle'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Vehicle->delete()) {
			$this->Session->setFlash(__('The vehicle has been deleted.'));
		} else {
			$this->Session->setFlash(__('The vehicle could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function search(){
		$this->loadModel('Owner');
		$this->set('owners',$this->Owner->getOwnerList());
	
	}
	
	}
