<?php

class OwnerDashboardController extends AppController{
    public function beforeFilter(){

    }
    public function index() {
        if(!$this->isOwner()){
            $this->Session->setFlash('You are not logged in');
            return $this->redirect('/users/login');
        }
    }

    private function isOwner(){
        $id= $this->Session->read('userid');
        $role = $this->Session->read('userrole');
        if($id!=null&&$role!=null&&$id!='admin'){
            return true;
        }
        return false;
    }
}

?>
