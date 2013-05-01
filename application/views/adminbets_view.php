<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr">

<head>
	<meta charset="utf-8">
	<title>Syndicate - Add Newsletter</title>
	<link href="<?php echo base_url(); ?>/css/style.css" type="text/css" rel="stylesheet" media="screen" />
	<script type="text/javascript" src="<?php echo base_url(); ?>/scripts/tinymce/jscripts/tiny_mce/tiny_mce.js"></script>
	<script type="text/javascript">
	tinyMCE.init({
	        mode : "textareas",
	        elements : "contenttext",
	        width : "700",
	        height : "600"
	});
	</script>
<!-- /TinyMCE -->
</head>
<style>
label { display: block; }
.error { color: red; }
</style>
<body class="admin">
<div id="wrapper">
<div id="content">
<h1>Add News Letter</h1>
<p>Hi, <?php echo $_SESSION['admin']; ?> - <a href="<?php echo base_url('index.php/admin/logout'); ?>">Logout</a></p>
<ul>
	<li><a href="<?php echo base_url('index.php/admin/add'); ?>">Add New User</a></li>
	<li><a href="<?php echo base_url('index.php/admin/view'); ?>">View All Users</a></li>
	<li><a href="<?php echo base_url('index.php/admin/edit'); ?>">Edit / Delete User</a></li>
	<li><a href="<?php echo base_url('index.php/admin/bets'); ?>">Bets</a></li>
	<li><a href="<?php echo base_url('index.php/admin/newsletter'); ?>">Newsletter</a></li>
</ul>
<?php echo form_open('admin/addbets'); ?>
<?php if(isset($error)){
	echo "<p class='error'>" . $error . "</p>";
}
?>
<?php if(isset($success)){
	echo "<p class='success'>" . $success . "</p>";
}
?>
<fieldset>
<legend>Enter New Newsletter</legend>
<p>
	<?php echo form_label('Content: ', 'content'); ?>
	<?php echo form_textarea('content', $bets, 'id="contenttext"'); ?>
</p>
<?php echo form_submit('submit', 'Submit'); ?>
<?php echo form_close(); ?>
<div class="error">
<?php echo validation_errors(); ?>
</div>
</fieldset>
</body>
</html>