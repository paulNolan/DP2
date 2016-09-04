<?php
App::uses('AppController', 'Controller');
/**
 * PurchaseOrders Controller
 *
 * @property PurchaseOrder $PurchaseOrder
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PurchaseOrdersController extends AppController {

	/**
	 * Components
	 *
	 * @var array
	 */
	public $components = array('Paginator', 'Session', 'Flash');

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->PurchaseOrder->recursive = 0;
		$this->set('purchaseOrders', $this->Paginator->paginate());
	}

	/**
	 * admin_view method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_view($id = null) {
		if (!$this->PurchaseOrder->exists($id)) {
			throw new NotFoundException(__('Invalid purchase order'));
		}
		$options = array('conditions' => array('PurchaseOrder.' . $this->PurchaseOrder->primaryKey => $id));
		$this->set('purchaseOrder', $this->PurchaseOrder->find('first', $options));
	}

	/**
	 * admin_add method
	 *
	 * @return void
	 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PurchaseOrder->create();
			if ($this->PurchaseOrder->save($this->request->data)) {
				$this->Flash->success(__('The purchase order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The purchase order could not be saved. Please, try again.'));
			}
		}
		$staffs = $this->PurchaseOrder->Staff->find('list');
		$customers = $this->PurchaseOrder->Customer->find('list');
		$products = $this->PurchaseOrder->Product->find('list');
		$this->set(compact('staffs', 'customers', 'products'));
	}

	/**
	 * admin_edit method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_edit($id = null) {
		if (!$this->PurchaseOrder->exists($id)) {
			throw new NotFoundException(__('Invalid purchase order'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PurchaseOrder->save($this->request->data)) {
				$this->Flash->success(__('The purchase order has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The purchase order could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PurchaseOrder.' . $this->PurchaseOrder->primaryKey => $id));
			$this->request->data = $this->PurchaseOrder->find('first', $options);
		}
		$staffs = $this->PurchaseOrder->Staff->find('list');
		$customers = $this->PurchaseOrder->Customer->find('list');
		$products = $this->PurchaseOrder->Product->find('list');
		$this->set(compact('staffs', 'customers', 'products'));
	}

	/**
	 * admin_delete method
	 *
	 * @throws NotFoundException
	 * @param string $id
	 * @return void
	 */
	public function admin_delete($id = null) {
		$this->PurchaseOrder->id = $id;
		if (!$this->PurchaseOrder->exists()) {
			throw new NotFoundException(__('Invalid purchase order'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PurchaseOrder->delete()) {
			$this->Flash->success(__('The purchase order has been deleted.'));
		} else {
			$this->Flash->error(__('The purchase order could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
