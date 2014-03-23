<?php
App::uses('AppController', 'Controller');
/**
 * Tuksessions Controller
 *
 * @property Tuksession $Tuksession
 * @property PaginatorComponent $Paginator
 */
class TuksessionsController extends AppController {
    const TIMEZONE_OFFSET = 19800; //GMT+5.30
/**
 * Components
 *
 * @var array
 */
	var $name='Tuksessions';
	 var $scaffold;
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
 * add method
 *
 * @return void
 */
	public function add() {
		$this->loadModel('Locality');
		$this->set('localities',$this->Locality->getLocalityList());
        $this->loadModel('Vehicle');
        $this->set('vehicles',$this->Vehicle->getVehicleList());


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
				$this->Session->setFlash(__(json_encode($this->request->data)));
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
                'Tuksession.startTime' =>  $startTime),
            'fields'=>array('vehicleID','localityID','startTime','endTime')
        ));
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
            $this->loadModel('Locality');
            $this->set('localities',$this->Locality->getLocalityList());
            $this->loadModel('Vehicle');
            $this->set('vehicles',$this->Vehicle->getVehicleList());
		}
	}
    /**
     * view method
     *
     * @throws NotFoundException
     * @param string $id
     * @return void
     */
    public function view($vehicleID=null,$startTime=null) {


        $tuk=$this->Tuksession->find('first', array(
            'conditions' => array('Tuksession.vehicleID' => $vehicleID,
                'Tuksession.startTime' =>  $startTime)));
        if($tuk==null){
            throw new NotFoundException(__('Invalid Tuksession'));
        }
        $this->set('tuksession',$tuk);
          //  $this->request->data =$tuk;

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

        $tuk=$this->Tuksession->find('count', array(
            'conditions' => array('Tuksession.vehicleID' =>$vehicleID,'Tuksession.startTime' => $startTime)
        ));
        if($tuk==0){
            throw new NotFoundException(__('Invalid Tuksession'));
        }
        $this->Tuksession->deleteAll(array('Tuksession.vehicleID' => $vehicleID,'Tuksession.startTime' => $startTime), false);
        $this->Session->setFlash(__('The Tuksession has been deleted.'));
        return $this->redirect(array('action' => 'index'));
	}
}
