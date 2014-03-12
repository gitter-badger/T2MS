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

    private function incomeChart(){
        $this->loadModel('Trip');

        $ownerId = $this->Session->read('userid');
        $income =  $this->Trip->find('all',array(
                                    'fields'=>array('Trip.time','SUM(Trip.fare)'),
                                    'conditions'=>array('Vehicle.ownerID'=>$ownerId),
                                    'group'=>array('DATE(Trip.time)'))
                                   );
        echo(json_encode($income));
    }
}

?>
