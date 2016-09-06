<?php
/**
 * Application level Controller
 *
 * This file is application-wide controller file. You can put all
 * application-wide controller-related methods here.
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 * @link          http://cakephp.org CakePHP(tm) Project
 * @package       app.Controller
 * @since         CakePHP(tm) v 0.2.9
 * @license       http://www.opensource.org/licenses/mit-license.php MIT License
 */

App::uses('Controller', 'Controller');

/**
 * Application Controller
 *
 * Add your application-wide methods in the class below, your controllers
 * will inherit them.
 *
 * @package		app.Controller
 * @link		http://book.cakephp.org/2.0/en/controllers.html#the-app-controller
 */
class AppController extends Controller {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array(
		'Flash',
		'Auth' => array(
			'loginAction' => array(
				'admin' => false,
				'controller' => 'users',
				'action' => 'login',
			),
			'loginRedirect' => array(
				'admin' => true,
				'controller' => 'pages',
				'action' => 'home'
			),
			'logoutRedirect' => array(
				'admin' => false,
				'controller' => 'users',
				'action' => 'login',
			),
			'authenticate' => array(
				'Form' => array(
					'userModel' => 'Staff',
					'fields' => array(
						'password' => 'password_hash',
					),
					'passwordHasher' => 'Blowfish'
				)
			)
		),
		'AdminNavigation'
	);

	/**
	 * beforeFilter callback
	 *
	 * @return void
	 */
    public function beforeFilter() {
    	$this->Auth->allow();
		$this->Auth->deny(
			'admin_add',
			'admin_index',
			'admin_view',
			'admin_edit',
			'admin_home'
		);
	    $title_for_layout = $application_name = 'PHPSreps';
        $this->set(compact('title_for_layout', 'application_name'));
    }

	/**
	 * beforeRender callback
	 *
	 * @return void
	 */
    public function beforeRender() {
    	if ($this->Auth->loggedIn()) {
		    if (isset($this->request->params['admin'])) {
			    $this->layout = 'admin';
			    $this->viewVars['title_for_layout'] .= ' | Admin';
			    $body_class = 'blue-grey lighten-4 admin';
			    $this->set(compact('body_class'));
		    }
	    }
	}

}
