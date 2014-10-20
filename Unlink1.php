<?php
$path_to_includes = "uploads/";

$dir_handle = @opendir($path_to_includes) or die("Unable to open $path_to_includes");

$files = array();
$count = count(glob($path_to_includes."*"));

if($count <= 1) {
	echo "Sorry No Study Guides Currently Exist";
	} else {
while ($file = readdir($dir_handle))
{
if (($file == ".") OR ($file == "..")) {

} else {
	$files[] = "$file";
	echo "<form enctype=\"multipart/form-data\" method=\"POST\" action=\"\"><select name=\"delete_option\"><option value=\"$file\">$file</option></select><br /> <input type=\"submit\" name=\"delete_select\"></form>";
	
	}
}
}
 // end while loop
?>
<?
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
mysql_close($conn);
	
	
?>