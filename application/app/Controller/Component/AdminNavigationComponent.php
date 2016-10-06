<?php
	App::uses('Component', 'Controller');

	/**
	 * Admin Navigation Component
	 *
	 * Initialises and handles the admin navigation.
	 *
	 * @package		app.Controller.Component
	 */
	class AdminNavigationComponent extends Component {

		/**
		 * List of admin pages
		 *
		 * @var array
		 */
		private $_pages = array(
			'Dashboard' => array(
				'url' => array(
					'admin' => true,
					'controller' => 'pages',
					'action' => 'home'
				),
				'class' => array()
			),
			'Products' => array(
				'url' => array(
					'admin' => true,
					'controller' => 'products',
					'action' => 'index'
				),
				'class' => array()
			),
			'Customers' => array(
				'url' => array(
					'admin' => true,
					'controller' => 'customers',
					'action' => 'index'
				),
				'class' => array()
			),
			'Orders' => array(
				'url' => array(
					'admin' => true,
					'controller' => 'purchase_orders',
					'action' => 'index'
				),
				'class' => array()
			),
			'Staff' => array(
				'url' => array(
					'admin' => true,
					'controller' => 'staff',
					'action' => 'index'
				),
				'class' => array()
			),
			'Sales Prediction' => array(
				'url' => array(
					'admin' => true,
					'controller' => 'sales_prediction',
					'action' => 'index'
				),
				'class' => array()
			),
		);

		/**
		 * Initialises component
		 *
		 * @param Controller $controller
		 */
		public function initialize(Controller $controller) {
			foreach ($this->_pages as &$link) {
				if ($controller->request->params['controller'] == $link['url']['controller']) {
					array_push($link['class'], 'active');
				}
			}

			$controller->set('admin_navigation', $this->_pages);
		}

	}