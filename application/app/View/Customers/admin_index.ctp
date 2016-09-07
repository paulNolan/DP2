<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text left">
						Customers
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
												echo $this->Html->tag('li', $this->Html->link(__('Edit'), array('action' => 'edit', $customer['Customer']['id'])));
												echo $this->Html->tag('li', $this->Form->postLink(__('Delete'), array('action' => 'delete', $customer['Customer']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $customer['Customer']['id']))));
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
