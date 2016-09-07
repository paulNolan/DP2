<div class="col s3">
	<div class="row no-margin">
		<div class="col s12">
			<div class="content-header blue-grey lighten-1">
				<h5 class="white-text">Actions</h5>
			</div>
		</div>
	</div>
	<ul class="sub-navigation blue-grey darken-2">
		<?php
			foreach ($entity_navigation as $title => $link):
				$title .= ($link['url']['action'] == 'admin_index') ? ' ' . Inflector::humanize($this->request->params['controller']) : ' ' . Inflector::singularize(Inflector::humanize($this->request->params['controller']));

				if ($link['url']['action'] == 'admin_edit') {
					$link['url'][0] = current($this->request->params['pass']);
				}
		?>
				<li>
					<?php
						if ($link['url']['action'] == 'admin_delete') {
							echo $this->Form->postLink('Delete<i class="material-icons right">report_problem</i>', array('action' => 'delete', current($this->request->params['pass'])), array('escape' => false, 'class' => 'delete', 'confirm' => __('Are you sure you want to delete this record?', current($this->request->params['pass']))));
						}
						else {
							echo $this->Html->link($title, $link['url'], array('escape' => false, 'class' => $link['class']));
						}
					?>
				</li>
		<?php
			endforeach;
		?>
	</ul>
</div>