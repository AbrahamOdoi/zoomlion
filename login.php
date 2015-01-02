<?php
session_start();
if (isset($_POST['btnlogin'])) {
	$user = $_POST['username'];
	$password = $_POST['password'];

	$url = "http://localhost/personal/revcollector/loginval.php?user=$user&pass=$password";
	$urloutput = file_get_contents($url);

	if ($urloutput == 'correct') {
		echo "<p style='color:green; font-weight:bolder;'>Loading main panel...</p>";
		header("location:main.php");
	} elseif ($urloutput == 'wrong') {
		echo "<p style='color:red; font-weight:bolder;'>Credentials not correct</p>";
	} else {
		echo "<p style='color:purple;'>Check your internet connectivity and try again  </p>";
	}
}
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Instania</title>

		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link rel="shortcut icon" href="favicon.ico">
		<link rel="stylesheet" href="css/themes/default/jquery.mobile-1.4.4.min.css">
		<link rel="stylesheet" href="css/style.css">
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
		<script src="js/jquery.js"></script>
		<script src="js/script.js"></script>
		<script src="js/jquery.mobile-1.4.4.min.js"></script>
		<script src="js/cordova.js"></script>
	</head>
	<body style="font-family:Arial; background: blue;">

		<div data-role="page" id="pgWelcome">

			<div data-role="header" data-position='fixed' data-theme='b' data-add-back-btn="true" style="background: blue; border: none;">
				<a href="index.html"  data-transition='flow' class="ui-btn ui-icon-back ui-btn-icon-notext ui-corner-all">No text</a>
				<h1>LOGIN</h1>
			</div><!-- /header -->

			<div role="main" class="ui-content">
				<div>
					<form action="" method="post">
						<label for="username" style="text-align: center">Username</label>
						<input type="text" name="username" value="" id="txtusername"/>
						<label for="password" style="text-align: center">Password</label>
						<input type="password" name="password" value="" id="txtpassword"/>
						<input type="submit" name="btnlogin" style="border-left: 1px solid skyblue; background: #3388cc; text-shadow: none;" value="Login"/>
					</form>
				</div>
				<div style="text-align: center;" id="alertDisplay"></div>

			</div><!-- /content -->

			<div data-role="footer" data-position="fixed" data-theme='' style="background: blue; border: none; color: white;">
				<h1>ZoomLion</h1>
			</div>
			<!-- /footer -->
		</div><!-- /page -->

	</body>
</html>
<script>
	document.addEventListener("deviceready", onDeviceReady, false);

	function onDeviceReady() {
		document.addEventListener("pause", onPause, false);
		document.addEventListener("resume", onResume, false);
		alert("Device is Ready");

	}

	//What to do when paused
	function onPause() {

		alert("paused!");
	}

	//What to do when resumed
	function onResume() {

		alert("resume");
	}
</script>
