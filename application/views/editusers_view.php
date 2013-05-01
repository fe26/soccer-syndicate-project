<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Syndicate - Edit Users</title>
	<link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet" media="screen" />
	<!-- jQuery -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js" type="text/javascript"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.2/jquery-ui.min.js"></script>
	<link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.7.1/themes/blitzer/jquery-ui.css" type="text/css" />
	<script src="<?php echo base_url(); ?>scripts/jquery.easy-confirm-dialog.js"></script>
	<script>
		$(".confirm").easyconfirm();
		$("#alert").click(function() {
			alert("You approved the action");
		});
	</script>
</head>
<style>
label { display: block; }
.error { color: red; }
td{padding: 5px; border: 1px solid #bebebe;}
th{padding: 5px; border: 1px solid #bebebe; font-weight:bold;}
</style>
<script>
</script>
<body class="admin">
<div id="wrapper">
<div id="content">
<h1>Edit Users</h1>
<p>Hi, <?php echo $_SESSION['admin']; ?> - <a href="<?php echo base_url('index.php/admin/logout'); ?>">Logout</a></p>
<ul>
	<li><a href="<?php echo base_url('index.php/admin/add'); ?>">Add New User</a></li>
	<li><a href="<?php echo base_url('index.php/admin/view'); ?>">View All Users</a></li>
	<li><a href="<?php echo base_url('index.php/admin/edit'); ?>">Edit / Delete User</a></li>
	<li><a href="<?php echo base_url('index.php/admin/bets'); ?>">Bets</a></li>
	<li><a href="<?php echo base_url('index.php/admin/newsletter'); ?>">Newsletter</a></li>
</ul>
<p>
<?php if(isset($error)){
	echo "<p class='error'>" . $error . "</p>";
}
?>
<?php if(isset($success)){
	echo "<p class='success'>" . $success . "</p>";
}
?>
</p>
<table>
<tr>
	<th>ID</th>
	<th>First Name</th>
	<th>Last Name</th>
	<th>Email</th>
	<th>Phone</th>
	<th>Address</th>
	<th>Username</th>
	<th>Status</th>
	<th>Live</th>
	<th>Date Created</th>
</tr>
<?php
$this->load->helper('date');
if(isset($query)){
	foreach($query as $row){
		echo '<tr>';
		echo 
		'<td>'.$row['id'].'</td><td>'.$row['fname'].'</td>'.
		'<td>'.$row['lname'].'</td>'.
		'<td>'.$row['email'].'</td>'.
		'<td>'.$row['username'].'</td>'.
		'<td><a href="' . base_url('index.php/admin/edituser') . '/' . $row['id'] . '">Edit</a></td>'.
		'<td><a class="confirm" id="alert" href="' . base_url('index.php/admin/delete') . '/' . $row['id'] . '">Delete</a></td>';
		echo '<tr/>';
	}
}//end parent statement
?>
</table>
</body>
</html>