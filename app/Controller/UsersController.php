<?php
App::uses('Security','Utility');
App::uses('AppController', 'Controller');

/**
 * Users Controller
 */
class UsersController extends AppController {

    public function beforeFilter() {
        $this->layout = 'bootstrap';
    }
/**
 * index method
 *
 * @return void
 */


    public function login() {
        if ($this->request->is('post')) {
            $password = $this->request->data['user']['password'];
            $contact = $this->request->data['user']['contact'];

            if($contact==123&&$password==456){
                $this->Session->write('userid','admin');
                $this->Session->write('userrole','admin');
                return $this->redirect('/dashboard');
            }
            $this->loadModel('Owner');
            $password=Security::hash($password, null, true);
            echo $password;

            $owner=$this->Owner->find('first', array(
                'conditions' => array('Owner.contact' => $contact,'Owner.password'=>$password)));

            if ($owner!=null) {
                $this->Session->write('userid',$owner['Owner']['id']);
                $this->Session->write('userrole','owner');
                return $this->redirect('/OwnerDashboard');
            }
            $this->Session->setFlash('Invalid Username or Password', 'default', array('class' => 'alert alert-danger'));
        }
    }
    public function logout() {
        $this->Session->delete('userid');
        $this->Session->setFlash('You have been successfully logged out', 'default', array('class' => 'alert alert-success'));
        $this->redirect('/');
    }

    private function isAdmin(){

        $password = $this->Session->read('userid');
        $contact = $this->Session->read('userrole');

        if($contact!=null&&$password!=null&&$contact==123&&$password==465){
            return true;
        }
        $this->Session->setFlash('You are not logged in as an admin', 'default', array('class' => 'alert alert-danger'));
        return $this->redirect('/login');

    }

    /**
     * add method
     *
     * @return void
     */
    public function add() {
        $this->loadModel('Owner');
        if ($this->request->is('post')) {
            $this->Owner->create();
            try{
                $this->Owner->save($this->request->data);
                $this->Session->setFlash(__('The owner has been saved.'));
                $this->Session->write('userid',$this->Owner->id);
                $this->Session->write('userrole','owner');
                return $this->redirect('/OwnerDashboard');
            } catch(Exception $e) {
                $this->Session->setFlash('Contact number already exists. Please, try again.','default', array('class' => 'alert alert-danger'));
            }
        }
    }


}
