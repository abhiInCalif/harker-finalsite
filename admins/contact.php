<?php
session_start();
// if session variable not set, redirect to login page
if (!isset($_SESSION['authenticated'])) {
  header('Location: http://finalsprojcba321.cytopic.net/admins/login.php');
  exit;
  }
?>
<?php
function nukeMagicQuotes() {
  if (get_magic_quotes_gpc()) {
    function stripslashes_deep($value) {
      $value = is_array($value) ? array_map('stripslashes_deep', $value) : stripslashes($value);
      return $value;
      }
    $_POST = array_map('stripslashes_deep', $_POST);
    $_GET = array_map('stripslashes_deep', $_GET);
    $_COOKIE = array_map('stripslashes_deep', $_COOKIE);
    }
  }

if (array_key_exists('send', $_POST)) {
  $to = 'devin2712@gmail.com, abhi1994@gmail.com';
  $subject = 'Contact from Finals Site';
  
  $expected = array('name', 'email', 'comments');
  $required = array('name', 'email', 'comments');
  $missing = array();
  
  $suspect = false;
  $pattern = '/Content-Type:|Bcc:|Cc:/i';
  
  function isSuspect($val, $pattern, &$suspect) {
	if (is_array($val)) {
      foreach ($val as $item) {
	    isSuspect($item, $pattern, $suspect);
	    }
	  }
    else {
	  if (preg_match($pattern, $val)) {
        $suspect = true;
	    }
	  }
    }
  
  isSuspect($_POST, $pattern, $suspect);
  
  if ($suspect) {
    $mailSent = false;
	unset($missing);
	}
  else {
    foreach ($_POST as $key => $value) {
      $temp = is_array($value) ? $value : trim($value);
	  if (empty($temp) && in_array($key, $required)) {
	    array_push($missing, $key);
	    }
	  elseif (in_array($key, $expected)) {
	    ${$key} = $temp;
	    }
	  }
	}
if (!empty($email)) {
	}

if (!$suspect && empty($missing)) {
    $message = "Name: $name\n\n";
    $message .= "Email: $email@harker.org\n\n";
    $message .= "Comments: $comments";    
	$additionalHeaders = 'From: Finals Site<finals@cytopic.net>';
	if (!empty($email)) {
	  $additionalHeaders .= "\r\nReply-To: <12devinn@students.harker.org>, <12abhinavk@students.harker.org>";
	  }
    $mailSent = mail($to, $subject, $message, $additionalHeaders);
	if ($mailSent) {
	  unset($missing);
	  }
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
	<title>Admin Mode - Finals Study Guide - Contact Us</title>
</head>
<body>
	<?php include("adminpagestuff.inc.php"); ?>

<div class="center">
	<div id="page">		
		<div id="mainHeader" class="center">
			<p id="headerText">Finals Study Guides</p>
		</div>
		<div id="mainNav" class="center">
				<div class="center">
					<ul class="center">
						<li><a href="index.php">Home</a></li>
						<li><a href="upload.php">Upload</a></li>
						<li><a href="display.php">Display</a></li>
						<li><a href="contact.php">Contact</a></li>
					</ul>
				</div>
		</div>
		<div id="mainContent" class="center">
			<p id="mainContentIntro">
				Contact Us
			</p>
			<p id="contact_form_intro">Please use this form to contact us with any questions, comments, or feedback.</p>
			<p id="mainContent_" class="contentText">
			<?php
			if ($_POST && isset($missing)) {
			?>
			<p class="warning">Please complete the missing item(s) indicated.</p>
				<?php
				  }
				elseif ($_POST && !$mailSent) {
				?>
			<p class="warning">There was an error sending your message. Please try again.</p>
			<?php
			  }
			elseif ($_POST && $mailSent) {
			?>
			<p id="message_sent">Thank You for your message. Your message has been sent.</p>
		<?php } ?>

		<form id="feedback" method="post" action="">
			<p>
				<label for="name" id="comment_name_attr">Name: <?php
				if (isset($missing) && in_array('name', $missing)) { ?>
				<span class="warning">Please enter your name</span><?php } ?>
				</label>
	            <input name="name" id="name" type="text" class="formbox"
				<?php if (isset($missing)) {
				  echo 'value="'.htmlentities($_POST['name']).'"';} ?> >
			</p>
				<label for="email" id="comment_email_attr">Your Email: <?php
				if (isset($missing) && in_array('email', $missing)) { ?>
					<span class="warning">Please enter a valid email address</span><?php } ?>
					</label>
				<input name="email" id="email_admin" type="text" class="formbox"
				<?php if (isset($missing)) {
				  echo 'value="'.htmlentities($_POST['email']).'"';} ?> ><span class="studentsharker">@harker.org</span>
				<p class="studentsharker_warning">
					Please enter your Harker username.
				</p>
			<p>
				<label for="comments" class="comments_field">Comments: <?php
				if (isset($missing) && in_array('comments', $missing)) { ?>
				<span class="warning_comments">Please enter your comments</span><?php } ?>
				</label>
	            <textarea name="comments" id="comments" cols="33" rows="8"><?php 
				if (isset($missing)) {
				  echo htmlentities($_POST['comments']);
				  } ?></textarea>
			</p>
			<p>
				<input name="send" id="send" type="submit" value="Send Message" />
			</p>
		</form>
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