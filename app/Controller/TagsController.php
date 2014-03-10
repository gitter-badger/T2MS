<?php
App::uses('AppController', 'Controller');
/**
 * Tags Controller
 *
 * @property Tag $Tag
 * @property PaginatorComponent $Paginator
 */
class TagsController extends AppController {

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
		$this->Tag->recursive = 0;
		$this->set('tags', $this->Paginator->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($tag=null,$localityid = null) {
		$tagArr=$this->Tag->find('first', array(
        'conditions' => array('Tag.locality_id' => $localityid,'Tag.tag' => $tag)));
		echo(json_encode($tagArr));
		if ($tagArr==null) {
			throw new NotFoundException(__('Invalid tag'));
		}
		$this->set('tag', $tagArr);
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {


            $tg=$this->Tag->find('first', array(
                'conditions' => array('Tag.locality_id' => $this->request->data['Tag']['locality_id'],
                                                'Tag.tag' =>  $this->request->data['Tag']['tag'])));
            if($tg!=null){
                $this->Session->setFlash(__('The tag exists.'));
                return $this->redirect(array('action' => 'index'));
            }


			$this->Tag->create();
			if ($this->Tag->save($this->request->data)) {
				$this->Session->setFlash(__('The tag has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tag could not be saved. Please, try again.'));
			}
		}
		$localities = $this->Tag->Locality->find('list');
		$this->set(compact('localities'));
	}

    /**
     * delete method
     *
     *
     * @param null $tag
     * @param null $localityid
     * @throws NotFoundException
     * @internal param string $id
     * @return void
     */
	public function delete($tag=null,$localityid = null) {
        $tg=$this->Tag->find('first', array(
            'conditions' => array('Tag.locality_id' => $localityid,'Tag.tag' => $tag)));
        echo(json_encode($tg));
        if ($tg==null) {
            throw new NotFoundException(__('Invalid tag'));
        }
		$this->request->onlyAllow('post', 'delete');

        $this->Tag->deleteAll(array('Tag.locality_id' => $localityid,'Tag.tag' => $tag), false);
			$this->Session->setFlash(__('The tag has been deleted.'));
		return $this->redirect(array('action' => 'index'));
	}


}
