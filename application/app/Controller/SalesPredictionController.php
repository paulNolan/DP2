<?php
	App::uses('AppController', 'Controller');
	/**
	 * SalesPrediction Controller
	 *
	 * @property PurchaseOrder $PurchaseOrder
	 * @property PaginatorComponent $Paginator
	 * @property SessionComponent $Session
	 * @property FlashComponent $Flash
	 */
	class SalesPredictionController extends AppController
	{

		/**
		 * Components
		 *
		 * @var array
		 */
		public $components = array(
			'EntityNavigation'
		);

		public $uses = array(
			'PurchaseOrder'
		);

		public function admin_index() {
			if ($this->request->is('post')) {
				$years = $this->PurchaseOrder->getAverageSalesForProducts($this->request->data['PurchaseOrder']);

				$this->set(compact('years'));
			}

			$this->set(compact('startYear', 'endYear', 'month'));
		}

	}