<?php
/**
 * Staff Fixture
 */
class StaffFixture extends CakeTestFixture {

/**
 * Table name
 *
 * @var string
 */
	public $table = 'staff';

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'null' => false, 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'first_name' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'surname' => array('type' => 'string', 'null' => false, 'default' => null, 'length' => 20, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'address' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'phone' => array('type' => 'integer', 'null' => false, 'default' => null, 'length' => 10, 'unsigned' => false),
		'email' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 30, 'key' => 'unique', 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'store_location' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 20, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'username' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 10, 'key' => 'unique', 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'password_hash' => array('type' => 'string', 'null' => true, 'default' => null, 'length' => 64, 'collate' => 'utf8mb4_unicode_ci', 'charset' => 'utf8mb4'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'email' => array('column' => 'email', 'unique' => 1),
			'username' => array('column' => 'username', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8mb4', 'collate' => 'utf8mb4_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'first_name' => 'Lorem ipsum dolor ',
			'surname' => 'Lorem ipsum dolor ',
			'address' => 'Lorem ipsum dolor ',
			'phone' => 1,
			'email' => 'Lorem ipsum dolor sit amet',
			'store_location' => 'Lorem ipsum dolor ',
			'username' => 'Lorem ip',
			'password_hash' => 'Lorem ipsum dolor sit amet',
			'created' => '2016-09-04 18:16:54',
			'modified' => '2016-09-04 18:16:54'
		),
	);

}
