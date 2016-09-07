<div class="container">
	<div class="row">
		<?php echo $this->element('Navigation/entity'); ?>
		<div class="col s9">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text">Viewing Product</h5>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12 white z-depth-1">
					<div class="row form-container">
						<div class="row">
							<div class="col s4">
								<h6>First name</h6>
								<p><?php echo h($product['Product']['name']); ?></p>
							</div>
							<div class="col s4">
								<h6>Family name</h6>
								<p><?php echo h($product['Product']['qty']); ?></p>
							</div>
							<div class="col s4">
								<h6>Price</h6>
								<p><?php echo sprintf('$0.2%f', $product['Product']['price']); ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col s12">
								<h6>Description</h6>
								<p><?php echo h($product['Product']['description']); ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								<h6>Created</h6>
								<p><?php echo date('d F Y @ H:i', strtotime($product['Product']['created'])); ?></p>
							</div>
							<div class="col s4">
								<h6>Last modified</h6>
								<p><?php echo date('d F Y @ H:i', strtotime($product['Product']['modified'])); ?></p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>