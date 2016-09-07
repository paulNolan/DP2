<div class="purchaseOrders view">
<h2><?php echo __('Purchase Order'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($purchaseOrder['PurchaseOrder']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Staff'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchaseOrder['Staff']['username'], array('controller' => 'staffs', 'action' => 'view', $purchaseOrder['Staff']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Customers'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchaseOrder['Customers']['id'], array('controller' => 'customers', 'action' => 'view', $purchaseOrder['Customers']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Created'); ?></dt>
		<dd>
			<?php echo h($purchaseOrder['PurchaseOrder']['created']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Modified'); ?></dt>
		<dd>
			<?php echo h($purchaseOrder['PurchaseOrder']['modified']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Purchase Order'), array('action' => 'edit', $purchaseOrder['PurchaseOrder']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Purchase Order'), array('action' => 'delete', $purchaseOrder['PurchaseOrder']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseOrder['PurchaseOrder']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Orders'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Staffs'), array('controller' => 'staffs', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Staff'), array('controller' => 'staffs', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Customers'), array('controller' => 'customers', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Customers'), array('controller' => 'customers', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
<div class="related">
	<h3><?php echo __('Related Products'); ?></h3>
	<?php if (!empty($purchaseOrder['Product'])): ?>
	<table cellpadding = "0" cellspacing = "0">
	<tr>
		<th><?php echo __('Id'); ?></th>
		<th><?php echo __('Description'); ?></th>
		<th><?php echo __('Qty'); ?></th>
		<th><?php echo __('Price'); ?></th>
		<th><?php echo __('Created'); ?></th>
		<th><?php echo __('Modified'); ?></th>
		<th class="actions"><?php echo __('Actions'); ?></th>
	</tr>
	<?php foreach ($purchaseOrder['Product'] as $product): ?>
		<tr>
			<td><?php echo $product['id']; ?></td>
			<td><?php echo $product['description']; ?></td>
			<td><?php echo $product['qty']; ?></td>
			<td><?php echo $product['price']; ?></td>
			<td><?php echo $product['created']; ?></td>
			<td><?php echo $product['modified']; ?></td>
			<td class="actions">
				<?php echo $this->Html->link(__('View'), array('controller' => 'products', 'action' => 'view', $product['id'])); ?>
				<?php echo $this->Html->link(__('Edit'), array('controller' => 'products', 'action' => 'edit', $product['id'])); ?>
				<?php echo $this->Form->postLink(__('Delete'), array('controller' => 'products', 'action' => 'delete', $product['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['id']))); ?>
			</td>
		</tr>
	<?php endforeach; ?>
	</table>
<?php endif; ?>

	<div class="actions">
		<ul>
			<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
		</ul>
	</div>
</div>
