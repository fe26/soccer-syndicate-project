<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Colliers - Funeral Video Login</title>
	<link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet" media="screen" />
</head>
<style>
label { display: block; }
.error { color: red; }
</style>
<body class="admin">
<div id="wrapper">
<div id="content">
<h1>Admin Login</h1>
<?php echo form_open('admin'); ?>
<p>
	<?php echo form_label('Username: ', 'user_name'); ?>
	<?php echo form_input('user_name', set_value('user_name'), 'id="user_name"'); ?>
</p>
<p>
	<?php echo form_label('Password: ', 'pass_word'); ?>
	<?php echo form_password('pass_word', '', 'id="pass_word"'); ?>
</p>
<?php echo form_submit('submit', 'Login'); ?>
<?php echo form_close(); ?>
<div class="error">
<?php echo validation_errors(); ?>
</div>
</body>
</html>