<?php
App::uses('AppModel', 'Model');
/**
 * Tuksession Model
 *
 */
class Tuksession extends AppModel {


    var $name = 'Tuksession';
    public $belongsTo = array(
        'Vehicle' => array(
            'className' => 'Vehicle',
            'foreignKey' => 'vehicleID'
        ),
		'Locality' => array(
            'className' => 'Locality',
            'foreignKey' => 'localityID'
        )
    );

    public $virtualFields = array(
        'status' => 'Select status from trips where (trips.status=0 OR trips.status=1) and trips.vehicleID=Tuksession.vehicleID AND trips.time>=Tuksession.startTime and (trips.time<=Tuksession.endTime or Tuksession.endTime is null) ORDER BY time DESC LIMIT 1'
    );
/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'vehicleID' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'localityID' => array(
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
}
