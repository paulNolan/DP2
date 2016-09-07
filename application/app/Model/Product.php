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
	 * hasAndBelongsToMany associations
	 *
	 * @var array
	 */
	public $hasAndBelongsToMany = array(
		'PurchaseOrder' => array(
			'className' => 'PurchaseOrder',
			'joinTable' => 'purchase_orders_products',
			'foreignKey' => 'product_id',
			'associationForeignKey' => 'purchase_order_id',
			'unique' => 'keepExisting',
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'finderQuery' => '',
		)
	);

}
