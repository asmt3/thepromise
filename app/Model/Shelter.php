<?php
App::uses('AppModel', 'Model');
/**
 * Shelter Model
 *
 * @property Agency $Agency
 */
class Shelter extends AppModel {


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

	public function search($lat, $lng) {
		//$sql = "SELECT id, name, email, phone, lat, lng, ( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM shelters HAVING distance < 25 ORDER BY distance LIMIT 0 , 20";
		$sql = "SELECT id, name, email, phone, address, capacity, free_spaces, lat, lng, ( 3959 * acos( cos( radians($lat) ) * cos( radians( lat ) ) * cos( radians( lng ) - radians($lng) ) + sin( radians($lat) ) * sin( radians( lat ) ) ) ) AS distance FROM shelters ORDER BY distance LIMIT 10";
		$shelters = $this->query($sql);

		// reformat
		$shelters_reformatted = array();

		foreach ($shelters as $key => $shelter) {

			$shelter_reformatted = array('Shelter' => $shelter['shelters']);
			$shelter_reformatted['Shelter']['distance'] = round($shelter[0]['distance']);

			$shelters_reformatted[] = $shelter_reformatted;
		}

		$result = array(
			'query' => compact('lat', 'lng'),
			'shelters' => $shelters_reformatted,
		);


		return $result;

	}
}
