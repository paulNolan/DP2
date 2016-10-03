	<?php
		$counter = 0;
		foreach ($products as $product):
			if ($counter%4 == 0) echo '<div class="row">';
	?>
		<div class="col s12 m3">
			<div class="card">
				<div class="card-image waves-effect waves-block waves-light" >
					<?php #echo '<img src="data:image/jpeg;base64,'.base64_encode($product['Product']['image'] ).'"/>';?>
					<?php
						echo $this->Html->image('/files/product/photo/' . $product['Product']['photo_dir'] . '/' . $product['Product']['photo'], array('class' => 'activator', 'alt' => $product['Product']['name']));
					?>
				</div>

				<div class="card-content">
					<span class="card-title activator grey-text text-darken-4">
						<?php echo $product['Product']['name']; ?>
						<i class="material-icons right">more_vert</i>
					</span>
				</div>

				<div class="card-reveal">
					<span class="card-title grey-text text-darken-4"><?php echo $product['Product']['name']; ?> <i class="material-icons right">close</i></span>
					<p><?php echo $product['Product']['description']; ?></p>
				</div>

				<div class="card-action">
					<?php echo $this->Html->link('View this product', array('controller' => 'Products', 'action' => 'view', $product['Product']['id'])); ?>
				</div>
			</div>
		</div>
	<?php
			if ($counter%4 == 0) echo '<div class="row">';
			$counter++;
		endforeach;
	?>