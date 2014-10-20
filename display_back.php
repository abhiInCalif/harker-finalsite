<?php 
$dbhost = "mysql";
$dbuser = "yroot";
$dbpass = "cytopic";
$class = $_POST['class'];

$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'test';
mysql_select_db($dbname);

$query="SELECT * FROM tester WHERE class='$class'";
$result=mysql_query($query);
while($row = mysql_fetch_assoc($result)) {
$data = $row['notes'];
echo "<a href='uploads/$data'>$data</a>";
}
?>
