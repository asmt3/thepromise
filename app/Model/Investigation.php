<?php
App::uses('AppModel', 'Model');
/**
 * Investigation Model
 *
 * @property Agency $Agency
 * @property History $History
 * @property Message $Message
 */
class Investigation extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Agency' => array(
			'className' => 'Agency',
			'foreignKey' => 'agency_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'History' => array(
			'className' => 'History',
			'foreignKey' => 'investigation_id',
			'dependent' => false,
			'order' => array('History.created DESC'),
		),
		'Message' => array(
			'className' => 'Message',
			'foreignKey' => 'investigation_id',
			'dependent' => false,
			'order' => array('Message.created DESC'),
		),
		'Survivorlocation' => array(
			'className' => 'Survivorlocation',
			'foreignKey' => 'investigation_id',
			'dependent' => false,
			'order' => array('Survivorlocation.created DESC'),
		)
	);

}