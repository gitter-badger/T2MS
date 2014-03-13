<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 */
class UsersController extends AppController {

    public function beforeFilter() {
    }
/**
 * index method
 *
 * @return void
 */


    public function login() {
        if ($this->request->is('post')) {
            $password = $this->request->data['login']['password'];
            $contact = $this->request->data['login']['contact'];

            if($contact==123&&$password==456){
                $this->Session->write('userid','admin');
                $this->Session->write('userrole','admin');
                return $this->redirect('/dashboard');
            }
            $this->loadModel('Owner');
            $owner=$this->Owner->find('first', array(
                'conditions' => array('Owner.contact' => $contact,'Owner.password'=>$password)));

            if ($owner!=null) {
                $this->Session->write('userid',$owner['Owner']['id']);
                $this->Session->write('userrole','owner');
                $this->Session->setFlash($owner['Owner']['id']);
                return $this->redirect('/OwnerDashboard');
            }
            $this->Session->setFlash('Invalid Username or Password');
        }
    }
    public function logout() {
        $this->Session->delete('userid');
        $this->Session->setFlash('You have been successfully logged out');
        $this->redirect('/');
    }

    private function isAdmin(){

        $password = $this->Session->read('userid');
        $contact = $this->Session->read('userrole');

        if($contact!=null&&$password!=null&&$contact==123&&$password==465){
            return true;
        }
        $this->Session->setFlash('You are not logged in as an admin');
        return $this->redirect('/login');

    }

}
