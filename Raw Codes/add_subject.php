<html>  
<head lang="en">  
    <meta charset="UTF-8">  
    <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">  
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
                                <input class="form-control" placeholder="Course Code" name="course_code" type="text" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Course Description" name="course_description" type="text" value="">  
                            </div>  
							<div class="form-group">  
                                <input class="form-control" placeholder="Unit" name="unit" type="number" value="">  
                            </div>
							<div class="form-group">  
                                <input class="form-control" placeholder="Lecture(hrs)" name="lecture" type="number" value="">  
                            </div>  
							<div class="form-group">  
                                <input class="form-control" placeholder="Laboratory(hrs)" name="laboratory" type="number" value="">  
                            </div>  
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="add" name="add" >  
  
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

if(isset($_POST['add']))  
{    
   
    $course_code=$_POST['course_code'];//same  
	$course_description=$_POST['course_description'];//same
	$unit=$_POST['unit'];//same 
	$lecture=$_POST['lecture'];//same
	$laboratory=$_POST['laboratory'];//same  

    if($course_code=='')  
    {  
        echo"<script>alert('Please enter the course_code')</script>";  
    exit();  
    } 
    if($course_description=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
	exit();  
    } 
	if($unit=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
	exit();  
    } 
	if($lecture=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
	exit();  
    }
	if($laboratory=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
	exit();  
    }
  	
//here query check weather if user already registered so can't add again.  
    $check_subject_query="select * from subject_tbl WHERE course_code='$course_code'";  
    $run_query=mysqli_query($con,$check_subject_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
echo "<script>alert('Email $course_code is already existing in our database, Please try another one!')</script>";  
exit();  
    }  
//insert the user into the database.  
    $insert_user="insert into subject_tbl (course_code,course_description,unit,lecture,laboratory) VALUE ('$course_code','$course_description','$unit','$lecture','$laboratory')";  
    if(mysqli_query($con,$insert_user))  
    {  
        echo"<script>window.open('admin.php','_self')</script>";  
    }  
  
  
  
}  
  
?>  