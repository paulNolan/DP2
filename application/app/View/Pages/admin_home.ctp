<?php
	$counter = 0;
	foreach ($products as $product):
		if ($counter%4 == 0) echo '<div class="row">';
?>
	<div class="col s12 m3">
		<div class="card">
			<div class="card-image">
				<?php echo $this->Html->image('http://placehold.it/600x300/009688/ffffff'); ?>
				<span class="card-title"><?php echo $product['Product']['name']; ?></span>
			</div>
			<div class="card-content">
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