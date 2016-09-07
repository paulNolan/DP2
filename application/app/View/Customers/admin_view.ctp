<div class="container">
	<div class="row">
		<?php echo $this->element('Navigation/entity'); ?>
		<div class="col s9">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text">Viewing Customer</h5>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12 white z-depth-1">
					<div class="row form-container">
						<div class="row">
							<div class="col s4">
								<h6>First name</h6>
								<p><?php echo h($customer['Customer']['first_name']); ?></p>
							</div>
							<div class="col s4">
								<h6>Family name</h6>
								<p><?php echo h($customer['Customer']['surname']); ?></p>
							</div>
							<div class="col s4">
								<h6>Address</h6>
								<p><?php echo h($customer['Customer']['address']); ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								<h6>Phone number</h6>
								<p><?php echo h($customer['Customer']['phone']); ?></p>
							</div>
							<div class="col s4">
								<h6>Email</h6>
								<p><?php echo h($customer['Customer']['email']); ?></p>
							</div>
							<div class="col s4">
								<h6>Medicare number</h6>
								<p><?php echo h($customer['Customer']['medicare_num']); ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								<h6>Created</h6>
								<p><?php echo date('d F Y @ H:i', strtotime($customer['Customer']['created'])); ?></p>
							</div>
							<div class="col s4">
								<h6>Last modified</h6>
								<p><?php echo date('d F Y @ H:i', strtotime($customer['Customer']['modified'])); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>