<?php
foreach($data as $row){
if($row['live'] == 'true'){
	$val = 1;
} else {
	$val = 2;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 
1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="en" xml:lang="en">
<head>
	<title>Colliers - Funeral Video Page</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<script type="text/javascript" src="<?php echo base_url(); ?>jwplayer/jwplayer.js"></script>
  	<link href="<?php echo base_url(); ?>css/style.css" type="text/css" rel="stylesheet" media="screen" />
</head>
<body class="login">
<div id="wrapper">
	<div id="content">
		<div id="header">
			<div id="logo">
				<img src="<?php echo base_url(); ?>i/logo.jpg" alt="Colliers - Funeral Directors" height="170px" width="300px" /> 
			</div>
			<div id="detail">
				<p>Welcome, <?php echo $row['first_name']; ?><br />
				<a href="<?php echo base_url('index.php/admin/logout'); ?>">Logout</a><br />
				<?php 
				//display time
				if(isset($local)){ echo $local; }?>
				</p>
			</div>
		</div>
		<?php if($val == 2){ ?>
		<div id="playerContainer">
			<div id="player">
				<p>Please install the latest version of Adobe Flash Player to view the content</p>
			</div>
			<script type="text/javascript">
			jwplayer("player").setup({
			autostart: true,
			file: "http://www.collierslivefuneralvideoservices.com/<?php echo $row['id']; ?>.flv",
			flashplayer: "<?php echo base_url(); ?>jwplayer/player.swf",
			volume: 100,
			width: 640
			});
			</script>
		</div>
		<?php } else { ?>
		<div id="livePlayerContainer">
		<div id="livePlayer"> 
			<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="640" height="360">
			<param name="movie" value="http://86.47.36.221:86/nchplayer.swf?host=86.47.36.221:1935&scope=BroadCam&streamName=live&bandwidth=0&src=1&autostart=true&redirect=">
			<param name="allowfullscreen" value="true">
			<param name="quality" value="high">
			<embed src="http://86.47.36.221:86/nchplayer.swf?host=86.47.36.221:1935&scope=BroadCam&streamName=live&bandwidth=0&src=1&autostart=true&redirect=" width="640" height="360" allowfullscreen="true" quality="high" type="application/x-shockwave-flash" pluginspage="http://www.adobe.com/go/getflashplayer"/>
			</object>
		</div>
		</div>
		<?php } ?>
		<div id="footer">
			<p><span class="bold">Powered By.</span></p>
			<p><a href="http://www.nchsoftware.com/broadcam/index.html">BroadCam Streaming Video Server</a> by <a href="http://www.nchsoftware.com/index.html">NCH Software</a>. </p>
		</div>
	</div>
</div>
</body>
</html>
<?php } //end of foreach loop ?>