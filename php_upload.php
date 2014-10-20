<?php
 //list of variables to use later
$dbhost = "mysql";
$dbuser = "yroot";
$dbpass = "cytopic";
$teacher = $_POST['Teacher'];
$class = $_POST['Class'];
$name = $_POST['name'];
$file = $_FILES['uploadedfile']['name'];
$upload = $name.'_'.$teacher.'_'.$class.'_'.$file;

//connection to mysql database
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'test';
mysql_select_db($dbname);
if (isset($class, $teacher, $upload, $name))	{

//inserting into the mysql database stuff
$query = "INSERT INTO tester (notes, teacher, class, name) VALUES ('$upload', '$teacher', '$class', '$name')";
mysql_query($query) or die('Error, insert query failed');

$query = "FLUSH PRIVILEGES";
mysql_query($query) or die('Error, insert query failed');

echo "New Attributes added";
mysql_close($conn);

//the upload stuff
$target_path = "Uploads/";
$new_file_name = $name.'_'.$teacher.'_'.$class.'_'.$file;
$target_path = $target_path . $new_file_name;

if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
   echo "<p>The file ". basename( $_FILES['uploadedfile']['name']).
   " has been uploaded";
} else{
   echo "<p>There was an error uploading the file, please try again!";
}
}
?>
