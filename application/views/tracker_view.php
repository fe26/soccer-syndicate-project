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
td{padding: 5px; border: 1px solid #bebebe;}
</style>
<body class="admin">
<div id="wrapper">
<div id="content">
<h1>Users Tracker</h1>
<p>Hi, <?php echo $_SESSION['admin']; ?> - <a href="<?php echo base_url('index.php/admin/logout'); ?>">Logout</a></p>
<ul>
	<li><a href="<?php echo base_url('index.php/admin/add'); ?>">Add New User</a></li>
	<li><a href="<?php echo base_url('index.php/admin/view'); ?>">View All Users</a></li>
	<li><a href="<?php echo base_url('index.php/admin/edit'); ?>">Edit / Delete User</a></li>
	<li><a href="<?php echo base_url('index.php/admin/bets'); ?>">Bets</a></li>
	<li><a href="<?php echo base_url('index.php/admin/newsletter'); ?>">Newsletter</a></li>
</ul>
<p>
<?php
if(isset($error)){
	echo $error;
}	
?>
</p>
<table>
<?php
foreach($query as $row){
	echo '<tr>';
	echo '<td>'.$row['user_name'].'</td>'.
	'<td>'.$row['timestamp'].'</td>'.
	'<td>'.$row['ipaddress'].'</td>'.
	'<td>'.$row['user_agent'].'</td>';
	echo '<tr/>';
}
?>
</table>
</body>
</html>