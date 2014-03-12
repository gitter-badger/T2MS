<?php

class DashboardController extends AppController{
	public function index() {

	}
	public function available() {
	App::uses('ConnectionManager', 'Model'); 
    $db = ConnectionManager::getDataSource('default');
    if (!$db->isConnected()) {
       $this->Session->setFlash(__('Could not connect to database.'), 'default',            array('class' => 'error'));
    } else {
        $arr=$db->fetchAll('select t1.vehicleID, status, startTime from (select * from tuksessions where endTime = null) as t2 left outer join (select * from trips where status =\'0\' OR status =\'1\' group by vehicleID) as t1 on t2.vehicleID=t1.vehicleID');
    }
		echo (json_encode($arr));
		$this->set('arr', $arr);
	}


}

?>