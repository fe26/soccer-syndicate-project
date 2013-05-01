<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Super Soccer Syndicate</title>
	<link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet" media="screen" />
</head>
<style>
label { display: block; }
.error { color: red; }
</style>
<body class="admin">
<div id="wrapper">
<div id="content">
<h1>Admin Dashboard</h1>
<p>Hi, <?php echo $_SESSION['admin']; ?> - <a href="<?php echo base_url('index.php/admin/logout'); ?>">Logout</a></p>
<ul>
	<li><a href="<?php echo base_url('index.php/admin/add'); ?>">Add New User</a></li>
	<li><a href="<?php echo base_url('index.php/admin/view'); ?>">View All Users</a></li>
	<li><a href="<?php echo base_url('index.php/admin/edit'); ?>">Edit / Delete User</a></li>
	<li><a href="<?php echo base_url('index.php/admin/bets'); ?>">Bets</a></li>
	<li><a href="<?php echo base_url('index.php/admin/newsletter'); ?>">Newsletter</a></li>
</ul>
</div>
</div>
</body>
</html>
