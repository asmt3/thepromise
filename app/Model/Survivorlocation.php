<?php
App::uses('AppModel', 'Model');
/**
 * Survivorlocation Model
 *
 * @property Investigation $Investigation
 */
class Survivorlocation extends AppModel {


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
		),
		'History' => array(
			'className' => 'History',
			'foreignKey' => 'history_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);


	function record($investigation_id, $lat, $lng) {

		$this->History->create();
		$this->History->save(array(
			'type' => 'survivorlocation',
			'investigation_id' => $investigation_id,
			'content' => 'Survivor\'s Location updated',
			'data' => json_encode(compact('lat', 'lng')),
		));

		$history_id = $this->History->id;

		$this->create();
		$this->save(compact('history_id', 'investigation_id', 'lat', 'lng'));

		return $this->find('first', array(
			'contain' => array('History'),
			'conditions' => array(
				'Survivorlocation.id' => $this->id
			)
		));
	}
}
