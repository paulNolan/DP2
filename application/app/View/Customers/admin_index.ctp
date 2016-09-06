<div class="row">
	<div class="col s6">
		<h5 class="blue-grey-text text-darken-1">Customers</h5>
	</div>
	<div class="col s6">
		<?php echo $this->Html->link('<i class="material-icons">add</i>', array('action' => 'add'), array('escape' => false, 'class' => 'right btn-floating btn waves-effect waves-light red')); ?>
	</div>
</div>

<div class="row">
	<div class="col s12 m12 l12 white z-depth-1">
		<div class="data-table">
			<table class="responsive-table">
				<thead>
				<tr>
					<th><?php echo $this->Paginator->sort('#'); ?></th>
					<th><?php echo $this->Paginator->sort('first_name', 'Given Name'); ?></th>
					<th><?php echo $this->Paginator->sort('surname', 'Family Name'); ?></th>
					<th><?php echo $this->Paginator->sort('address'); ?></th>
					<th><?php echo $this->Paginator->sort('phone'); ?></th>
					<th><?php echo $this->Paginator->sort('email'); ?></th>
					<th><?php echo $this->Paginator->sort('medicare_num', 'Medicare Number'); ?></th>
					<th class="actions">&nbsp;</th>
				</tr>
				</thead>
				<tbody>
				<?php foreach ($customers as $customer): ?>
					<tr>
						<td><?php echo h($customer['Customer']['id']); ?>&nbsp;</td>
						<td><?php echo h($customer['Customer']['first_name']); ?>&nbsp;</td>
						<td><?php echo h($customer['Customer']['surname']); ?>&nbsp;</td>
						<td><?php echo h($customer['Customer']['address']); ?>&nbsp;</td>
						<td><?php echo h($customer['Customer']['phone']); ?>&nbsp;</td>
						<td><?php echo h($customer['Customer']['email']); ?>&nbsp;</td>
						<td><?php echo h($customer['Customer']['medicare_num']); ?>&nbsp;</td>
						<td class="actions right-align">
							<?php
								echo $this->Html->link('Actions', '#', array('data-activates' => 'dropdown-' . $customer['Customer']['id'], 'class' => 'dropdown-button btn'));
							?>
							<ul id="dropdown-<?php echo $customer['Customer']['id']; ?>" class="dropdown-content">
								<?php
									echo $this->Html->tag('li', $this->Html->link(__('View'), array('action' => 'view', $customer['Customer']['id'])));
									echo $this->Html->tag('li', $this->Html->link(__('Edit'), array('action' => 'view', $customer['Customer']['id'])));
									echo $this->Html->tag('li', $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['Customer']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $customer['Customer']['id']))));
								?>
							</ul>
						</td>
					</tr>
				<?php endforeach; ?>
				</tbody>
			</table>
			<p>
				<?php
					echo $this->Paginator->counter(array(
						'format' => __('Page {:page} of {:pages}, showing {:current} records out of {:count} total, starting on record {:start}, ending on {:end}')
					));
				?>	</p>
			<div class="paging">
				<?php
					echo $this->Paginator->prev('< ' . __('previous'), array(), null, array('class' => 'prev disabled'));
					echo $this->Paginator->numbers(array('separator' => ''));
					echo $this->Paginator->next(__('next') . ' >', array(), null, array('class' => 'next disabled'));
				?>
			</div>
		</div>
	</div>
</div>