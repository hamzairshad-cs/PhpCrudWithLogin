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

	?>
<!DOCTYPE html>
<html>
<head>
	<script type="text/javascript">
		function call1()
		{
			if(confirm("Do you want to delete it?"))
			{
			window.location.href="deleted.php";

			
			
			}
			else
			{
				
					}
			}

	</script>
	<title></title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body style="background: rgb(37,48,55);
background: linear-gradient(90deg, rgba(37,48,55,0.9332107843137255) 0%, rgba(255,0,0,0) 100%, rgba(193,0,254,0.5802696078431373) 100%); color: black;" onload="call1()">
<nav class="navbar navbar-expand-lg navbar-dark " style="background-color:#253037; ">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin Panel</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div  style="float: right;">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="home.php">Profile</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Settings
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="edit.php">Edit</a></li>
            <li><a class="dropdown-item" href="delete.php">Delete</a></li>
            <li><a class="dropdown-item" href="logout.php">Log Out</a></li>
            
           
          </ul>
        </li>
       
      </ul>
     
    </div>
  </div>
</nav>

<div><h1 style="text-align: center; margin-top: 100px;">Welcome To Our Panel!</h1></div>
<div class="row">
	<div ><?php
	$id=$_SESSION['id'];

$qu="select * from project2 where id=$id";
	$que=mysqli_query($con,$qu);
	$check=mysqli_fetch_array($que);

	?>
	<img src="<?php echo $check['image']; ?>" style="width: 500px; margin-left: 50px; float: left; margin-top: 15px;">
	<div style=" text-align: center; margin-bottom:  20px;">
	<h5>&nbspFirst Name:</h5>
		<p>&nbsp<?php echo $check['fname']; ?></p>
		<h5>&nbspLast Name:</h5>
		<p>&nbsp<?php echo $check['lname']; ?></p>
		<h5>&nbspAge:</h5>
		<p>&nbsp<?php echo $check['age']; ?></p>
		<h5>&nbspGender:</h5>
		<p>&nbsp<?php echo $check['gender']; ?></p>

		</div>
	</div>
	
</div>


</body>
</html>

	<?php
}
else {
	header("location:loginpage.html");
}

?>
