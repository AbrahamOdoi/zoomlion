<?php
session_start();
require_once 'core/connection.php';

if (isset($_POST['user'])) {
	$user = $_POST['username'];
	$pass = $_POST['pass'];

} elseif (isset($_GET['user'])) {
	$user = $_GET['user'];
	$pass = $_GET['pass'];
}

$execute = mysqli_query($con, "select * from users where username='$user' and password='$pass'");
if (mysqli_num_rows($execute) > 0) {
	echo 'correct';
	exit ;
} else {
	echo "wrong";
	exit ;
}
?>
