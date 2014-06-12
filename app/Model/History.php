<?php
App::uses('AppModel', 'Model');
/**
 * History Model
 *
 * @property Investigation $Investigation
 */
class History extends AppModel {


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

	public function addNote($investigation_id, $content) {
		$this->create();
		return $this->save(array(
			'type' => 'note',
			'investigation_id' => $investigation_id,
			'content' => $content,
		));
	}

	public function markAsReferred($investigation_id) {

		$content = 'Referred on ' . date("'l M j, y \a\t g:iA'");
		
		$this->create();
		return $this->save(array(
			'type' => 'referral',
			'investigation_id' => $investigation_id,
			'content' => $content,
		));
	}

	public function recordOutboundText($investigation_id, $number, $content) {
		$content = 'Sent to ' . $number . ': ' . $content;
		
		$this->create();
		return $this->save(array(
			'type' => 'smsout',
			'investigation_id' => $investigation_id,
			'content' => $content,
		));
	}

}
