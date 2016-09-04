<div class="staff form">
<?php echo $this->Form->create('Staff'); ?>
	<fieldset>
		<legend><?php echo __('Admin Add Staff'); ?></legend>
	<?php
		echo $this->Form->input('first_name');
		echo $this->Form->input('surname');
		echo $this->Form->input('address');
		echo $this->Form->input('phone');
		echo $this->Form->input('email');
		echo $this->Form->input('store_location');
		echo $this->Form->input('username');
		echo $this->Form->input('password_hash');
	?>
	</fieldset>
<?php echo $this->Form->end(__('Create')); ?>
</div>
<div class="actions">
	<h3><?php echo __('Actions'); ?></h3>
	<ul>

		<li><?php echo $this->Html->link(__('List Customers'), array('action' => 'index')); ?></li>
	</ul>
</div>
