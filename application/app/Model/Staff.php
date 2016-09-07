<?php
	App::uses('AppModel', 'Model');
	App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

	/**
	 * Staff Model
	 *
	 * @property PurchaseOrder $PurchaseOrder
	 */
	class Staff extends AppModel {

		/**
		 * Use table
		 *
		 * @var mixed False or table name
		 */
		public $useTable = 'staff';

		/**
		 * Display field
		 *
		 * @var string
		 */
		public $displayField = 'username';

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
			'username' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'Username cannot be blank.',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'minLength' => array(
					'rule' => array('minLength', 5),
					'message' => 'Username must be at least 5 characters in length.',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
			'password_hash' => array(
				'notBlank' => array(
					'rule' => array('notBlank'),
					'message' => 'A password must be provided.',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
				'minLength' => array(
					'rule' => array('minLength', 5),
					'message' => 'Password must be at least 6 characters in length.',
					//'allowEmpty' => false,
					//'required' => false,
					//'last' => false, // Stop validation after this rule
					//'on' => 'create', // Limit validation to 'create' or 'update' operations
				),
			),
		);

		/**
		 * hasMany associations
		 *
		 * @var array
		 */
		public $hasMany = array(
			'PurchaseOrder' => array(
				'className' => 'PurchaseOrder',
				'foreignKey' => 'staff_id',
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

		/**
		 * beforeSave callback
		 *
		 * @param array $options
		 * @return bool
		 */
		public function beforeSave($options = array()) {
			if (isset($this->data[$this->alias]['password_hash'])) {
				$passwordHasher = new BlowfishPasswordHasher();
				$this->data[$this->alias]['password_hash'] = $passwordHasher->hash(
					$this->data[$this->alias]['password_hash']
				);
			}
			return true;
		}

	}
