<?php
	App::uses('Component', 'Controller');

	/**
	 * Entity Navigation Component
	 *
	 * Initialises and handles the admin navigation.
	 *
	 * @package		app.Controller.Component
	 */
	class EntityNavigationComponent extends Component {

		/**
		 * Initialises component
		 *
		 * @param Controller $controller
		 */
		public function initialize(Controller $controller) {
			$actions = array();
			switch ($controller->request->params['action']) {
				case 'admin_add':
					$actions = array_merge($actions, array('List' => 'admin_index'));
					break;
				case 'admin_edit':
					$actions = array_merge($actions, array('Add New' => 'admin_add', 'Delete' => 'admin_delete', 'List All' => 'admin_index'));
					break;
				case 'admin_view':
					$actions = array_merge($actions, array('Edit' => 'admin_edit', 'Add New' => 'admin_add', 'List All' => 'admin_index', 'Delete' => 'admin_delete'));
					break;
				case 'admin_index':
					$actions = array_merge($actions, array('Add New' => 'admin_add'));
					break;
			}
			$pages = array();
			foreach ($actions as $title => $action) {
				$pages[$title] = array(
					'url' => array(
						'admin' => true,
						'controller' => $controller->request->params['controller'],
						'action' => $action
					),
					'class' => array(
						$controller->request->params['action'] == $action ? 'active' : false
					)
				);
			}

			$controller->set('entity_navigation', $pages);
		}

	}