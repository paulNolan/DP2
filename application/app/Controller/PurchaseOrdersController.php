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

	public $paginate = array(
		'PurchaseOrder' => array(
			'contain' => array(
				'Staff',
				'Customer',
				'PurchaseOrderLineItem.Product'
			)
		)
	);

	public function admin_export() {
		if (!isset($this->request->data['start-date']) || !isset($this->request->data['end-date']) || !$this->request->is('post')) {
			throw new NotFoundException(__('Invalid purchase order'));
		}

		$this->response->download('purchase_orders.csv');

		$startDate = $this->request->data['start-date_submit'] .= ' 00:00:00';
		$endDate = $this->request->data['end-date_submit'] .= ' 23:59:59';

		$purchaseOrders = $this->PurchaseOrder->find('all', array(
			'contain' => array(
				'PurchaseOrderLineItem.Product'
			),
			'conditions' => array(
				'PurchaseOrder.created >=' => date('Y-m-d H:i:s', strtotime($startDate)),
				'PurchaseOrder.created <=' => date('Y-m-d H:i:s', strtotime($endDate)),
			)
		));

		$products = array();
		foreach ($purchaseOrders as $purchaseOrder) {
			foreach ($purchaseOrder['PurchaseOrderLineItem'] as $item) {
				if (!isset($products[$item['product_id']])) {
					$products[$item['product_id']] = array(
						'name' => '',
						'qty' => 0,
						'total' => 0,
					);
				}
				$products[$item['product_id']]['name'] = $item['Product']['name'];
				$products[$item['product_id']]['qty'] += $item['qty'];
				$products[$item['product_id']]['total'] += ($item['qty'] * $item['price']);
			}
		}

//		pr($products); exit();

		$this->set(compact('products', 'startDate', 'endDate'));
	}

	/**
	 * admin_index method
	 *
	 * @return void
	 */
	public function admin_index() {
		$this->set('purchaseOrders', $this->Paginator->paginate('PurchaseOrder'));
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
		$purchaseOrder = $this->PurchaseOrder->find('first', array(
			'contain' => array(
				'Staff',
				'Customer',
				'PurchaseOrderLineItem.Product'
			)
		));
		$this->set(compact('purchaseOrder'));
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
