<?php
App::uses('AppController', 'Controller');
/**
 * Staff Controller
 *
 * @property Staff $Staff
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class StaffController extends AppController {

	public $name = 'Staff';

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array(
		'Paginator',
		'Session',
		'Flash'
	);

	/**
	 * beforeFilter callback
	 *
	 * @return void
	 */
	public function beforeFilter() {
		parent::beforeFilter();
//		$this->Auth->allow('admin_add');
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->Staff->recursive = 0;
		$this->set('staffs', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
		$this->set('staff', $this->Staff->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->Staff->create();
			if ($this->Staff->save($this->request->data)) {
				$this->Flash->success(__('The staff has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The staff could not be saved. Please, try again.'));
			}
		}
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->Staff->exists($id)) {
			throw new NotFoundException(__('Invalid staff'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->Staff->save($this->request->data)) {
				$this->Flash->success(__('The staff has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The staff could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('Staff.' . $this->Staff->primaryKey => $id));
			$this->request->data = $this->Staff->find('first', $options);
		}
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->Staff->id = $id;
		if (!$this->Staff->exists()) {
			throw new NotFoundException(__('Invalid staff'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->Staff->delete()) {
			$this->Flash->success(__('The staff has been deleted.'));
		} else {
			$this->Flash->error(__('The staff could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
