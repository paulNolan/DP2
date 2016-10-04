<div class="container">
	<div class="row">
		<?php echo $this->element('Navigation/entity'); ?>
		<div class="col s9">
			<div class="row no-margin">
				<div class="content-header teal lighten-2">
					<h5 class="white-text">Viewing Purchase Order</h5>
				</div>
			</div>

			<div class="row">
				<div class="col s12 m12 l12 white z-depth-1">
					<div class="row form-container">
						<h4>Order Details</h4>
						<div class="row">
							<div class="col s4">
								<h6>Sold by</h6>
								<p><?php echo h($purchaseOrder['Staff']['full_name']); ?></p>
							</div>
							<div class="col s4">
								<h6>Customer</h6>
								<p><?php echo h($purchaseOrder['Customer']['full_name']); ?></p>
							</div>
							<div class="col s4">
								<h6>Total Sale Amount</h6>
								<p><?php echo sprintf('$%0.2f', $purchaseOrder['PurchaseOrder']['total']); ?></p>
							</div>
						</div>
						<div class="row">
							<div class="col s4">
								<h6>Date of sale</h6>
								<p><?php echo date('d F Y', strtotime($purchaseOrder['PurchaseOrder']['created'])); ?></p>
							</div>
							<div class="col s4">
								<h6>Time of sale</h6>
								<p><?php echo date('H:i:s', strtotime($purchaseOrder['PurchaseOrder']['created'])); ?></p>
							</div>
						</div>
						<div class="divider"></div>
						<h4>Products</h4>
						<?php
							foreach ($purchaseOrder['PurchaseOrderLineItem'] as $item):
						?>
						<div class="row">
							<div class="col s3">
								<h6>Product</h6>
								<p><?php echo h($item['Product']['name']); ?></p>
							</div>
							<div class="col s3">
								<h6>Price</h6>
								<p>
									<?php
										echo h($item['price']);
										if ($item['price'] < $item['Product']['price']) {
											echo '<br><span class="red-text">(' . number_format($item['price'] / $item['Product']['price'], 2) * 100 . '% discount)</span>';
										}
									?>
								</p>
							</div>
							<div class="col s3">
								<h6>Quantity</h6>
								<p><?php echo h($item['qty']); ?></p>
							</div>
							<div class="col s3">
								<h6>Total</h6>
								<p><?php echo sprintf('$%0.2f', ($item['price'] * $item['qty'])); ?></p>
							</div>
						</div>
						<?php
							endforeach;
						?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>