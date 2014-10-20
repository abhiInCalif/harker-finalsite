<?php
session_start();
if (!(isset($_SESSION['authenticated']))) {
  header('Location: http://finals.cytopic.net/admins/login.php');
  exit;
  }
?>

<?php
$dbhost = "mysql";
$dbuser = "yroot";
$dbpass = "cytopic";
$class = $_GET['class'];

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'test';
mysql_select_db($dbname);

$query="SELECT * FROM tester WHERE class='$class'";
$result=mysql_query($query);

$count_result = mysql_query("SELECT * FROM tester WHERE class='$class'"); 
$count_rows = mysql_num_rows($count_result);
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" >
	<link media="screen and (min-device-width: 481px)" rel="stylesheet" type="text/css" href="../css/style.css" >
	<!--[if !IE]>-->
	<link media="only screen and (max=device-width: 480px)" rel="stylesheet" type="text/css" href="../css/apple-mobile.css" >
	<!--<![endif]-->
	<title>Finals Study Guides - Display</title>
	<script type="text/javascript" src="../list.js"></script>
</head>
<body onload="fillClass();">
	<?php include("adminpagestuff.inc.php"); ?>
	
<script type="text/javascript" src="list.js"></script>
<div class="center">
	<div id="page">
		<?php include ("../includes/nav2.inc.php"); ?>

		<div id="mainContent" class="center">
			<p id="mainContentIntro">
				Display Study Guides
			</p>
			<p id="mainContent_" class="contentText">
				<form method="GET" action="">
					<p class="attr_name">Please select your class:</p> 
					<div id="displaypageform">
						<select name="class">
							<option value="English">English</option>
							<option value="French">French</option>
							<option value="History">History</option>
							<option value="Japanese">Japanese</option>
							<option value="Latin">Latin</option>
							<option value="Mandarin">Mandarin</option>
							<option value="Math">Math</option>
							<option value="Physics">Physics</option>
							<option value="Spanish">Spanish</option>
						</select>
							<input type="submit" name="notes" value="Display">
					</div>
				</form>
				<?php
				while($row = mysql_fetch_assoc($result)) {
				$data = $row['notes'];
				echo "<a href='../uploads/$data' class=\"output_list\">$data</a><br >";
				}
				if($_POST['notes']) {
				if($_GET['class'] == "")
				{
				    echo "<span class=\"contentText\">You did not select a class yet.</span>";
				}
			}
				else
				{
					if ($_GET['class']) {
					if ($count_rows > 0) {
					echo "";
				} else {
					echo "<br /><span class=\"contentText\">There are currently no study guides for $class. Please check back later.</span>";
				}
				}
				}
				?>
		</div>
	</div>
	
	<?php include("../includes/footer.inc.php"); ?>
	
			<div id="validation">
			<p>
				<a href="http://jigsaw.w3.org/css-validator/">
					<img style="border:0;width:88px;height:31px;border-style:none;"
			 		src="../images/icons/css.png"
		     		alt="Valid CSS!" 
					>
				</a>
				<a href="http://validator.w3.org/check?uri=referer">
				<img style="border:0;width:88px;height:31px;border-style:none;"
				   src="../images/icons/html.png"
				   alt="Valid HTML 4.01 Transitional" height="31" width="88">
		 		</a>
		 	</p>
			<a href="http://www.apple.com/" class="mac"><img style="border:0;border-style:none;" src="../images/madeonmac.png" alt="Made on a Mac!" ></a>
			</div>
		</div>
	</div>
</html>