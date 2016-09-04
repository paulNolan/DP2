<!DOCTYPE html>
<html>
<head>
	<?php echo $this->Html->charset(); ?>
	<title>
		<?php echo $application_name; ?>
	</title>
	<?php
		echo $this->Html->meta('icon');

		echo $this->fetch('meta');
		echo $this->Html->css('styles');
		echo $this->fetch('script');
	?>
	<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
	<link type="text/css" rel="stylesheet" href="/css/materialize.min.css"  media="screen,projection"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
</head>
<body<?php echo (isset($body_class) ? ' class="' . $body_class . '"' : ''); ?>>
	<div class="container">
		<?php echo $content_for_layout; ?>
	</div>

	<script type="text/javascript" src="/js/jquery.min.js"></script>
	<script type="text/javascript" src="/js/materialize.min.js"></script>
	<?php #echo $this->element('sql_dump'); ?>
</body>
</html>