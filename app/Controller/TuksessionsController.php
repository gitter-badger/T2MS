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
            $tuksession=$this->Tuksession->find('first', array(
                'conditions' => array('Tuksession.vehicleID' => $this->request->data['Tuksession']['vehicleID'],
                    'Tuksession.startTime' =>  $this->request->data['Tuksession']['startTime'])));
            if($tuksession!=null){
                $this->Session->setFlash(__('The tukSession exists.'));
                return $this->redirect(array('action' => 'index'));
            }
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
	public function edit($vehicleID=null,$startTime=null) {
        $tuk=$this->Tuksession->find('first', array(
            'conditions' => array('Tuksession.vehicleID' => $vehicleID,
                'Tuksession.startTime' =>  $startTime)));
        if($tuk==null){
            throw new NotFoundException(__('Invalid Tuksession'));
        }

		if ($this->request->is(array('post', 'put'))) {
			if ($this->Tuksession->save($this->request->data)) {
				$this->Session->setFlash(__('The tuksession has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tuksession could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data =$tuk;
		}
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function delete($vehicleID=null,$startTime=null) {
        $this->request->onlyAllow('post', 'delete');

        $tuk=$this->Tuksession->find('first', array(
            'conditions' => array('Tuksession.vehicleID' =>$vehicleID,'Tuksession.startTime' => $startTime)));
        if($tuk==null){
            throw new NotFoundException(__('Invalid Tuksession'));
        }
        $this->Tuksession->deleteAll(array('Tuksession.vehicleID' => $vehicleID,'Tuksession.startTime' => $startTime), false);
        $this->Session->setFlash(__('The Tuksession has been deleted.'));
        return $this->redirect(array('action' => 'index'));
	}
}
