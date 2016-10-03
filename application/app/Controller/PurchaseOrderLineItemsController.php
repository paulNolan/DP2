<?php
App::uses('AppController', 'Controller');
/**
 * PurchaseOrderLineItems Controller
 *
 * @property PurchaseOrderLineItem $PurchaseOrderLineItem
 * @property PaginatorComponent $Paginator
 * @property SessionComponent $Session
 * @property FlashComponent $Flash
 */
class PurchaseOrderLineItemsController extends AppController {

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
		$this->PurchaseOrderLineItem->recursive = 0;
		$this->set('purchaseOrderLineItems', $this->Paginator->paginate());
	}

/**
 * admin_view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_view($id = null) {
		if (!$this->PurchaseOrderLineItem->exists($id)) {
			throw new NotFoundException(__('Invalid purchase order line item'));
		}
		$options = array('conditions' => array('PurchaseOrderLineItem.' . $this->PurchaseOrderLineItem->primaryKey => $id));
		$this->set('purchaseOrderLineItem', $this->PurchaseOrderLineItem->find('first', $options));
	}

/**
 * admin_add method
 *
 * @return void
 */
	public function admin_add() {
		if ($this->request->is('post')) {
			$this->PurchaseOrderLineItem->create();
			if ($this->PurchaseOrderLineItem->save($this->request->data)) {
				$this->Flash->success(__('The purchase order line item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The purchase order line item could not be saved. Please, try again.'));
			}
		}
		$purchaseOrders = $this->PurchaseOrderLineItem->PurchaseOrder->find('list');
		$products = $this->PurchaseOrderLineItem->Product->find('list');
		$this->set(compact('purchaseOrders', 'products'));
	}

/**
 * admin_edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_edit($id = null) {
		if (!$this->PurchaseOrderLineItem->exists($id)) {
			throw new NotFoundException(__('Invalid purchase order line item'));
		}
		if ($this->request->is(array('post', 'put'))) {
			if ($this->PurchaseOrderLineItem->save($this->request->data)) {
				$this->Flash->success(__('The purchase order line item has been saved.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('The purchase order line item could not be saved. Please, try again.'));
			}
		} else {
			$options = array('conditions' => array('PurchaseOrderLineItem.' . $this->PurchaseOrderLineItem->primaryKey => $id));
			$this->request->data = $this->PurchaseOrderLineItem->find('first', $options);
		}
		$purchaseOrders = $this->PurchaseOrderLineItem->PurchaseOrder->find('list');
		$products = $this->PurchaseOrderLineItem->Product->find('list');
		$this->set(compact('purchaseOrders', 'products'));
	}

/**
 * admin_delete method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function admin_delete($id = null) {
		$this->PurchaseOrderLineItem->id = $id;
		if (!$this->PurchaseOrderLineItem->exists()) {
			throw new NotFoundException(__('Invalid purchase order line item'));
		}
		$this->request->allowMethod('post', 'delete');
		if ($this->PurchaseOrderLineItem->delete()) {
			$this->Flash->success(__('The purchase order line item has been deleted.'));
		} else {
			$this->Flash->error(__('The purchase order line item could not be deleted. Please, try again.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
