<?php  
session_start();  
  
/* if(!$_SESSION['user_email'])  
{  
  
    header("Location: login.php");//redirect to login page to secure the welcome page without login access.  
}   */
  
?>  
  
<html>  
<head>  
  <title>Class Scheduling System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css\bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script> 
</head>  
  
<body>  
<?php include("header.php");?><span> <!--Welcome<!--</span><?php  echo $_SESSION['user_email']; ?>-->
<?php include("header_sub.php");?> 
<?php
include('db_connect.php');
$user_email = $_SESSION["user_email"]; // store the user id into session
$sql = "SELECT * FROM schedule_tbl WHERE user_email='$user_email'";
$result = mysqli_query($con,$sql);

if($row = mysqli_fetch_array($result)) {
	$sched_id = $row["sched_id"];
    $subject = $row["subject"];
	$day = $row["day"];
    $time = $row["time"];
    $room = $row["room"];
	$faculty = $row["faculty"];
	$user_email =$row["user_email"];
	
	echo "
	<table class='table table-bordered table-hover' style='table-layout: fixed'>
        <tr><td>First Name</td><td> : </td><td>$sched_id</td></tr>
        <tr><td>Middle</td><td> : </td><td>$subject</td></tr>
        <tr><td>Last Name</td><td> : </td><td>$day</td></tr>
		<tr><td>First Name</td><td> : </td><td>$time</td></tr>
        <tr><td>Middle</td><td> : </td><td>$room</td></tr>
        <tr><td>Last Name</td><td> : </td><td>$faculty</td></tr>
		<tr><td>Last Name</td><td> : </td><td>$user_email</td></tr>
    </table>";
}
?>

 <?php include("footer.php");?>
</body>  
</html> 