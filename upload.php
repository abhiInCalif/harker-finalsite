<?PHP
include("includes/ConnectMysql.php");
include("includes/variables.php");
session_start();
if(!(isset($_SESSION['logged_in']))) {
	header("Location: http://cytopic.net/semester2finals/login.php");
	exit;
}
// variables
// this.php variables below
$username_logged_in = $_SESSION['logged_in'];
$user_query = mysql_query("SELECT * FROM finals WHERE username='$username_logged_in'") OR die("i die");
$user_query2 = mysql_fetch_array($user_query);
$user_query3 = $user_query2["classes"];
$explode_user = explode(",", $user_query3);

	// variables for the text fields
	$class = $_POST['subject'];
	$description = $_POST['description'];
	$target_path = "uploads/";
	$ext = pathinfo($_FILES['uploadedfile']['name']);
	$pathinfo = $ext['extension'];
	$new_file_name = $username_logged_in."_".$class."_".$description.".".$pathinfo;	
	$target_path = $target_path.$new_file_name;
	
	// array variables....that should be in variables.php
	$myArray = array("doc", "docx", "ppt", "pptx", "pages", "key", "pdf");
	foreach($myArray as $v){
		if($pathinfo == $v) {
			$other_true = true;
		}
	}

	
	

//check if the form has been set
if(isset($_POST['upload'])) {
	//check if the description and option fields have been set
	if(isset($_POST['description'])) {
		if($other_true == true) {
			if(move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path)) {
				changePermissions($target_path,999);
					$query = "INSERT INTO classes (username, class, fileName, description) VALUES ('$username_logged_in', '$class', '$new_file_name', '$description')";
					mysql_query($query);
			}
		}
	}
}



?>
<html>
<head>
	<title> </title>
</head>
<body>
	<form id="uploadForm" name="uploadForm" method="post" action="" enctype="multipart/form-data">
	    <p>
	        <label for="username" class="adminloginlabel">Username:</label>
	        <?PHP
			// output the username for the label above
	 		echo "$username_logged_in"; 
			?>
	    </p>
	    <p>
	        <label for="textfield" class="adminloginlabel">Subject:</label>
	        <select name="subject" id="subject" />
				<?PHP for($i = 0; $i < 8; $i++) { $end_result = $explode_user[$i]; if($end_result == ""){} else{echo "<option value=\"$end_result\">$end_result</option>";} }  ?>
			</select>
		<p></p>
			Description:<input type="text" name="description">
	    </p>
		<p>
			Upload File:<input type="file" name="uploadedfile">
	
	    <p>
	        <input name="upload" type="submit" id="login" value="upload" />
	    </p>
	</form>
	<?PHP echo "<a href=\"index.php\">Wanna view it</a>";?>
</body>
</html>