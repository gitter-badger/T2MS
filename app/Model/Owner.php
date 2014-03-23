<?php
App::uses('AppModel', 'Model');
/**
 * Owner Model
 *
 */
class Owner extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
        var $name = 'Owner';
    public $actsAs = array('DeletedAt.DeletedAt');
        public $has = array( 'Vehicle' => array( 'className' => 'Vehicle' ) );
        
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
		'address' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'contact' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'password' => array(
			'notEmpty' => array(
				'rule' => array('notEmpty'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);
	
	public function getOwnerList(){
		$owners=$this->find('all');
		$own=array();
		foreach($owners as $owner){
			$own[$owner['Owner']['id']]=$owner['Owner']['id']."-".$owner['Owner']['contact']."-".$owner['Owner']['name'];
		}
		return $own;
	}
    public function beforeSave($options = array()) {
        App::uses('Utitlity','Security');
        if(!empty($this->data['Owner']['password'])) {
            $this->data['Owner']['password'] = Security::hash($this->data['Owner']['password']);
        }
        return true;
    }
}
