<?php
if (array_key_exists('login', $_POST)) {
  session_start();
  $textfile = 'loser.txt';
    if (file_exists($textfile) && is_readable($textfile)) {
    $users = file($textfile);
	$user_input = $_POST['pwd'];
	$crypt = md5($user_input);
    for ($i = 0; $i < count($users); $i++) {
      $tmp = explode(', ', $users[$i]);
      $users[$i] = array('name' => $tmp[0], 'password' => rtrim($tmp[1]));
	  if ($users[$i]['name'] == $_POST['username'] && $users[$i]['password'] == $crypt) {
	    $_SESSION['loser'] = '';
		break;
		}
      }
	if (isset($_SESSION['loser'])) {
	  header('Location: http://finalsprojcba321.cytopic.net/index.php');
	  exit;
	  }
	else {
	  $error = 'Invalid username or password.';
	  }
    }
  else {
    $error = 'Login facility unavailable. Please try later.';
    }
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
	<title>Finals Study Guides - Login</title>
</head>
<body>
<div class="center">
	<div id="page">
		
		<div id="mainHeader" class="center">
			<p id="headerText">Finals Study Guides</p>
		</div>
		<div id="loginbutton"><a href="admins/login.php" class="loginbuttonText">Admin Login</a></div>

		<div id="mainNav" class="center">
				<div class="center">
					<ul class="center">
						<li><a href="../index.php">Home</a></li>
						<li><a href="../upload.php">Upload</a></li>
						<li><a href="../display.php">Display</a></li>
						<li><a href="../contact.php">Contact</a></li>
					</ul>
				</div>
		</div>
		
		<div id="mainContent" class="center">
			<p id="mainContentIntro">
				Student Log In
			</p>
			<p id="mainContent_" class="contentText">
			<div id="login_error">
				<?php
				if (isset($error)) {
				  echo "<p>$error</p>";
				  }
				?>
			</div>
				<form id="loginForm" name="loginForm" method="post" action="">
				    <p>
				        <label for="username" class="adminloginlabel">Username:</label>
				        <input type="text" name="username" id="username" />
				    </p>
				    <p>
				        <label for="textfield" class="adminloginlabel">Password:</label>
				        <input type="password" name="pwd" id="pwd" />
				    </p>
				    <p>
				        <input name="login" type="submit" id="login" value="Log in" />
				    </p>
				</form>
		</div>
	</div>
	
<?php include("includes/footer.inc.php"); ?>
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