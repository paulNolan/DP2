<?php
App::uses('Staff', 'Model');

/**
 * Staff Test Case
 */
class StaffTest extends CakeTestCase {

/**
 * Fixtures
 *
 * @var array
 */
	public $fixtures = array(
		'app.staff',
		'app.purchase_order',
		'app.customers',
		'app.product',
		'app.purchase_orders_product'
	);

/**
 * setUp method
 *
 * @return void
 */
	public function setUp() {
		parent::setUp();
		$this->Staff = ClassRegistry::init('Staff');
	}

/**
 * tearDown method
 *
 * @return void
 */
	public function tearDown() {
		unset($this->Staff);

		parent::tearDown();
	}

}
