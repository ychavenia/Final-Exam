<?php
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$con = mysqli_connect('localhost', 'root', '', 'pup_ocss');
	// query
session_start();// Starting Session
// Storing Session
$ID=$_SESSION['ID'];
// SQL Query To Fetch Complete Information Of User
$query="select * from faculty_tbl where fname='$ID'";
$sql = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($sql)) {
		$emp_number = $row["emp_number"];
		$fname = $row["fname"];
		/* $mname = $row["mname"];
		$lname = $row["lname"]; */
		$date_hired=$row["date_hired"];
		$status=$row["status"];
		$background_field=$row["background_field"];
		$address=$row["address"];
		$contact_no =$row["contact_no"];
		$user_email= $row['user_email'];
	}
?>
<html>  
<head>  
  <title>Class Scheduling System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css\bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css\font-awesome.css">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script> 
<body>
<?php include("header.php");?><span></span>
<?php include("header_sub.php");?>   
<div class="table-scrol">
<div class="table-responsive">
<table class="table table-bordered" style="table-layout: fixed">
<tr><td><span class="title_text"><b>Employee Number :</b></span><?php echo $emp_number;?> </td></tr>
<tr><td><b>Faculty Name :</b><?php echo $fname;?> </td></tr>
<!--<tr><td>Middle Name :<?php //echo $mname;?> </td></tr>
<tr><td>Last Name :<?php //echo $lname;?> </td></tr>-->
<tr><td><b>Date Hired :</b><?php echo $date_hired;?> </td></tr>
<tr><td><b>Status :</b><?php echo $status;?> </td></tr>
<tr><td><b>Background Field :</b><?php echo $background_field;?> </td></tr>
<tr><td><b>Address :</b><?php echo $address;?> </td></tr>
<tr><td><b>Contact Number :</b><?php echo $contact_no;?> </td></tr>
<tr><td><b>Email Address :</b><?php echo $user_email;?> </td></tr>
</table>
</div>
</div>
<?php include("footer.php");?>
</body>
</html>
