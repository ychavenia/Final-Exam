<?php  
session_start();//session starts here  
  
?> 
<html>  
<head lang="en">  
    <meta charset="UTF-8">    
	 <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
	<link type="text/css" rel="stylesheet" href="style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script>
    <title>Admin Login</title>  
</head>  
<style>  
    .container {  
     margin-top: 150px;  
	}
	 input.btn.btn-lg.btn-success.btn-block:focus {
    background: maroon;
}
  
</style>  
  
<body>  
  <div class="container">  
    <div class="row">  
        <div class="col-md-4 col-md-offset-4">  
            <div class="login-panel panel panel-success">  
                <div class="panel-heading">  
                    <h3 class="panel-title">Sign In</h3>
                </div>  
                <div class="panel-body"> 
							<form role="form" method="post" action="">
							<fieldset>
                            <div class="form-group">  
                                <input class="form-control" placeholder="Username" name="admin_username" type="text" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="admin_pass" type="password" value="">  
                            </div>  
  
  
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Log In" name="admin_login" > 
							
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

include("db_connect.php");  
  
if(isset($_POST['admin_login']))//this will tell us what to do if some data has been post through form with button.  
{  
    $admin_username=$_POST['admin_username'];  
    $admin_pass=$_POST['admin_pass'];  
	
    $admin_query="select * from admin where admin_username='$admin_username' AND admin_pass='$admin_pass'";  
    $run_query=mysqli_query($con,$admin_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
  
        echo "<script>window.open('admin.php','_self')</script>"; 
		$_SESSION['admin_username']=$admin_username;//here session is used and value of $user_email store in $_SESSION.  
    }  
    else {echo"<script>window.alert('Admin Details are incorrect..!')</script>";}  
  
}  
  
?> 