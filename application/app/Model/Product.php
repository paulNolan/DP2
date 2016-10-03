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
	 * Behaviours
	 *
	 * @var array
	 */
	public $actsAs = array(
		'Upload.Upload' => array(
			'photo' => array(
				'fields' => array(
					'dir' => 'photo_dir'
				),
				'thumbnailSizes' => array(
					'xvga' => '1024x768',
					'vga' => '640x480',
					'thumb' => '80x80'
				),
				'thumbnailMethod' => 'php'
			)
		)
	);

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

	/**
	 * Get product list.
	 *
	 * @var array
	 */
	public function getProductList() {
		$products = $this->find('list', array(
			'fields' => array(
				'Product.id',
				'Product.name',
			),
			'order' => array(
				'Product.name' => 'ASC'
			)
		));

		return $products;
	}

}
