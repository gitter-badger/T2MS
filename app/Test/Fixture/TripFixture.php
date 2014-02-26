<?php
/**
 * TripFixture
 *
 */
class TripFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'time' => array('type' => 'timestamp', 'null' => false, 'default' => 'CURRENT_TIMESTAMP'),
		'fare' => array('type' => 'integer', 'null' => false, 'default' => null),
		'status' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 10, 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'localityID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'vehicleID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'customerID' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'index'),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'localityID' => array('column' => 'localityID', 'unique' => 0),
			'vehicleID' => array('column' => 'vehicleID', 'unique' => 0),
			'customerID' => array('column' => 'customerID', 'unique' => 0)
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
			'id' => 1,
			'time' => 1393339631,
			'fare' => 1,
			'status' => 'Lorem ip',
			'localityID' => 1,
			'vehicleID' => 1,
			'customerID' => 1
		),
	);

}
