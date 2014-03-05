<?php
/**
 * TuksessionFixture
 *
 */
class TuksessionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'vehicleID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'localityID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'startTime' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'endTime' => array('type' => 'timestamp', 'null' => false, 'default' => '0000-00-00 00:00:00'),
		'sessionID' => array('type' => 'biginteger', 'null' => false, 'default' => null, 'key' => 'primary'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'sessionID', 'unique' => 1),
			'session_ibfk_1' => array('column' => 'localityID', 'unique' => 0),
			'session_ibfk_2' => array('column' => 'vehicleID', 'unique' => 0)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_general_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'vehicleID' => 1,
			'localityID' => 1,
			'startTime' => 1394017888,
			'endTime' => 1394017888,
			'sessionID' => ''
		),
	);

}
