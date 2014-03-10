<?php

class DashboardController extends AppController{
	public function index() {

	}
	public function available() {
		$arr=$this->query('select * from tuksessions where endTime is NULL');
		echo (json_encode($arr));
	}


}

?>