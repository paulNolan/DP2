<?php echo $this->element('Base/header'); ?>

<header>
	<nav>
		<div class="nav-wrapper blue-grey darken-2">
			<a href="#!" class="brand-logo center"><?php echo $application_name; ?> </a>
			<ul class="left hide-on-med-and-down">
				<?php
					foreach ($admin_navigation as $title => $params) {
						echo $this->Html->tag('li', $this->Html->link($title, $params['url']), array('class' => $params['class']));
					}
				?>
			</ul>
			<ul class="right hide-on-med-and-down">
				<li>
					<?php
						echo $this->Html->link('Logout',
							array(
								'admin' => false, 'controller' => 'users', 'action' => 'logout'),
							array(
								'class' => 'btn waves-effect waves-light'
							));
					?>
				</li>
			</ul>
		</div>
	</nav>
</header>

<section id="main" class="blue-grey lighten-4">
	<?php echo $content_for_layout; ?>
</section>

<?php echo $this->element('Base/footer'); ?>