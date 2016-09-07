<div class="container">
	<div class="row">
		<div class="col s12">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text left">
						Products
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
								<th><?php echo $this->Paginator->sort('description'); ?></th>
								<th><?php echo $this->Paginator->sort('qty', 'Quantity'); ?></th>
								<th><?php echo $this->Paginator->sort('price'); ?></th>
								<th class="actions"><?php echo __('Actions'); ?></th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($products as $product): ?>
							<tr>
								<td><?php echo h($product['Product']['id']); ?>&nbsp;</td>
								<td><?php echo h($product['Product']['description']); ?>&nbsp;</td>
								<td><?php echo h($product['Product']['qty']); ?>&nbsp;</td>
								<td><?php echo h($product['Product']['price']); ?>&nbsp;</td>
								<td class="actions right-align">
									<?php
										echo $this->Html->link('Actions', '#', array('data-activates' => 'dropdown-' . $product['Product']['id'], 'class' => 'dropdown-button btn'));
									?>
									<ul id="dropdown-<?php echo $product['Product']['id']; ?>" class="dropdown-content">
										<?php
											echo $this->Html->tag('li', $this->Html->link(__('View'), array('action' => 'view', $product['Product']['id'])));
											echo $this->Html->tag('li', $this->Html->link(__('Edit'), array('action' => 'edit', $product['Product']['id'])));
											echo $this->Html->tag('li', $this->Form->postLink(__('Delete'), array('action' => 'delete', $product['Product']['id']), array('confirm' => __('Are you sure you want to delete # %s?', $product['Product']['id']))));
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
