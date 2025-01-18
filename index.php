  <html>  
<head>  
  <title>Class Scheduling System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css\bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script> 
<style>  
    .container {  
     margin-top: 150px;  
	}
	 input.btn.btn-lg.btn-success.btn-block:focus {
    background: maroon;
}
  
</style>
  </head>  
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
                            <div class="form-group"  >  
                                <input class="form-control" placeholder="Email Address" name="user_email" type="email" autofocus>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="user_pass" type="password" value="">  
                            </div>  
  
  
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Log In" name="Login" > 
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
	if(isset($_POST['Login']))//this will tell us what to do if some data has been post through form with button.  
{ 
	$user_email = $_POST['user_email'];
	$user_pass = $_POST['user_pass'];

	// for example this array is the database
	//$db = array('ID' => 1, 'user_email' => '$user_email', 'Suser_pass' => '$user_pass');

	// connection
	$con = mysqli_connect('localhost', 'root', '', 'pup_ocss');
	// query
	$query = "SELECT * from faculty_tbl WHERE user_email = '$user_email' AND  user_pass = md5('$user_pass')";

	// declare and execute the query
	$sql = mysqli_query($con, $query);

	if (mysqli_num_rows($sql)) {
		while ($row = mysqli_fetch_array($sql)) {
			session_start();
			$_SESSION['ID'] = $row['fname'];
			header('Location: home.php');
		}
	} else {
		echo"<script>alert('Admin Details are incorrect..!')</script>";}  
	}
	
?>