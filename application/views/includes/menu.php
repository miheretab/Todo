<style>
.menu li {
	float: right;
	list-style: none;
	margin-left: 10px;
}
</style>

<ul class="menu">
	<?php if(!$this->authenticator->is_logged_in()) { ?>
	<li><?php echo anchor('/users/login', 'Login'); ?></li>
	<li><?php echo anchor('/users/register', 'Register'); ?></li>	
	<?php } else { ?>
	<li><?php echo anchor('/users/logout', 'Logout'); ?></li>
	<li><?php echo anchor('/users/profile', 'Profile'); ?></li>
	<li><?php echo anchor('/todos/completed', 'Completed List'); ?></li>
	<li><?php echo anchor('/', 'Todo List'); ?></li>
	<?php if($this->authenticator->is_admin()) { ?>
		<li><?php echo anchor('/admin/index', 'Admin'); ?></li>
	<?php } } ?>
</ul>
<?php if($this->session->flashdata('message')) { ?>
<p><?php echo $this->session->flashdata('message'); ?></p>
<?php } ?>