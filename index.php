<?php
session_start();
if (isset($_SESSION['authenticated'])) {
  header('Location: http://finals.cytopic.net/admins/display.php');
  exit;
  }
?>
<?php
session_start();
if (!(isset($_SESSION['loser']))) {
  header('Location: http://finals.cytopic.net/login.php');
  exit;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link rel="stylesheet" type="text/css" href="css/style.css" />
	<title>Finals Study Guides - Home</title>
</head>
<body>

<div class="center">
	<div id="page">
		<?php include ("includes/nav.inc.php"); ?>

		<?php include ("includes/mainIntro.inc.php"); ?>
		
			
	<?php include("includes/footer.inc.php"); ?>
	
		<div id="validation">
		<p>
			<a href="http://jigsaw.w3.org/css-validator/">
				<img style="border:0;width:88px;height:31px;border-style:none;"
		 		src="images/icons/css.png"
	     		alt="Valid CSS!" 
				/>
			</a>
			<a href="http://validator.w3.org/check?uri=referer">
				<img style="border:0;width:88px;height:31px;border-style:none;"
		 		src="images/icons/xhtml.png"
	     		alt="Valid XHTML 1.0 Strict" 
				/>
	 		</a>
	 	</p>
		<a href="http://www.apple.com/" class="mac"><img style="border:0;border-style:none;" src="images/madeonmac.png" alt="Made on a Mac!" /></a>
		</div>
	</div>
</div>
</body>
</html>