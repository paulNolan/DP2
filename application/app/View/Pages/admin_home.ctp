<p>
	If you're seeing this, you're an admin!
</p>
<?php echo $this->Html->link('Logout', array('admin' => false, 'controller' => 'users', 'action' => 'logout'), array('class' => 'btn waves-effect waves-light')); ?>