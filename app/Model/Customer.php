<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 */

class Customer extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
        var $name = 'Customer';
    public $actsAs = array('DeletedAt.DeletedAt');
        public $has = array( 'Trip' => array( 'className' => 'Trip' ) );
        
	public $useTable = 'customer';

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'phone' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'blacklisted' => array(
			'boolean' => array(
				'rule' => array('boolean'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'maxFare' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	public function getCustomerList(){
		$customers=$this->find('all');
		$customerList=array();
		foreach($customers as $customer){
			$customerList[$customer['Customer']['id']]=$customer['Customer']['id']."-".$customer['Customer']['phone']."-".$customer['Customer']['name'];
		}
		return $customerList;
	}
}
