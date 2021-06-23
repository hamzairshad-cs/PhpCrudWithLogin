<?php

$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,"web2");

if (isset($_POST['submit'])) {


	$email=$_POST['email'];
	$password=$_POST['password'];
	$file=$_FILES['image'];
	$filename=$file['name'];
	$filetmp=$file['tmp_name'];
	$filesize=$file['size'];

	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];


if ($filesize <=5000000) {
	$des='images/'.$filename;
	if (move_uploaded_file($filetmp, $des )) {
		$insert="insert into project2 (email,password,fname,lname,age,gender,image) values ('$email','$password','$fname','$lname',$age,'$gender','$des')";
		$inserrun=mysqli_query($con,$insert);
		header("location:loginpage.html");
		# code...
	}

	# code...
}

		# code...
}

 
	# code...


?>


