<div class="purchaseOrderLineItems view">
<h2><?php echo __('Purchase Order Line Item'); ?></h2>
	<dl>
		<dt><?php echo __('Id'); ?></dt>
		<dd>
			<?php echo h($purchaseOrderLineItem['PurchaseOrderLineItem']['id']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Purchase Order'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchaseOrderLineItem['PurchaseOrder']['id'], array('controller' => 'purchase_orders', 'action' => 'view', $purchaseOrderLineItem['PurchaseOrder']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Product'); ?></dt>
		<dd>
			<?php echo $this->Html->link($purchaseOrderLineItem['Product']['description'], array('controller' => 'products', 'action' => 'view', $purchaseOrderLineItem['Product']['id'])); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Qty'); ?></dt>
		<dd>
			<?php echo h($purchaseOrderLineItem['PurchaseOrderLineItem']['qty']); ?>
			&nbsp;
		</dd>
		<dt><?php echo __('Price'); ?></dt>
		<dd>
			<?php echo h($purchaseOrderLineItem['PurchaseOrderLineItem']['price']); ?>
			&nbsp;
		</dd>
	</dl>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>
		<li><?php echo $this->Html->link(__('Edit Purchase Order Line Item'), array('action' => 'edit', $purchaseOrderLineItem['PurchaseOrderLineItem']['id'])); ?> </li>
		<li><?php echo $this->Form->postLink(__('Delete Purchase Order Line Item'), array('action' => 'delete', $purchaseOrderLineItem['PurchaseOrderLineItem']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $purchaseOrderLineItem['PurchaseOrderLineItem']['id']))); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Order Line Items'), array('action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order Line Item'), array('action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Purchase Orders'), array('controller' => 'purchase_orders', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Purchase Order'), array('controller' => 'purchase_orders', 'action' => 'add')); ?> </li>
		<li><?php echo $this->Html->link(__('List Products'), array('controller' => 'products', 'action' => 'index')); ?> </li>
		<li><?php echo $this->Html->link(__('New Product'), array('controller' => 'products', 'action' => 'add')); ?> </li>
	</ul>
</div>
