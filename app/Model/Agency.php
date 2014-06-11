<?php
App::uses('AppModel', 'Model');
/**
 * Agency Model
 *
 * @property Investigation $Investigation
 * @property Shelter $Shelter
 */
class Agency extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Investigation' => array(
			'className' => 'Investigation',
			'foreignKey' => 'agency_id',
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
		'Shelter' => array(
			'className' => 'Shelter',
			'foreignKey' => 'agency_id',
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

}
