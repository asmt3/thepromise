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
		)
	);

	function import($type, $from, $content) {
		$previousMessage = $this->find('first', array('conditions' => array(
			'Message.from' => $from
		)));

		if ($previousMessage) {
			$investigation_id = $previousMessage['Message']['investigation_id'];
			$agency_id = $previousMessage['Message']['agency_id'];
		} else {
			// create an investigation
			$this->Investigation->create();
			$this->Investigation->save();
			$investigation_id = $this->Investigation->id;
			$agency_id = 1;
		}

		$this->create();
		return $this->save(array(
			'type' => $type,
			'from' => $from,
			'content' => $content,
			'investigation_id' => $investigation_id,
			'agency_id' => $agency_id,
		));
	}
}
