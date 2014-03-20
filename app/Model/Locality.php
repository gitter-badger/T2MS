<?php
App::uses('AppModel', 'Model');
/**
 * Locality Model
 *
 * @property Tag $Tag
 */
class Locality extends AppModel {

/**
 * Use table
 *
 * @var mixed False or table name
 */
        var $name = array('StartLocality','EndLocality');

	public $useTable = 'locality';

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
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Tag' => array(
			'className' => 'Tag',
			'foreignKey' => 'locality_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		),
        'Trip' =>array(
            'className'=>'Trip',
            'foreignKey'=>'startLocation',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Trip' =>array(
            'className'=>'Trip',
            'foreignKey'=>'endLocation',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        ),
        'Tuksession' =>array(
            'className'=>'Tuksession',
            'foreignKey'=>'localityID',
            'dependent' => false,
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'limit' => '',
            'offset' => '',
            'exclusive' => '',
            'finderQuery' => '',
            'counterQuery' => ''
        )
	);
        
public function getLocalityList(){
		$localities=$this->find('all');
		$local=array();
		foreach($localities as $locality){
			$local[$locality['Locality']['id']]=$locality['Locality']['id']."-".$locality['Locality']['name'];
		}
		return $local;
	}
        
}
