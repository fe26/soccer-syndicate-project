<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="generator" content="CoffeeCup HTML Editor (www.coffeecup.com)">
    <meta name="dcterms.created" content="Fri, 24 Aug 2012 18:04:05 GMT">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <title>Syndicate</title>
	 <style type="text/css">
  body {
    padding-left: 11em;
    font-family: <span style="font-family: Arial; font-weight: normal; font-style: normal; text-decoration: none; font-size: 12pt;"></span>,
          Times, serif;
    color: black;
    background-color: white }
  ul.navbar {
    list-style-type: none;
    padding: 0;
    margin: 0;
    position: absolute;
    top: 1em;
    left: 1em;
    width: 9em }
  h1 {
    font-family: Arial,
	}
  ul.navbar li {
    background: #EAEAEA;
    margin: 0.5em 0;
    padding: 0.3em;
    border-right: 1em solid black }
  ul.navbar a {
    text-decoration: none }
  a:link {
    color: blue }
  a:visited {
    color: purple }
#footer {
    position:fixed;
    bottom:0px;
}

#content_container {
    padding-bottom:3em;
}
</style>
    <!--[if IE]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->
  </head>
  
  <body>
 
<!-- Site navigation menu -->
<ul class="navbar">
  <li><a href="<?php echo base_url('index.php/user/newsletter'); ?>">Home page</a>
  <li><a href="<?php echo base_url('index.php/user/bets'); ?>">Current Bets</a>
  <li><a href="<?php echo base_url('index.php/user/workings'); ?>">How does this Syndicate work?</a>
  <li><a href="<?php echo base_url('index.php/user/contact'); ?>">Contact</a>
</ul>
<!-- Main content -->

<div id="container" style="height:500px;width:800px">
<div id="header" style="background-color:#EAEAEA ;">
<h1 style="margin-bottom:0;">Welcome to the Slatt's Syndicate Website</h1></div>
<h2></h2>
<div>
<?php echo($betContent); ?>
</div>
<!-- Sign and date the page, it's only polite! -->

<div id="footer" style="background-color:#F9F9F9;clear:both;text-align:left;">
<footer>
<img src="<?php echo base_url(); ?>/images/grass_long1.xls.bmp" width="800" height="150" alt="" title="" border="0" />
<p>Design by Chrisvaldo | powered by Codeigniter | &copy; 2013</footer></div>
</body>
  
</html>