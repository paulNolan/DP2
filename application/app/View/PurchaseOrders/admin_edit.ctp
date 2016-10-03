<div class="container">
	<div class="row">
		<?php echo $this->element('Navigation/entity'); ?>
		<div class="col s9">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text">Purchase Orders</h5>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12 white z-depth-1">
					<div class="row form-container">
						<?php
							echo $this->Form->create('PurchaseOrder', array('class' => 'col s12'));
							echo $this->Form->hidden('PurchaseOrder.id');
						?>
						<div class="row">
							<?php
								echo $this->Form->input('PurchaseOrder.staff_id', array(
									'empty' => 'Choose a salesperson',
									'div' => 'col s6',
									'class' => 'browser-default'
								));
								echo $this->Form->input('PurchaseOrder.customer_id', array(
									'empty' => 'Choose a customer',
									'div' => 'col s6',
									'class' => 'browser-default'
								));
							?>
						</div>
						<div class="divider" style="margin: 2.5em 0;"></div>
						<div class="row">
							<?php
								echo $this->Html->link('<i class="material-icons">add</i>',
									'#',
									array(
										'escape' => false,
										'id' => 'add-product',
										'class' => 'btn-floating btn-small waves-effect waves-light blue-grey darken-2 right tooltipped',
										'data-position' => 'bottom',
										'data-delay' => 25,
										'data-tooltip' => 'Add another product'
									)
								);
							?>
						</div>
						<?php
							$counter = 0;
							foreach ($this->request->data['PurchaseOrderLineItem'] as $item):
						?>
						<div class="row product-row">
							<?php
								echo $this->Form->input('PurchaseOrderLineItem.' . $counter . '.product_id', array(
									'empty' => 'Choose a product',
									'div' => 'col s4',
									'class' => 'browser-default'
								));
								echo $this->Form->input('PurchaseOrderLineItem.' . $counter . '.qty', array(
									'label' => 'Quantity',
									'div' => 'col s4',
									'class' => 'browser-default'
								));
								echo $this->Form->input('PurchaseOrderLineItem.' . $counter . '.price', array(
									'label' => 'Price ($)',
									'div' => 'col s4',
									'class' => 'browser-default'
								));
							?>
						</div>
						<?php
								$counter++;
							endforeach;
						?>
						<div class="row">
							<?php
								echo $this->Form->submit('Create', array(
									'div' => 'input-field col s12',
									'class' => 'waves-effect waves-light btn'
								));
							?>
						</div>
						<?php
							echo $this->Form->end();
						?>
					</div>
				</div>
			</div>
		</div>
	</div>

</div>