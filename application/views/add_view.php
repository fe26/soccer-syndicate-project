<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Syndicate - Admin Add User</title>
	<link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet" media="screen" />
</head>
<style>
label { display: block; }
</style>
<body class="admin">
<div id="wrapper">
<div id="content">
<h1>Add New User</h1>
<p>Hi, <?php echo $_SESSION['admin']; ?> - <a href="<?php echo base_url('index.php/admin/logout'); ?>">Logout</a></p>
<ul>
	<li><a href="<?php echo base_url('index.php/admin/add'); ?>">Add New User</a></li>
	<li><a href="<?php echo base_url('index.php/admin/view'); ?>">View All Users</a></li>
	<li><a href="<?php echo base_url('index.php/admin/edit'); ?>">Edit / Delete User</a></li>
	<li><a href="<?php echo base_url('index.php/admin/bets'); ?>">Bets</a></li>
	<li><a href="<?php echo base_url('index.php/admin/newsletter'); ?>">Newsletter</a></li>
</ul>
<?php echo form_open('admin/adduser'); ?>
<?php if(isset($error)){
	echo "<p class='error'>" . $error . "</p>";
}
?>
<?php if(isset($success)){
	echo "<p class='success'>" . $success . "</p>";
}
?>
<fieldset>
<legend>Add Details</legend>
<p>
	<?php echo form_label('First Name: ', 'fname'); ?>
	<?php echo form_input('fname','','id="fname"'); ?>
</p>
<p>
	<?php echo form_label('Last Name: ', 'lname'); ?>
	<?php echo form_input('lname', '', 'id="lname"'); ?>
</p>
<p>
	<?php echo form_label('User name: ', 'uname'); ?>
	<?php echo form_input('uname', '', 'id="uname"'); ?>
</p>
<p>
	<?php echo form_label('Email: ', 'email'); ?>
	<?php echo form_input('email', '', 'id="email"'); ?>
</p>
<p>
	<?php echo form_label('Password: ', 'pass_word'); ?>
	<?php echo form_password('pass_word', '', 'id="pass_word"'); ?>
</p>
<?php echo form_submit('submit', 'Submit'); ?>
<?php echo form_close(); ?>
<div class="error">
<?php echo validation_errors(); ?>
</div>
</fieldset>
</body>
</html>