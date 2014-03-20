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
    var $name = 'Vehicles';
    var $scaffold;
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$conditions=array();
		$title='Vehicles';
		
		if ($this->request->is('get')&&$this->request->query!=null) {
			$conditions=$this->searchConditions($this->request->query);
			$title='Vehicle Search Results';
		}

		$this->Vehicle->recursive = 1;
		
		//paginate settings
		$this->Paginator->settings=array('limit' => 40,'conditions'=>$conditions);
		

		$this->set('vehicles', $this->Paginator->paginate());
		$this->set('title', $title);
		
	}
	
	private function searchConditions($vehicle){
		$conditions=array();
		if($vehicle['driverName']!=NULL)
			$conditions['Vehicle.driverName LIKE '] = '%'.$vehicle['driverName'].'%';
		if($vehicle['driverContact']!=NULL)
			$conditions['Vehicle.driverContact = '] = $vehicle['driverContact'];
		if($vehicle['vehicleNum']!=NULL)
			$conditions['Vehicle.vehicleNum LIKE '] = '%'.$vehicle['vehicleNum'].'%';
		if($vehicle['fare']!=NULL){
			$op='=';
			if($vehicle['fareSearch']=='>')
				$op='>';
			else if($vehicle['fareSearch']=='<')
				$op='<';
			$conditions['Vehicle.fare '.$op.' '] = $vehicle['fare'];
		}		
		if($vehicle['ownerID']!=NULL)
			$conditions['Vehicle.ownerID LIKE '] = $vehicle['ownerID'];
		return $conditions;
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
        $this->Vehicle->recursive = 2;
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
		$this->Vehicle->id = $id;
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
