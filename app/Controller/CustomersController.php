<?php
App::uses('AppController', 'Controller');
/**
 * Customers Controller
 *
 * @property Customer $Customer
 * @property PaginatorComponent $Paginator
 */
class CustomersController extends AppController {

/**
 * Components
 *
 * @var array
 */
    var $name = 'Customers';
    var $scaffold;
    
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$conditions=array();
		$title='Customers';
		
		if ($this->request->is('get')&&$this->request->query!=null) {
			$conditions=$this->searchConditions($this->request->query);
			$title='Customer Search Results';
		}
		$this->Customer->recursive = 0;
		
		//paginate settings
		$this->Paginator->settings=array('limit' => 40,'conditions'=>$conditions);
		

		$this->set('customers', $this->Paginator->paginate());
		$this->set('title', $title);
	}
	
	private function searchConditions($customer){
		$conditions=array();
		if($customer['name']!=NULL)
			$conditions['customer.name LIKE '] = '%'.$customer['name'].'%';
		if($customer['phone']!=NULL)
			$conditions['customer.phone = '] = $customer['phone'];
		if($customer['blacklisted'] == '1')
			$conditions['customer.blacklisted = '] = $customer['blacklisted'];
		if($customer['blacklisted'] == '0')
			$conditions['customer.blacklisted = '] = $customer['blacklisted'];
		//if($customer['maxFare']!=NULL){
			//$conditions['customer.maxFare >= '] = $customer['maxFare'];
		//}
		
		if($customer['maxFare']!=NULL){
			$op='=';
			if($customer['fareSearch']=='>')
				$op='>';
			else if($customer['fareSearch']=='<')
				$op='<';
			$conditions['customer.maxFare '.$op.' '] = $customer['maxFare'];
		}		
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
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
		$this->set('customer', $this->Customer->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Customer->create();
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
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
		if (!$this->Customer->exists($id)) {
			throw new NotFoundException(__('Invalid customer'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Customer->save($this->request->data)) {
				$this->Session->setFlash(__('The customer has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The customer could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Customer.' . $this->Customer->primaryKey => $id));
			$this->request->data = $this->Customer->find('first', $options);
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
		$this->Customer->id = $id;
		if (!$this->Customer->exists()) {
			throw new NotFoundException(__('Invalid customer'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Customer->delete()) {
			$this->Session->setFlash(__('The customer has been deleted.'));
		} else {
			$this->Session->setFlash(__('The customer could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	public function search(){	
	}
	
}
