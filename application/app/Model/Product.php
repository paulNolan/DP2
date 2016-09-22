<?php
App::uses('AppModel', 'Model');
/**
 * Product Model
 *
 * @property PurchaseOrder $PurchaseOrder
 */
class Product extends AppModel {

/**
 * Display field
 *
 * @var string
 */
	public $displayField = 'description';

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'qty' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				'message' => 'A numerical value must be entered.',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'price' => array(
			'money' => array(
				'rule' => array('money'),
				'message' => 'A valid price must be entered.',
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
		'PurchaseOrderLineItem' => array(
			'className' => 'PurchaseOrderLineItem',
			'foreignKey' => 'product_id',
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
