<div class="container">
	<div class="row">
		<?php echo $this->element('Navigation/entity'); ?>
		<div class="col s9">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text">Add Products</h5>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12 white z-depth-1">
					<div class="row form-container">
						<?php
							echo $this->Form->create('Product', array('class' => 'col s12'));
						?>
						<div class="row">
							<?php
								echo $this->Form->input('Product.name', array(
									'div' => 'input-field col s4'
								));
								echo $this->Form->input('Product.qty', array(
									'div' => 'input-field col s4',
									'label' => 'Quantity'
								));
								echo $this->Form->input('Product.price', array(
									'div' => 'input-field col s4',
									'type' => 'text',
									'label' => 'Price ($)'
								));
							?>
						</div>
						<div class="row">
							<?php
								echo $this->Form->input('Product.description', array(
									'div' => 'input-field col s12',
									'class' => 'materialize-textarea'
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