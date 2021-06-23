<?php
session_start();
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,"web2");

if (isset($_POST['submit'])) {
	$email=$_POST['email'];
	
	$password=$_POST['password'];
$signin="select * from project2 where email='$email' and password='$password'";
$signinrun=mysqli_query($con,$signin);
$check=mysqli_fetch_assoc($signinrun);
if ($email == $check['email'] && $password == $check['password']) {
	$_SESSION['email']=$email;
	$_SESSION['password']=$password;
	$_SESSION['fname']=$check['fname'];
	$_SESSION['lname']=$check['lname'];
	$_SESSION['age']=$check['age'];
	$_SESSION['id']=$check['id'];
	
	?>

	<?php
	header("location:home.php");
	
}
else{
	echo "Wrong Password Or Email". "<br>";
	echo "Want to Login Again?";
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<a href="loginpage.html">Click Here!</a>
</body>
</html>



<?php

}


	# code...
}


	# code...




?>