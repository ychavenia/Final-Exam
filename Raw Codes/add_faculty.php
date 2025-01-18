<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">  
	<link type="text/css" rel="stylesheet" href="style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script>
    <title>Registration</title>  
</head>  
<style>  
    .login-panel {  
        margin-top: 150px;  
  
</style>  
<body>  
  
<div class="container"><!-- container class is used to centered  the body of the browser with some decent width-->  
    <div class="row"><!-- row class is used for grid system in Bootstrap-->  
        <div class="col-md-4 col-md-offset-4"><!--col-md-4 is used to create the no of colums in the grid also use for medimum and large devices-->  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Registration</h3>
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="">  
                        <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="emp_number" name="emp_number" type="text" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="First Name" name="fname" type="text" value="">  
                            </div>  
							<div class="form-group">  
                                <input class="form-control" placeholder="Middle Name" name="mname" type="text" value="">  
                            </div>
							<div class="form-group">  
                                <input class="form-control" placeholder="Last Name" name="lname" type="text" value="">  
                            </div>  
							<div class="form-group">  
                                <input class="form-control" placeholder="Contact Number" name="contact_no" type="text" value="" maxlength="11"/>  
                            </div>  
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="register" name="register" >  
  
                        </fieldset>  
                    </form>   
                </div>  
            </div>  
        </div>  
    </div>  
</div>  
  
</body>  
  
</html>  
  
<?php  
  
include("db_connect.php"); //make connection here  

if(isset($_POST['register']))  
{    
   
    $emp_number=$_POST['emp_number'];//same  
	$fname=$_POST['fname'];//same
	$mname=$_POST['mname'];//same 
	$lname=$_POST['lname'];//same
	$contact_no=$_POST['contact_no'];//same  

    if($emp_number=='')  
    {  
        echo"<script>alert('Please enter the emp_number')</script>";  
    exit();  
    } 
    if($fname=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
	exit();  
    } 
	if($mname=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
	exit();  
    } 
	if($lname=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
	exit();  
    }
	if($contact_no=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
	exit();  
    }
  	
//here query check weather if user already registered so can't register again.  
    $check_faculty_query="select * from faculty_tbl WHERE emp_number='$emp_number'";  
    $run_query=mysqli_query($con,$check_faculty_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
echo "<script>alert('Email $emp_number is already existing in our database, Please try another one!')</script>";  
exit();  
    }  
//insert the user into the database.  
    $insert_user="insert into faculty_tbl (emp_number,fname,mname,lname,contact_no) VALUE ('$emp_number','$fname','$mname','$lname','$contact_no')";  
    if(mysqli_query($con,$insert_user))  
    {  
        echo"<script>window.open('admin.php','_self')</script>";  
    }  
  
  
  
}  
  
?>  