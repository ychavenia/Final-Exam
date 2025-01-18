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
                    <h3 class="panel-title">User Registration</h3>  
                </div>  
                <div class="panel-body">  
                    <form role="form" method="post" action="">  
                        <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="E-mail" name="email" type="email" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="">  
                            </div>  
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Add User " name="register" >  
  
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
   
    $user_email=$_POST['email'];//same  
	 $user_pass=$_POST['pass'];//same  

    if($user_email=='')  
    {  
        echo"<script>alert('Please enter the email')</script>";  
    exit();  
    } 
    if($user_pass=='')  
    {  
        echo"<script>alert('Please enter the password')</script>";  
	exit();  
    }  
  	
//here query check weather if user already registered so can't register again.  
    $check_email_query="select * from users WHERE user_email='$user_email'";  
    $run_query=mysqli_query($con,$check_email_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
echo "<script>alert('Email $user_email is already existing in our database, Please try another one!')</script>";  
exit();  
    }  
//insert the user into the database.  
    $insert_user="insert into users (user_email,user_pass) VALUES ('$user_email',md5('$user_pass'))";  
    if(mysqli_query($con,$insert_user))  
    {  
        echo"<script>window.open('admin.php','_self')</script>";  
    }  
  
  
  
}  
  
?>  