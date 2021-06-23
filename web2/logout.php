<?php
session_start();
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,"web2");

if ($_SESSION['email'] &&
	$_SESSION['password'] &&
	$_SESSION['fname'] &&
	$_SESSION['lname'] && $_SESSION['age'] && $_SESSION['id']
	) {
session_destroy();
header("location:loginpage.html");
}
else {
	header("location:loginpage.html");
}

?>