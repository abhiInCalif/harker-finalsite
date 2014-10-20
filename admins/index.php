<?php
session_start();
// if session variable not set, redirect to login page
if (!isset($_SESSION['authenticated'])) {
  header('Location: http://finalsprojcba321.cytopic.net/admins/login.php');
  exit;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link media="screen and (min-device-width: 481px)" rel="stylesheet" type="text/css" href="../css/style.css" />
	<!--[if !IE]>-->
	<link media="only screen and (max=device-width: 480px)" rel="stylesheet" type="text/css" href="../css/apple-mobile.css" />
	<!--<![endif]-->
	<title>Admin Mode - Finals Study Guides - Home</title>
</head>
<body>
	<?php include("adminpagestuff.inc.php"); ?>
	
<div class="center">
	<div id="page">
		<div id="mainHeader" class="center">
			<p id="headerText">Finals Study Guides</p>
		</div>
		<div id="mainNav" class="center">
				<div class="center">
					<ul class="center">
						<li><a href="index.php">Home</a></li>
						<li><a href="upload.php">Upload</a></li>
						<li><a href="display.php">Display</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
		</div>
		<?php include ("../includes/mainIntro.inc.php"); ?>
	
	<?php include("../includes/footer.inc.php"); ?>
	
		<div id="validation">
		<p>
			<a href="http://jigsaw.w3.org/css-validator/">
				<img style="border:0;width:88px;height:31px;border-style:none;"
		 		src="../images/icons/css.png"
	     		alt="Valid CSS!" 
				/>
			</a>
			<a href="http://validator.w3.org/check?uri=referer">
				<img style="border:0;width:88px;height:31px;border-style:none;"
		 		src="../images/icons/xhtml.png"
	     		alt="Valid XHTML 1.0 Strict" 
				/>
	 		</a>
	 	</p>
		<a href="http://www.apple.com/" class="mac"><img style="border:0;border-style:none;" src="../images/madeonmac.png" alt="Made on a Mac!" /></a>
		</div>
	</div>
</div>
</body>
</html>