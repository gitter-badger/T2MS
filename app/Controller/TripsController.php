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
		$title='Localities';
		
		if ($this->request->is('get')&&$this->request->query!=null) {
			$conditions=$this->searchConditions($this->request->query);
			$title='Locality Search Results';
		}
                
                $this->Paginator->settings=array('limit' => 40,'conditions'=>$conditions);
                
		$this->Trip->recursive = 1;
		$this->set('trips', $this->Paginator->paginate());
                $this->set('title', $title);
	}


        private function searchConditions($locality){
		$conditions=array();
                //time hasn't included for searching
		if($locality['fare']!=NULL)
			$conditions['Locality.fare LIKE '] = '%'.$locality['fare'].'%';
		if($locality['status']!=NULL)
			$conditions['Locality.status = '] = $locality['status'];
		if($locality['startLocation']!=NULL)
			$conditions['Locality.startLocation LIKE '] = '%'.$locality['startLocation'].'%';
                if($locality['endLocation']!=NULL)
			$conditions['Locality.endLocation LIKE '] = '%'.$locality['endLocation'].'%';
		if($locality['vehicleID']!=NULL)
			$conditions['Locality.vehicleID LIKE '] = '%'.$locality['vehicleID'].'%';
                if($locality['customerID']!=NULL)
			$conditions['Locality.customerID LIKE '] = '%'.$locality['customerID'].'%';
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
		$this->set('trip', $this->Trip->find('first', $options));
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
