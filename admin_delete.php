<?php
	$dbhost = "mysql";
	$dbuser = "yroot";
	$dbpass = "cytopic";
	$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');
	$dbname = 'test';
	mysql_select_db($dbname);
	$delete = $_POST['delete_option'];
	$address = "uploads/";
	$myfile = $address.$delete;
	if($_POST['delete_select']) {
		unlink($myfile);
		$query = "DELETE FROM tester WHERE notes='$delete'";
		mysql_query($query);
	}		
	$count_result = mysql_query("SELECT * FROM tester"); 
	$count_rows = mysql_num_rows($count_result);
mysql_close($conn);
	
	
?>
<?php
session_start();
// if session variable not set, redirect to login page
if (!isset($_SESSION['authenticated'])) {
  header('Location: http://finalsprojcba321.cytopic.net/admins/login.php');
  exit;
  }
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
	<title>Finals Project</title>
</head>
<body>
	<?php include("adminpagestuff.inc.php"); ?>
<div class="center">
	<div id="page">
		<div id="mainHeader" class="center">
			<p id="headerText">Finals Study Guides</p>
		</div>
		<div id="loginbutton"></div>

		<div id="mainNav" class="center">
				<div class="center"><ul class="center">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li><a href="upload.php">Upload</a></li>
					<li><a href="display.php">Display</a></li>
					<li><a href="contact.php">Contact</a></li>
				</ul></div>
		</div>
		<div id="mainContent" class="center">
			<p id="mainContentIntro">
				Delete FIles
			</p>
			<p id="mainContent_" class="contentText">
				<?php
				$path_to_includes = "../uploads/";

				$dir_handle = @opendir($path_to_includes) or die("Unable to open $path_to_includes");

				$files = array();
				
				if ($count_rows > 0) {
				echo "Total Number of Study Guides: $count_rows";
			} else {
				echo "";
			}
				
				if($count_rows == "0") {
					echo " No Study Guides have been uploaded.";
					} else {
				while ($file = readdir($dir_handle))
				{
				if (($file == ".") OR ($file == "..")) {

				} else {
					$files[] = "$file";
					echo "<div align=\"center\"><table width=\"400\" border=\"0\">
    <tr><form enctype=\"multipart/form-data\" method=\"POST\" action=\"\">
        <td width=\"380\">
		<input type=\"hidden\" name=\"delete_option\" value=\"$file\">$file &nbsp
        </td>
        <td width=\"20\">
		<input type=\"submit\" name=\"delete_select\" value=\"Delete\">
        </td>
    </tr></form>
</table></div>";
					}
				}
				}
				 // end while loop
				?>
			</p>
		</div>
	</div>
	
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
				   src="../images/icons/html.png"
				   alt="Valid HTML 4.01 Transitional" height="31" width="88">
		 		</a>
	 	</p>
		<a href="http://www.apple.com/" class="mac"><img style="border:0;border-style:none;" src="../images/madeonmac.png" alt="Made on a Mac!" /></a>
		</div>
	</div>
</div>
</body>
</html>