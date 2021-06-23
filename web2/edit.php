<?php
session_start();
$con=mysqli_connect("localhost","root","");
$db=mysqli_select_db($con,"web2");

if ($_SESSION['email'] &&
	$_SESSION['password'] &&
	$_SESSION['fname'] &&
	$_SESSION['lname'] && $_SESSION['age'] && $_SESSION['id']
	) {
	?>
	<!DOCTYPE html>
<html>
<head>
	<title></title>
	<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
</head>
<body style="background: rgb(37,48,55);
background: linear-gradient(90deg, rgba(37,48,55,0.9332107843137255) 0%, rgba(255,0,0,0) 100%, rgba(193,0,254,0.5802696078431373) 100%);">
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


<div class="container">
  <!DOCTYPE html>
<html>
<head>
  <title></title>
  <style type="text/css">
  .bg{
   background-color:  #253037;
   height: 50vw;
   width: 35vw;
   
   margin: auto;
   margin-top: 120px;
   color: white;

  }

    
  </style>
<script type="text/javascript">
   
      
  function validate(){
  
    var email=document.getElementById('email').value;

    var password=document.getElementById('pass').value;
    var fname=document.getElementById('fname').value;

    var lname = document.getElementById('lname').value;
    var age=document.getElementById('age').value;
    var img=document.getElementById('img').value;

    var ext=img.substring(img.lastIndexOf('.')+1);
    

    
    if(email == "")
    {
        
        document.getElementById('erremail').innerHTML="Email is not correct";
        
    }
    else{
      document.getElementById('erremail').innerHTML="";
      
    }
    

    if (password == "" || password.length < 4) {
      
        document.getElementById('errpass').innerHTML="Password should be greater than 4 digits";
        
    }
    else
    {
      document.getElementById('errpass').innerHTML="";
    }
    
    if (age == "" || age < 18) {
        
    document.getElementById('errage').innerHTML="Age should be greater than 18";  }

    else
    {
      
        document.getElementById('errage').innerHTML="";
        
    }
    if (lname == "") {
        document.getElementById('errlname').innerHTML="Last Name cant be empty";
        }
      else{
        document.getElementById('errlname').innerHTML="";
        
      }
    if (fname == "") {

        document.getElementById('errfname').innerHTML="First Name cant be empty";

      }
      else
      {
      document.getElementById('errfname').innerHTML=""; 
      }


    
//    


    if (ext == "jpeg" || ext == "JPEG" || ext == "jpg" || ext == "JPG" ) 
      {
        
        document.getElementById('errimg').innerHTML="";
      }
    else{
      
      if (ext== "") {document.getElementById('errimg').innerHTML="Upload correct file";
      return false;}
        
        else{
        document.getElementById('errimg').innerHTML="Upload correct file";
        return false;
      }
      
    }

  }
</script>
</head>
<?php
 $id=$_SESSION['id'];

$qu="select * from project2 where id=$id";
  $que=mysqli_query($con,$qu);
  $check=mysqli_fetch_array($que);
   ?>
<body style="background-image: url(bg.jpg); width: 100%;">
<div class="bg">
  <h2>Edit</h2>
  <form action="edited.php" method="post" onsubmit="return validate()" enctype="multipart/form-data" style="margin: auto;">
    <label>ID</label><input type="text" name="id" readonly value="<?php echo $check['id']; ?>"><br><br>
  <label>Email</label>
  <input type="email" name="email" id="email" value="<?php echo $check['email']; ?>">
  <div id="erremail" style="background-color: red;"></div><br>
    <label>Password</label>
      <input type="Password" name="password" id="pass" value="<?php echo $check['password']; ?>">
      <div id="errpass" style="background-color: red;"></div><br>
      <label>First Name</label>
      <input type="text" name="fname" id="fname" value="<?php echo $check['fname']; ?>">
      <div id="errfname" style="background-color: red;"></div>
      <br>
      <label>Last Name</label>
      <input type="text" name="lname" id="lname" value="<?php echo $check['lname']; ?>">
      <div id="errlname" style="background-color: red;"></div><br>
      <label>Age</label><input type="number" name="age" id="age" value="<?php echo $check['age']; ?>">
      <div id="errage" style="background-color: red;"></div><Br>
      <label>Gender</label>

      <label>Male</label><input type="radio" name="gender" value="male" id="gen">
      <label>Female</label><input type="radio" name="gender" value="female" id="gen">
      
      <div id="errgen" style="background-color: red;"></div>

<br>
      <label>Upload Photo</label>
    <input type="file" name="image" id="img">


      <div id="errimg" style="background-color: red;"></div><Br>

      
    
      <input type="submit" name="submit" value="submit"><br>
    </form>
   
</div>




</body>
</html>
</div>

</body>
</html>

<?php
}
else {
	header("location:loginpage.html");
}

?>

