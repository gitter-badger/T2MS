<?php
App::uses('AppController', 'Controller');
/**
 * Trips Controller
 *
 * @property Trip $Trip
 * @property PaginatorComponent $Paginator
 */
class TripsController extends AppController {

/**
 * Components
 *
 * @var array
 */
    var $name = 'Trips';
    var $scaffold;
    
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
            
        $conditions=array();
		$title='Trips';
		
		if ($this->request->is('get')&&$this->request->query!=null) {
			$conditions=$this->searchConditions($this->request->query);
			$title='Trip Search Results';
		}
                
        $this->Paginator->settings=array('limit' => 40,'conditions'=>$conditions);
                
		$this->Trip->recursive = 0;
		$this->set('trips', $this->Paginator->paginate());
        $this->set('title', $title);
	}


        private function searchConditions($trip){
		$conditions=array();
                //time hasn't included for searching
		if($trip['fare']!=NULL)
			$conditions['Trip.fare LIKE '] = '%'.$trip['fare'].'%';
		if($trip['status']!=NULL)
			$conditions['Trip.status = '] = $trip['status'];
		if($trip['startLocation']!=NULL)
			$conditions['Trip.startLocation LIKE '] = '%'.$trip['startLocation'].'%';
                if($trip['endLocation']!=NULL)
			$conditions['Trip.endLocation LIKE '] = '%'.$trip['endLocation'].'%';
		if($trip['vehicleID']!=NULL)
			$conditions['Trip.vehicleID LIKE '] = '%'.$trip['vehicleID'].'%';
                if($trip['customerID']!=NULL)
			$conditions['Trip.customerID LIKE '] = '%'.$trip['customerID'].'%';
		return $conditions;
	}

    /**
     * view method
     * @param null $id
     * @throws NotFoundException
     * @return void
     */
    public function view($id = null) {
		if (!$this->Trip->exists($id)) {
			throw new NotFoundException(__('Invalid trip'));
		}
		$options = array('conditions' => array('Trip.' . $this->Trip->primaryKey => $id));
		$trip = $this->Trip->find('first', $options);
		
		if($trip['Trip']['status']== -1){
			$trip['Trip']['status']= 'Unassigned';
		}
		else if($trip['Trip']['status']== 0){
			$trip['Trip']['status']= 'Assigned';
		}
		else if($trip['Trip']['status']== 1){
			$trip['Trip']['status']= 'Started';
		}
		else if($trip['Trip']['status']== 2){
			$trip['Trip']['status']= 'Finished';
		}
		$this->set('trip', $trip);

	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
                $this->loadModel('Locality');
		$this->set('localities',$this->Locality->getLocalityList());
                
               // $this->loadModel('Customer');
		//$this->set('customers',$this->Locality->getCustomerList());
                
		if ($this->request->is('post')) {
			$this->Trip->create();
			if ($this->Trip->save($this->request->data)) {
				$this->Session->setFlash(__('The trip has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trip could not be saved. Please, try again.'));
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
		if (!$this->Trip->exists($id)) {
			throw new NotFoundException(__('Invalid trip'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Trip->save($this->request->data)) {
				$this->Session->setFlash(__('The trip has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The trip could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Trip.' . $this->Trip->primaryKey => $id));
			$this->request->data = $this->Trip->find('first', $options);
			$this->loadModel('Locality');
			$this->set('localities',$this->Locality->getLocalityList());
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
		$this->Trip->id = $id;
		if (!$this->Trip->exists()) {
			throw new NotFoundException(__('Invalid trip'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Trip->delete()) {
			$this->Session->setFlash(__('The trip has been deleted.'));
		} else {
			$this->Session->setFlash(__('The trip could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
        
        public function search(){
		$this->loadModel('Locality');
		$this->set('localities',$this->Locality->getLocalityList());
                
                $this->loadModel('Customer');
		$this->set('customers',$this->Customer->getCustomerList());
                
                $this->loadModel('Vehicle');
		$this->set('vehicles',$this->Vehicle->getVehicleList());
	}
                }
