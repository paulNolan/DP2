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
							echo $this->Form->create('Customer', array('class' => 'col s12'));
						?>
						<div class="row">
							<?php
								echo $this->Form->input('Customer.first_name', array(
									'div' => 'input-field col s6'
								));
								echo $this->Form->input('Customer.surname', array(
									'div' => 'input-field col s6'
								));
							?>
						</div>
						<div class="row">
							<?php
								echo $this->Form->input('Customer.phone', array(
									'div' => 'input-field col s6',
									'type' => 'text'
								));
								echo $this->Form->input('Customer.email', array(
									'div' => 'input-field col s6'
								));
							?>
						</div>
						<div class="row">
							<?php
								echo $this->Form->input('Customer.address', array(
									'div' => 'input-field col s6'
								));
								echo $this->Form->input('Customer.medicare_num', array(
									'div' => 'input-field col s6',
									'label' => 'Medicare Number',
									'type' => 'text'
								));
							?>
						</div>
						<div class="row">
							<?php
								echo $this->Form->submit('Create', array(
									'div' => 'input-field col s12',
									'class' => 'btn'
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