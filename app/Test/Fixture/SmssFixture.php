<?php
/**
 * SmssFixture
 *
 */
class SmssFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'smss';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'phone' => array('type' => 'integer', 'null' => false, 'default' => null, 'key' => 'primary'),
		'message' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 200, 'key' => 'primary', 'collate' => 'utf8_general_ci', 'charset' => 'utf8'),
		'indexes' => array(
			'PRIMARY' => array('column' => array('phone', 'message'), 'unique' => 1)
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
			'phone' => 1,
			'message' => 'Lorem ipsum dolor sit amet'
		),
	);

}
