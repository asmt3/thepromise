<?php
App::uses('AppModel', 'Model');
/**
 * Message Model
 *
 * @property Investigation $Investigation
 */
class Message extends AppModel {


	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */
	public $belongsTo = array(
		'Investigation' => array(
			'className' => 'Investigation',
			'foreignKey' => 'investigation_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);
}
