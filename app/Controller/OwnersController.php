<?php
App::uses('AppController', 'Controller');
/**
 * Owners Controller
 *
 * @property Owner $Owner
 * @property PaginatorComponent $Paginator
 */
class OwnersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

    public function beforeFilter() {
        parent::beforeFilter();
        // Allow users to register and logout.
        $this->Auth->allow('add', 'logout');
    }

    public function login() {
        if ($this->request->is('post')) {
            if ($this->Auth->login()) {
                $this->Session->setFlash(__('OK'));
                return $this->redirect($this->Auth->redirect());
            }
            $this->Session->setFlash(__(json_encode($this->request->data)));
        }
    }
    public function logout() {
        return $this->redirect($this->Auth->logout());
    }


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Owner->recursive = 0;
		$this->set('owners', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Owner->exists($id)) {
			throw new NotFoundException(__('Invalid owner'));
		}
		$options = array('conditions' => array('Owner.' . $this->Owner->primaryKey => $id));
		$this->set('owner', $this->Owner->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Owner->create();
			if ($this->Owner->save($this->request->data)) {
				$this->Session->setFlash(__('The owner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The owner could not be saved. Please, try again.'));
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
		if (!$this->Owner->exists($id)) {
			throw new NotFoundException(__('Invalid owner'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Owner->save($this->request->data)) {
				$this->Session->setFlash(__('The owner has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The owner could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Owner.' . $this->Owner->primaryKey => $id));
			$this->request->data = $this->Owner->find('first', $options);
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
		$this->Owner->id = $id;
		if (!$this->Owner->exists()) {
			throw new NotFoundException(__('Invalid owner'));
		}
		$this->request->onlyAllow('post', 'delete');
		if ($this->Owner->delete()) {
			$this->Session->setFlash(__('The owner has been deleted.'));
		} else {
			$this->Session->setFlash(__('The owner could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
	
	
	
	
	}
