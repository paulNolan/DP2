<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text left">
						Purchase Orders
					</h5>
					<?php
						echo $this->Html->link('<i class="material-icons">add</i>',
							array(
								'action' => 'add',
							),
							array(
								'escape' => false,
								'class' => 'btn-floating btn-small waves-effect waves-light blue-grey darken-2 right tooltipped',
								'data-position' => 'bottom',
								'data-delay' => 25,
								'data-tooltip' => 'Add record'
							)
						);
					?>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12 white z-depth-1">
					<div class="data-table">
						<table class="responsive-table">
							<thead>
							<tr>
								<th><?php echo $this->Paginator->sort('id', '#'); ?></th>
								<th><?php echo $this->Paginator->sort('staff_id', 'Salesperson'); ?></th>
								<th><?php echo $this->Paginator->sort('customer_id', 'Customer'); ?></th>
								<th><?php echo $this->Paginator->sort('created', 'Date of Sale'); ?></th>
								<th>Total Items Purchased</th>
								<th><?php echo $this->Paginator->sort('total', 'Total Sale Amount'); ?></th>
								<th class="actions">&nbsp;</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($purchaseOrders as $purchaseOrder): ?>
							<tr>
								<td><?php echo h($purchaseOrder['PurchaseOrder']['id']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link($purchaseOrder['Staff']['full_name'], array('controller' => 'staffs', 'action' => 'view', $purchaseOrder['Staff']['id'])); ?>
								</td>
								<td>
									<?php echo $this->Html->link($purchaseOrder['Customer']['full_name'], array('controller' => 'customer', 'action' => 'view', $purchaseOrder['Customer']['id'])); ?>
								</td>
								<td><?php echo date('d F Y @ H:i:s', strtotime($purchaseOrder['PurchaseOrder']['created'])); ?>&nbsp;</td>
								<td><?php echo $purchaseOrder['PurchaseOrder']['total_items']; ?>&nbsp;</td>
								<td><?php echo sprintf('$%0.2f', $purchaseOrder['PurchaseOrder']['total']); ?></td>
								<td class="actions right-align">
									<?php
										echo $this->Html->link('Actions', '#', array('data-activates' => 'dropdown-' . $purchaseOrder['PurchaseOrder']['id'], 'class' => 'dropdown-button btn'));
									?>
									<ul id="dropdown-<?php echo $purchaseOrder['PurchaseOrder']['id']; ?>" class="dropdown-content">
										<?php
											echo $this->Html->tag('li', $this->Html->link(__('View'), array('action' => 'view', $purchaseOrder['PurchaseOrder']['id'])));
											echo $this->Html->tag('li', $this->Html->link(__('Edit'), array('action' => 'edit', $purchaseOrder['PurchaseOrder']['id'])));
											echo $this->Html->tag('li', $this->Form->postLink(__('Delete'), array('action' => 'delete', $purchaseOrder['PurchaseOrder']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseOrder['PurchaseOrder']['id']))));
										?>
									</ul>
								</td>
							</tr>
							<?php endforeach; ?>
							</tbody>
						</table>
						<?php echo $this->element('Navigation/pagination'); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>