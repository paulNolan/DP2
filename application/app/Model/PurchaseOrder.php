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
	 * Virtual fields
	 *
	 * @var string
	 */
	public $virtualFields = array(
		'year' => 'YEAR(PurchaseOrder.created)'
	);

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
			if (isset($order['PurchaseOrderLineItem'])) {
				foreach ($order['PurchaseOrderLineItem'] as $item) {
					$order['PurchaseOrder']['total_items'] += $item['qty'];
				}
			}
		}
		return $results;
	}

	public function getAverageSalesForProducts($data) {
		$sales = $this->find('all', array(
			'contain' => array(
				'PurchaseOrderLineItem' => array(
					'Product' => array(
						'fields' => array(
							'name',
							'id'
						)
					),
					'fields' => array(
						'qty'
					)
				)
			),
			'conditions' => array(
				'YEAR(PurchaseOrder.created) >=' => $data['start_year']['year'],
				'YEAR(PurchaseOrder.created) <=' => $data['end_year']['year'],
				'MONTH(PurchaseOrder.created)' => $data['month']['month']
			),
		));

		$years = array();
		foreach ($sales as $sale) {
			if (!isset($years[$sale['PurchaseOrder']['year']])) {
				$years[$sale['PurchaseOrder']['year']] = array();
			}
			foreach ($sale['PurchaseOrderLineItem'] as $line_item) {
				if (!isset($years[$sale['PurchaseOrder']['year']][$line_item['product_id']])) {
					$years[$sale['PurchaseOrder']['year']][$line_item['product_id']] = array(
						'Product' => $line_item['Product'],
						'qty' => 0
					);
				}
				$years[$sale['PurchaseOrder']['year']][$line_item['product_id']]['qty'] += $line_item['qty'];
			}
		}

		return $years;
	}

}
