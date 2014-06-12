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
		),
		'Shelter' => array(
			'className' => 'Shelter',
			'foreignKey' => 'shelter_id',
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

	public function refer($shelter_id, $investigation_id) {
		
		$this->id = $investigation_id;
		$this->saveField('shelter_id', $shelter_id);
		return $this->saveField('status', 'referred');

	}

	public function getMaxId() {
		$result = $this->find('first', array('fields' => 'MAX(Investigation.id) as max_id'));

		return $result[0]['max_id'];
	
	}

}
