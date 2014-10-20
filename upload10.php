<?php
 //list of variables to use later
$dbhost = "mysql";
$dbuser = "yroot";
$dbpass = "cytopic";
$teacher = $_POST['Teacher'];
$teacher_vd = false;
$class = $_POST['Class'];
$name = $_POST['name2'];
$subject = $_POST['subject'];
$file = pathinfo($_FILES['uploadedfile']['name']);
$pathinfo = $file['extension'];
$upload = $teacher.$class.'_'.$name.'_'.$subject.'.'.$pathinfo;
$uploadsuccess = false;
$upload_fail = false;

//connection to mysql database
$conn = mysql_connect($dbhost, $dbuser, $dbpass) or die ('Error connecting to mysql');

$dbname = 'test';
mysql_select_db($dbname);
if (!(isset($class, $teacher, $upload, $name, $subject) & ($pathinfo == 'doc'))) {
}

//the upload stuff
$target_path = "uploads/";
$new_file_name = $teacher.$class.'_'.$name.'_'.$subject.'.'.$pathinfo;
$target_path = $target_path . $new_file_name;

//changing the permission of the file
function changePermissions($path,$modlevel){
 
	chmod($path,$modlevel); 
 
	if(chmod){
 
	echo "";
 
	} else {
 
		echo "";
	}
}
if ($_POST['everything']) {
if(($pathinfo == 'doc') & (move_uploaded_file($_FILES['uploadedfile']['tmp_name'], $target_path))){
	changePermissions($target_path,999);
	$uploadsuccess = true;
if (isset($class, $teacher, $subject, $name)) {
$query = "INSERT INTO tester (notes, teacher, class, name, subject) VALUES ('$upload', '$teacher', '$class', '$name', '$subject')";
mysql_query($query) or die('Error, insert query failed');

$query = "FLUSH PRIVILEGES";
mysql_query($query) or die('Error, insert query failed');

mysql_close($conn);
} elseif (!(isset($teacher))) {
	$teacher_vd = true;
};
} else {
	$upload_fail = true;
}


}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN"
	"http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" >
	<link media="screen and (min-device-width: 481px)" rel="stylesheet" type="text/css" href="style.css" >
	<!--[if !IE]>-->
	<link media="only screen and (max=device-width: 480px)" rel="stylesheet" type="text/css" href="apple-mobile.css" >
	<!--<![endif]-->
	<title>Finals Project</title>
	<script type="text/javascript" src="list.js"></script>
</head>
<body onload="fillClass();">
<script type="text/javascript" src="list.js"></script>
	<script type="text/javascript">
	var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
	document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
	</script>
	<script type="text/javascript">
	var pageTracker = _gat._getTracker("UA-307405-16");
	pageTracker._trackPageview();
	</script>
<div class="center">
	<div id="page">
		<?php include ("nav.inc.php"); ?>

		<div id="mainContent" class="center">
			<p id="mainContentIntro">
				Upload Study Guides!
			</p>
				<p id="mainContent_" class="contentText">
					<p class="uploadsuccess">
					<?php	if($uploadsuccess == 1) {
							echo "Your file: ". $new_file_name. " has been uploaded."; 
						}
							if($upload_fail == 0) {
								
							} else {
								echo "There was an error uploading your file. Please check your file to make sure your extension is supported.";
							}
							if ($teacher_vd == 0) {
								
							}else {
								echo "You forgot to enter your Teacher name"
							}
					?>
					</p>
					<FORM name="drop_list" method="POST" enctype="multipart/form-data" action="" id="upload_form">
						<p class="attr_name" id="class_name_attr">Class Name:</p>
							<SELECT  NAME="Class" onChange="SelectTeacher();" >
								<Option value="">Class</option>
							</SELECT><br >
						<p class="attr_name" id="teacher_name_attr">Teacher Name:</p>
							<SELECT id="Teacher" NAME="Teacher">
								<Option value="">Teacher</option>
							</SELECT>
						<p class="attr_name"><br >Please choose a file:</p>
							<input name="uploadedfile" type="file" ><p></p>
						<p class="attr_name">Your Name: <span class="eg">(FirstLast)</span></p>
							<input name="name2" type="text"><br >
						<p class="attr_name">Subject/Description:</p>
							<input name="subject" type="text" value="General"><br ><span class="eg">(General, Vocab, Grammar, Chapter #s, etc...)</span>	
						<br ><br >
						<div id="uploadsubmitbutton">
						<input type="submit" name="everything" class="uploadsubmit" value="Submit">
						</div>
					</form>
				<p class="javascript">Note: Javascript must be enable to use this page!</p>
		</div>
	</div>
	
	<div id="footer" class="center">
	<p class="footerText"><br >&copy; 2008 Abhinav Khana and Devin Nguyen  &nbsp; All Rights Reserved. <br > For any questions or comments, please contact us through our school e-mail addresses.<br > [<span class="boldText">12abhinavk@students.harker.org</span>] and [<span class="boldText">12devinn@students.harker.org</span>]</p>
	<!--
		<a href="#" class="contact">contact us here.</a>
		-code to be inserted if php contact page is ever made
  	-->
		<div id="validation">
		<p>
			<a href="http://jigsaw.w3.org/css-validator/">
				<img style="border:0;width:88px;height:31px;border-style:none;"
		 		src="http://cytopic.net/1cbafinals-proj1234/icons/css.png"
	     		alt="Valid CSS!" 
				>
			</a>
			<a href="http://validator.w3.org/check?uri=referer">
			<img style="border:0;width:88px;height:31px;border-style:none;"
			   src="http://cytopic.net/1cbafinals-proj1234/icons/html.png"
			   alt="Valid HTML 4.01 Transitional" height="31" width="88">
	 		</a>
	 	</p>
		<a href="http://www.apple.com/" class="mac"><img style="border:0;border-style:none;" src="madeonmac.png" alt="Made on a Mac!" ></a>
		</div>
	</div>
</div>
</body>
</html>