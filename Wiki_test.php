<?php
 //list of variables to use later
$dbhost = "mysql";
$dbuser = "yroot";
$dbpass = "cytopic";
$name = $_POST['name'];
$subject = $_POST['subject'];
$question = $_POST['question'];


//connection to mysql database
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'test';
mysql_select_db($dbname);

if($_POST['everything']) {
	$query = "INSERT INTO wiki (name, subject, question) VALUES ('$name', '$subject', '$question')";
	mysql_query($query) or die('Error, insert query failed');

	$query = "FLUSH PRIVILEGES";
	mysql_query($query) or die('Error, insert query failed');

	mysql_close($conn);
}

?>

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" >
	<link media="screen and (min-device-width: 481px)" rel="stylesheet" type="text/css" href="css/style.css" >
	<!--[if !IE]>-->
	<link media="only screen and (max=device-width: 480px)" rel="stylesheet" type="text/css" href="css/apple-mobile.css" >
	<!--<![endif]-->
	<title>Finals Study Guides - Display</title>
	<script type="text/javascript" src="list.js"></script>
</head>
<body onload="fillClass();">
<script type="text/javascript" src="list.js"></script>
<div class="center">
	<div id="page">
		<?php include ("includes/nav.inc.php"); ?>

		<div id="mainContent" class="center">
			<p id="mainContentIntro">
				Display Study Guides
			</p>
			<p id="mainContent_" class="contentText">
				<form method="POST" action="">
					Name:<input type="text" class="" name="name"><p>
					Subject: <input type="text" class="" name="subject"><p>
					Question:<textarea rows="10" cols="15" name="question"></textarea>
					<input type="submit" name="everything">
				</form><p>
				<p><a href="wiki_home.php">Answer page</a></p>	
		</div>
	</div>
	
	<?php include("includes/footer.inc.php"); ?>
	
			<div id="validation">
			<p>
				<a href="http://jigsaw.w3.org/css-validator/">
					<img style="border:0;width:88px;height:31px;border-style:none;"
			 		src="images/icons/css.png"
		     		alt="Valid CSS!" 
					>
				</a>
				<a href="http://validator.w3.org/check?uri=referer">
				<img style="border:0;width:88px;height:31px;border-style:none;"
				   src="images/icons/html.png"
				   alt="Valid HTML 4.01 Transitional" height="31" width="88">
		 		</a>
		 	</p>
			<a href="http://www.apple.com/" class="mac"><img style="border:0;border-style:none;" src="images/madeonmac.png" alt="Made on a Mac!" ></a>
			</div>
		</div>
	</div>
</html>