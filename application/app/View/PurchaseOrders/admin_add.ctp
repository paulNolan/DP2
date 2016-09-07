<div class="container">
	<div class="row">
		<?php echo $this->element('Navigation/entity'); ?>
		<div class="col s9">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text">Customers</h5>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12 white z-depth-1">
					<div class="row form-container">
						<?php
							echo $this->Form->create('PurchaseOrder', array('class' => 'col s12'));
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