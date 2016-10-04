<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text left">
						Staff
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
								<th><?php echo $this->Paginator->sort('store_location'); ?></th>
								<th class="actions">&nbsp;</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($staffs as $staff): ?>
								<tr>
									<td><?php echo h($staff['Staff']['id']); ?>&nbsp;</td>
									<td><?php echo h($staff['Staff']['first_name']); ?>&nbsp;</td>
									<td><?php echo h($staff['Staff']['surname']); ?>&nbsp;</td>
									<td><?php echo h($staff['Staff']['address']); ?>&nbsp;</td>
									<td><?php echo h($staff['Staff']['phone']); ?>&nbsp;</td>
									<td><?php echo h($staff['Staff']['email']); ?>&nbsp;</td>
									<td><?php echo h($staff['Staff']['store_location']); ?>&nbsp;</td>
									<td class="actions right-align">
										<?php
											echo $this->Html->link('Actions', '#', array('data-activates' => 'dropdown-' . $staff['Staff']['id'], 'class' => 'dropdown-button btn'));
										?>
										<ul id="dropdown-<?php echo $staff['Staff']['id']; ?>" class="dropdown-content">
											<?php
												echo $this->Html->tag('li', $this->Html->link(__('View'), array('action' => 'view', $staff['Staff']['id'])));
												echo $this->Html->tag('li', $this->Html->link(__('Edit'), array('action' => 'edit', $staff['Staff']['id'])));
												echo $this->Html->tag('li', $this->Form->postLink(__('Delete'), array('action' => 'delete', $staff['Staff']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $staff['Staff']['id']))));
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
