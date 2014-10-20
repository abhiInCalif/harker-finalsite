
<?php
session_start();
// if session variable not set, redirect to login page
if (!isset($_SESSION['authenticated'])) {
  header('Location: http://finals.cytopic.net/admins/login.php');
  exit;
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
   "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
	<link media="screen and (min-device-width: 481px)" rel="stylesheet" type="text/css" href="../css/style.css" />
	<!--[if !IE]>-->
	<link media="only screen and (max=device-width: 480px)" rel="stylesheet" type="text/css" href="../css/apple-mobile.css" />
	<!--<![endif]-->
	<title>Admin Mode - Finals Study Guides - Home</title>
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
				Winter Finals Schedule
			</p>			
			<div id="finalsSched">
				<span class="contentText">Each subject links to the corresponding display page.</span>
				<br /><br /><br />
				<table>
					<tr>
						<td>Tuesday Morning</td>
						<td><a href="http://finals.cytopic.net/admins/list.php?class=Math&notes=Display" class="finalsSchedLinks">Mathematics</a></td>
						<td><a href="http://finals.cytopic.net/admins/list.php?class=Math&notes=Display" class="finalsSchedLinks">Algebra II/Trig</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Math&notes=Display" class="finalsSchedLinks">AP Calculus AB/BC/C</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Math&notes=Display" class="finalsSchedLinks">AP Statistics</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Math&notes=Display" class="finalsSchedLinks">Geometry</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Math&notes=Display" class="finalsSchedLinks">Honors Algebra II/Trig</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Math&notes=Display" class="finalsSchedLinks">Honors Geometry</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Math&notes=Display" class="finalsSchedLinks">Honors Precalculus</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Math&notes=Display" class="finalsSchedLinks">Precalculus</a></td>
					</tr>
					<tr>
							<td>Tuesday Afternoon</td>
							<td><a href="http://finals.cytopic.net/admins/list.php?class=English&notes=Display" class="finalsSchedLinks">English</a></td>
							<td><a href="http://finals.cytopic.net/admins/list.php?class=English&notes=Display" class="finalsSchedLinks">AP English Literature</a>, <a href="http://finals.cytopic.net/admins/list.php?class=English&notes=Display" class="finalsSchedLinks">English I/II/III</a>, <a href="http://finals.cytopic.net/admins/list.php?class=English&notes=Display" class="finalsSchedLinks">Honors English I/II/III</a></td>
						</tr>
					<tr>
						<td>Wednesday Morning</td>
						<td><a href="http://finals.cytopic.net/admins/list.php?class=History&notes=Display" class="finalsSchedLinks">History</a></td>
						<td><a href="http://finals.cytopic.net/admins/list.php?class=History&notes=Display" class="finalsSchedLinks">AP Art History</a>, <a href="http://finals.cytopic.net/admins/list.php?class=History&notes=Display" class="finalsSchedLinks">AP Euro History</a>, <a href="http://finals.cytopic.net/admins/list.php?class=History&notes=Display" class="finalsSchedLinks">AP US History</a>, <a href="http://finals.cytopic.net/admins/list.php?class=History&notes=Display" class="finalsSchedLinks">Honors World History I</a>, <a href="http://finals.cytopic.net/admins/list.php?class=History&notes=Display" class="finalsSchedLinks">US History</a>, <a href="http://finals.cytopic.net/admins/list.php?class=History&notes=Display" class="finalsSchedLinks">World History I/II</a></td>
						</tr>
					<tr>
						<td>Wednesday Afternoon</td>
						<td>Foreign Languages</td>
						<td><a href="http://finals.cytopic.net/admins/list.php?class=French&notes=Display" class="finalsSchedLinks">AP French Language</a>, <a href="http://finals.cytopic.net/admins/list.php?class=French&notes=Display" class="finalsSchedLinks">AP French Lit</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Latin&notes=Display" class="finalsSchedLinks">AP Latin Lit</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Latin&notes=Display" class="finalsSchedLinks">AP Latin: Vergil</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Spanish&notes=Display" class="finalsSchedLinks">AP Spanish Language</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Spanish&notes=Display" class="finalsSchedLinks">AP Spanish Lit</a>, <a href="http://finals.cytopic.net/admins/list.php?class=French&notes=Display" class="finalsSchedLinks">French I/II/III/IV</a>, <a href="http://finals.cytopic.net/admins/list.php?class=French&notes=Display" class="finalsSchedLinks">Honors French III</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Japanese&notes=Display" class="finalsSchedLinks">Honors Japanese III/IV</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Latin&notes=Display" class="finalsSchedLinks">Honors Latin III</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Mandarin&notes=Display" class="finalsSchedLinks">Honors Mandarin III</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Spanish&notes=Display" class="finalsSchedLinks">Honors Spanish II/III</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Japanese&notes=Display" class="finalsSchedLinks">Japanese I/II/III/IV</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Latin&notes=Display" class="finalsSchedLinks">Latin I/II/III/IV</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Mandarin&notes=Display" class="finalsSchedLinks">Mandarin I/II/III</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Spanish&notes=Display" class="finalsSchedLinks">Spanish I/II/III/IV</a></td>
					</tr>
					<tr>
						<td>Thursday Morning</td>
						<td>Science I</td>
						<td>AP Biology, Biology, Chemistry, Honors Biology, Honors Chemistry</td>
					</tr>
					<tr>
						<td>Thursday Afternoon</td>
						<td>Science II</td>
						<td>AP Chemistry, AP Physics B, AP Physics C, <a href="http://finals.cytopic.net/admins/list.php?class=Physics&notes=Display" class="finalsSchedLinks">Honors Physics</a>, <a href="http://finals.cytopic.net/admins/list.php?class=Physics&notes=Display" class="finalsSchedLinks">Physics</a></td>
					</tr>
					<tr>
						<td>Friday Morning</td>
						<td>Computer Science/Misc</td>
						<td>AP Computer Science A, AP Computer Science AB, AP Micro Economics, AP Music, Digital World, Economics, Programming</td>
					</tr>
					<tr>
						<td>Friday Afternoon</td>
						<td>Conflicts</td>
						<td>-- Conflicts --</td>
					</tr>
				</table>
			</div>
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
		 		src="../images/icons/xhtml.png"
	     		alt="Valid XHTML 1.0 Strict" 
				/>
	 		</a>
	 	</p>
		<a href="http://www.apple.com/" class="mac"><img style="border:0;border-style:none;" src="../images/madeonmac.png" alt="Made on a Mac!" /></a>
		</div>
	</div>
</div>
</body>
</html>