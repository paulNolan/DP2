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
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($purchaseOrders as $purchaseOrder): ?>
							<tr>
								<td><?php echo h($purchaseOrder['PurchaseOrder']['id']); ?>&nbsp;</td>
								<td>
									<?php echo $this->Html->link($purchaseOrder['Staff']['username'], array('controller' => 'staffs', 'action' => 'view', $purchaseOrder['Staff']['id'])); ?>
								</td>
								<td>
									<?php echo $this->Html->link($purchaseOrder['Customer']['id'], array('controller' => 'customer', 'action' => 'view', $purchaseOrder['Customer']['id'])); ?>
								</td>
								<td><?php echo h($purchaseOrder['PurchaseOrder']['created']); ?>&nbsp;</td>
								<td><?php echo h($purchaseOrder['PurchaseOrder']['modified']); ?>&nbsp;</td>
								<td class="actions">
									<?php echo $this->Html->link(__('View'), array('action' => 'view', $purchaseOrder['PurchaseOrder']['id'])); ?>
									<?php echo $this->Html->link(__('Edit'), array('action' => 'edit', $purchaseOrder['PurchaseOrder']['id'])); ?>
									<?php echo $this->Form->postLink(__('Delete'), array('action' => 'delete', $purchaseOrder['PurchaseOrder']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseOrder['PurchaseOrder']['id']))); ?>
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