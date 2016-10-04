<div class="container">
	<div class="row">
		<?php echo $this->element('Navigation/entity'); ?>
		<div class="col s9">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text">Viewing Staff</h5>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12 white z-depth-1">
					<div class="row form-container">
						<div class="row">
							<div class="col s4">
								<h6>Username</h6>
								<p><?php echo h($staff['Staff']['username']); ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								<h6>First name</h6>
								<p><?php echo h($staff['Staff']['first_name']); ?></p>
							</div>
							<div class="col s4">
								<h6>Family name</h6>
								<p><?php echo h($staff['Staff']['surname']); ?></p>
							</div>
							<div class="col s4">
								<h6>Address</h6>
								<p><?php echo h($staff['Staff']['address']); ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								<h6>Phone number</h6>
								<p><?php echo h($staff['Staff']['phone']); ?></p>
							</div>
							<div class="col s4">
								<h6>Email</h6>
								<p><?php echo h($staff['Staff']['email']); ?></p>
							</div>
							<div class="col s4">
								<h6>Medicare number</h6>
								<p><?php echo h($staff['Staff']['store_location']); ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								<h6>Created</h6>
								<p><?php echo date('d F Y @ H:i', strtotime($staff['Staff']['created'])); ?></p>
							</div>
							<div class="col s4">
								<h6>Last modified</h6>
								<p><?php echo date('d F Y @ H:i', strtotime($staff['Staff']['modified'])); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>