<?php
/**
 * Customer Fixture
 */
class CustomerFixture extends CakeTestFixture {

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
		'medicare_num' => array('type' => 'integer', 'null' => true, 'default' => null, 'unsigned' => false, 'key' => 'unique'),
		'created' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'modified' => array('type' => 'datetime', 'null' => true, 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1),
			'email' => array('column' => 'email', 'unique' => 1),
			'medicare_num' => array('column' => 'medicare_num', 'unique' => 1)
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
			'medicare_num' => 1,
			'created' => '2016-09-04 18:13:28',
			'modified' => '2016-09-04 18:13:28'
		),
	);

}
