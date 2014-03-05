<?php
App::uses('AppController', 'Controller');
/**
 * Tuksessions Controller
 *
 * @property Tuksession $Tuksession
 * @property PaginatorComponent $Paginator
 */
class TuksessionsController extends AppController {

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
		$this->Tuksession->recursive = 0;
		$this->set('tuksessions', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Tuksession->exists($id)) {
			throw new NotFoundException(__('Invalid tuksession'));
		}
		$options = array('conditions' => array('Tuksession.' . $this->Tuksession->primaryKey => $id));
		$this->set('tuksession', $this->Tuksession->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tuksession->create();
			if ($this->Tuksession->save($this->request->data)) {
				$this->Session->setFlash(__('The tuksession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tuksession could not be saved. Please, try again.'));
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
		if (!$this->Tuksession->exists($id)) {
			throw new NotFoundException(__('Invalid tuksession'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tuksession->save($this->request->data)) {
				$this->Session->setFlash(__('The tuksession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tuksession could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Tuksession.' . $this->Tuksession->primaryKey => $id));
			$this->request->data = $this->Tuksession->find('first', $options);
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
		$this->Tuksession->id = $id;
		if (!$this->Tuksession->exists()) {
			throw new NotFoundException(__('Invalid tuksession'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Tuksession->delete()) {
			$this->Session->setFlash(__('The tuksession has been deleted.'));
		} else {
			$this->Session->setFlash(__('The tuksession could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}}
