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
				<div >
                    <h6 class="red-text left">
                        Red rows indicate low stock alert
                     </h6>
                </div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12 white z-depth-1">
					<div class="data-table">
						<table class="responsive-table">
							<thead>
							<tr>
								<th><?php echo $this->Paginator->sort('id', '#'); ?></th>
								<th><?php echo $this->Paginator->sort('name', 'Product Name'); ?></th>
								<th><?php echo $this->Paginator->sort('description'); ?></th>
								<th><?php echo $this->Paginator->sort('qty', 'Quantity'); ?></th>
								<th><?php echo $this->Paginator->sort('price'); ?></th>
								<th class="actions">&nbsp;</th>
							</tr>
							</thead>
							<tbody>
							<?php foreach ($products as $product): ?>
							<tr>


								<?php
								       if($product['Product']['qty'] < 15)
								       {
								          echo "<td style='background-color: #C67171;'>".$product['Product']['id']."</td>";
								          echo "<td style='background-color: #C67171;'>".$product['Product']['name']."</td>";
								          echo "<td style='background-color: #C67171;'>".$this->Text->truncate(trim(strip_tags($product['Product']['description'])), 70,
                                                                                         										array(
                                                                                         											'ellipsis' => '...',
                                                                                         											'exact' => false
                                                                                         										))."</td>";
								          echo "<td style='background-color: #C67171;'>".$product['Product']['qty']."</td>";
								          echo "<td style='background-color: #C67171;'>".number_format($product['Product']['price'],2)."</td>";

								       }
								       else
								       {
								            echo "<td>".$product['Product']['id']."</td>";
								            echo "<td>".$product['Product']['name']."</td>";
								            echo "<td>".$this->Text->truncate(trim(strip_tags($product['Product']['description'])), 70,
                                                        										array(
                                                        											'ellipsis' => '...',
                                                        											'exact' => false
                                                        										))."</td>";
								            echo "<td>".$product['Product']['qty']."</td>";
								            echo "<td>".number_format($product['Product']['price'],2)."</td>";
								       }

                                          ?>&nbsp;

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
