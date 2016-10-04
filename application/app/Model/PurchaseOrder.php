<?php
App::uses('AppModel', 'Model');
/**
 * PurchaseOrder Model
 *
 * @property Staff $Staff
 * @property Customers $Customers
 * @property Product $Product
 */
class PurchaseOrder extends AppModel {

	/**
	 * Validation rules
	 *
	 * @var array
	 */
	public $validate = array(
		'staff_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'customer_id' => array(
			'numeric' => array(
				'rule' => array('numeric'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	/**
	 * belongsTo associations
	 *
	 * @var array
	 */
	public $belongsTo = array(
		'Staff' => array(
			'className' => 'Staff',
			'foreignKey' => 'staff_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		),
		'Customer' => array(
			'className' => 'Customer',
			'foreignKey' => 'customer_id',
			'conditions' => '',
			'fields' => '',
			'order' => ''
		)
	);

	/**
	 * hasMany associations
	 *
	 * @var array
	 */
	public $hasMany = array(
		'PurchaseOrderLineItem' => array(
			'className' => 'PurchaseOrderLineItem',
			'foreignKey' => 'purchase_order_id',
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
	 * afterFind() overload
	 *
	 * @param mixed $results
	 * @param bool $primary
	 */
	public function afterFind($results, $primary = false) {
		foreach ($results as &$order) {
			$order['PurchaseOrder']['total_items'] = 0;
			foreach ($order['PurchaseOrderLineItem'] as $item) {
				$order['PurchaseOrder']['total_items'] += $item['qty'];
			}
		}
		return $results;
	}

}
