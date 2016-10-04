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
	public $components = array(
		'EntityNavigation'
	);

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
			$continue = true;
			$total = 0.00;
			foreach ($this->request->data['PurchaseOrderLineItem'] as $index => $item) {
				$total += ($item['price'] * $item['qty']);
				$product = $this->PurchaseOrder->PurchaseOrderLineItem->Product->findById($item['product_id']);
				if ($product['Product']['qty'] == 0 || $item['qty'] > $product['Product']['qty']) {
					$continue = false;
					$this->PurchaseOrder->PurchaseOrderLineItem->invalidate('0.product_id');
					$this->PurchaseOrder->PurchaseOrderLineItem->validationErrors[$index]['product_id'] = 'Insufficient quantity available for this product';
				}
				else if ($item['qty'] <= 0) {
					$continue = false;
					$this->PurchaseOrder->PurchaseOrderLineItem->invalidate('0.qty');
					$this->PurchaseOrder->PurchaseOrderLineItem->validationErrors[$index]['qty'] = 'A quantity greater than zero is required';
				}
			}
			$this->request->data['PurchaseOrder']['total'] = $total;
			if ($continue and $this->PurchaseOrder->saveAssociated($this->request->data)) {
				$this->Flash->success(__('New purchase order record created successfully.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Could not create new purchase order record.<br>Please correct the errors below and try again.'));
			}
		}
		$staffs = $this->PurchaseOrder->Staff->getList();
		$customers = $this->PurchaseOrder->Customer->getList();
		$products = $this->PurchaseOrder->PurchaseOrderLineItem->Product->getProductList();
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
				$this->Flash->success(__('Purchase Order record updated successfully.'));
				return $this->redirect(array('action' => 'index'));
			} else {
				$this->Flash->error(__('Could not update purchase order record.<br>Please correct the errors below and try again.'));
			}
		} else {
			$options = array('conditions' => array('PurchaseOrder.' . $this->PurchaseOrder->primaryKey => $id));
			$this->request->data = $this->PurchaseOrder->find('first', $options);
		}
		$staffs = $this->PurchaseOrder->Staff->getList();
		$customers = $this->PurchaseOrder->Customer->getList();
		$products = $this->PurchaseOrder->PurchaseOrderLineItem->Product->getProductList();
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
			$this->Flash->success(__('Purchase Order record deleted successfully.'));
		} else {
			$this->Flash->error(__('Could not delete purchase order record.'));
		}
		return $this->redirect(array('action' => 'index'));
	}
}
