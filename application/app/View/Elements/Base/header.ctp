<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $title_for_layout; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->Html->css(array('materialize.min', 'styles'), array('media' => 'screen,projection'));
		echo $this->Html->script(array('jquery.min', 'materialize.min', 'scripts'), array('block' => 'scriptsBottom'));
	?>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body<?php echo (isset($body_class) ? ' class="' . $body_class . '"' : ''); ?>>

<?php echo $this->element('Preloader/circular_multi'); ?>