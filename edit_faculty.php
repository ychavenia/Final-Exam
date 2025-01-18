<?php
// including the database connection file
include('db_connect.php');?>
<?php
//getting ID from url
$ID = $_GET['ID'];
 
//selecting data associated with this particular ID
$result = mysqli_query($con, "SELECT * FROM faculty_tbl WHERE ID='$ID'");
while($row = mysqli_fetch_array($result))
{	
	$ID=$row['ID'];
    $emp_number = $row['emp_number'];
    $fname = $row['fname'];
    $date_hired= $row['date_hired'];
	$status = $row['status'];
	$background_field = $row['background_field'];
	$address = $row['address'];
	$contact_no = $row['contact_no'];
	$user_email = $row['user_email'];
	
}
?>
<html>
<head>    
    <title>Edit Data</title>
	<title>OCSS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script>
<style>  
    .row {  
     margin-top: 0px;  
	}
	 input.btn.btn-lg.btn-success.btn-block:focus {
    background: maroon;
}
  
</style> 
</head>
 
<body>
 <div class="row">
 <div class="col-md-4 col-md-offset-4">  
    <form name="form1" method="post" action="edit_faculty.php">
<div class="cont_edit">
<div class="form-group">
  <label for="usr">Employee Number:</label>
  <input type="text" class="form-control" id="usr" name="emp_number" value="<?php echo $emp_number;?>" required>
</div>
<div class="form-group">
  <label for="usr">Faculty Name:</label>
  <input type="text" class="form-control" id="usr" name="fname" value="<?php echo $fname;?>"required>
</div>
<div class="form-group">
  <label for="usr">Date Hired:</label>
  <input type="date" class="form-control" id="usr" name="date_hired" value="<?php echo $date_hired;?>"required>
</div>
<div class="form-group">
  <label for="status">Status:</label>
  <!--<input type="text" class="form-control" id="usr" name="status" value="<?php //echo $status;?>"required>-->
  <select id="status" name="status" class="form-control">
						<option value="<?php echo $status;?>"><?php echo $status;?></option>
						<option value="Part-time Faculty">Part-time Faculty</option>
						<option value="Temporary">Temporary</option>
						<option value="Full-time Faculty">Full-time Faculty</option>
						</select>
</div>
<div class="form-group">
  <label for="usr">Background Field:</label>
  <input type="text" class="form-control" id="usr" name="background_field" value="<?php echo $background_field;?>"required>
</div>
<div class="form-group">
  <label for="usr">Address:</label>
  <input type="text" class="form-control" id="usr" name="address" value="<?php echo $address;?>"required>
</div>
<div class="form-group">
  <label for="usr">Contact Number:</label>
  <input type="text" class="form-control" id="usr" name="contact_no" value="<?php echo $contact_no;?>"required>
</div>
<div class="form-group">
  <label for="usr">Email:</label>
  <input type="email" class="form-control" id="usr" name="user_email" value="<?php echo $user_email;?>"required>
</div>
                <input type="hidden" name="ID" value="<?php echo $_GET['ID'];?>">
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Update" name="update" >
		<?php
if(isset($_POST['update']))
{    
    $ID = $_POST['ID'];
    $emp_number=$_POST['emp_number'];
    $fname=$_POST['fname'];
    $date_hired=$_POST['date_hired'];    
    $status=$_POST['status'];
	$background_field=$_POST['background_field'];
	$address=$_POST['address'];
	$contact_no=$_POST['contact_no'];
	$user_email=$_POST['user_email'];
    // checking empty fields
    if(empty($emp_number) || empty($fname) || empty($date_hired) || empty($status)|| empty($background_field)|| empty($address)|| empty($contact_no) || empty($user_email)){            
		if(empty($emp_number)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        }
        
        if(empty($fname)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        }
		if(empty($date_hired)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        }
        
        if(empty($status)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        } 
		if(empty($background_field)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        }
		if(empty($address)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        }
		if(empty($contact_no)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        }
		if(empty($user_email)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        } 
    } else {
        //updating the table
        $result = mysqli_query($con, "UPDATE faculty_tbl SET emp_number='$emp_number',fname='$fname',date_hired='$date_hired',status='$status',background_field='$background_field',address='$address',contact_no='$contact_no',user_email='$user_email' WHERE ID=$ID");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location:admin.php");
    }
}
?>
</div>
</form>
</div>
</div>
</body>
</html>