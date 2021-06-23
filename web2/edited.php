<?php
session_start();
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,"web2");

if ($_SESSION['email'] &&
	$_SESSION['password'] &&
	$_SESSION['fname'] &&
	$_SESSION['lname'] && $_SESSION['age'] && $_SESSION['id']
	) {
if (isset($_POST['submit'])) {
	$email=$_POST['email'];
	$id=$_POST['id'];
	$password=$_POST['password'];
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$age=$_POST['age'];
	$gender=$_POST['gender'];
	$file=$_FILES['image'];
	$filename=$file['name'];
	$filetmp=$file['tmp_name'];
	$filesize=$file['size'];
if ($filesize <=5000000) {
	$des='images/'.$filename;
	if (move_uploaded_file($filetmp, $des )) {
		$insert="update  project2 set email='$email',password='$password',fname='$fname',lname='$lname',age='$age',gender='$gender',image='$des' where id=$id";
		$inserrun=mysqli_query($con,$insert);
		header("location:home.php");
	# code...
}
}
}

	?>

	<?php
}
else {
	header("location:loginpage.html");
}

?>
