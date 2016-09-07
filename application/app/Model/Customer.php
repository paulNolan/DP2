<?php
App::uses('AppModel', 'Model');
/**
 * Customer Model
 *
 */
class Customer extends AppModel {

	/**
	 * Display field
	 *
	 * @var string
	 */
	public $displayField = 'email';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'first_name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'First name cannot be blank.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'surname' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				'message' => 'Surname cannot be blank.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'phone' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Phone number must consist of numbers only.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'email' => array(
			'email' => array(
				'rule' => array('email'),
				'message' => 'A valid email must be provided.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'medicare_num' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'Medicare ID must consist of numbers only.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
			'between' => array(
				'rule'    => array('lengthBetween', 9, 11),
				'message' => 'Medicare ID must be between 9 and 11 numbers in length.'
			)
		),
	);
}
