<?php
App::uses('AppModel', 'Model');
/**
 * User Model
 *
 */
class User extends AppModel {

	public $hasMany = array(
		'Shelter' => array(
			'className' => 'Shelter',
			'foreignKey' => 'user_id',
		),

		'Agency' => array(
			'className' => 'Agency',
			'foreignKey' => 'user_id',
		),

	);



	public function beforeSave($options = array()) {
        // hash our password
        if (isset($this->data[$this->alias]['password'])) {
            $this->data[$this->alias]['password'] = AuthComponent::password($this->data[$this->alias]['password']);
        }
     
        // fallback to our parent
        return parent::beforeSave($options);
    }


}
