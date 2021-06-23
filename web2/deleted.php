<?php
session_start();
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,"web2");

if ($_SESSION['email'] &&
	$_SESSION['password'] &&
	$_SESSION['fname'] &&
	$_SESSION['lname'] && $_SESSION['age'] && $_SESSION['id']
	) {
	$id=$_SESSION['id'];
	$sq="delete from project2 where id=$id";
	$sqrun=mysqli_query($con,$sq);
	session_destroy();
	header("location:loginpage.html");




}
else
{
	session_destroy();
		header("location:loginpage.html");
}
?>

