<?php  
session_start();  
  
if(!$_SESSION['admin_username'])  
{  
  
    header("Location: admin_login.php");//redirect to login page to secure the welcome page without login access.  
}  
  
?> 
<html>  
<head>
  <title>OCSS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script>
  <style>
body {
    font-family: "Lato", sans-serif;
	margin: 0;
}

.sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 1;
    top: 0;
    left: 0;
    background-color: rgb(78, 3, 3);;
    overflow-x: hidden;
    transition: 0.5s;
    padding-top: 60px;
}

.sidenav a {
    padding: 8px 8px 8px 32px;
    text-decoration: none;
    font-size: 15px;
    color: #818181;
    display: block;
    transition: 0.3s;
}

.sidenav a:hover {
    color: #f1f1f1;
}

.sidenav .closebtn {
    position: absolute;
    top: 0;
    right: 25px;
    font-size: 36px;
    margin-left: 50px;
}

#main {
    transition: margin-left .5s;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 12px;}
  .sidenav a {font-size: 12px;}
}
<!--New Added CSS for Accordion-->
.dd_collapsible {
    background-color: #800;
    color: #fff;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: none;
    font-size: 15px;
    transition: 0.4s;
}

.active, .dd_collapsible:hover {
    background-color: #ec971f;
	color:#fff;
}

.panel {
    padding: 0 18px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
}
.dd_collapsible {
    padding: 10px 30px 10px 30px;
    background-color: #800;
    border-color: #800;
	border:none;
    color: #fff;
	font-size:16px;
}
</style>
</head>
<body id="main"> 
<div id="mySidenav" class="sidenav">
	<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      <h4>Administrator Dashboard</h4>
	  <span>Log-In as </span><?php  echo $_SESSION['admin_username']?>
      <ul class="nav nav-pills nav-stacked">
		<!--<li><a href="#" data-toggle="modal" data-target="#userModal">Add User</a></li>-->
		<li><a href="#" data-toggle="modal" data-target="#facultyModal">Add Faculty</a></li>
		<li><a href="#" data-toggle="modal" data-target="#subjectModal">Add Subject</a></li>
		<li><a href="#" data-toggle="modal" data-target="#roomModal">Add Room</a></li>
		<li><a href="#" data-toggle="modal" data-target="#timeModal">Add Time</a></li>
		<li><a href="#" data-toggle="modal" data-target="#dayModal">Add Day</a></li>
		<li><a href="#" data-toggle="modal" data-target="#signatoryModal">Add Signatory</a></li>
        <li><a href="create_schedule.php">Create Schedule</a></li>
		 <li><a href="admin_logout.php">Log Out</a></li>
		 <!--<script src="http://www.magtxt.biz/sms_widget_embed.js" defer></script><div name="sms_widget" style="display:none;"></div>-->
		 <script src="http://www.magtxt.biz/sms_widget_embed.js" defer></script><div name="sms_widget" style="display:none;"></div>
		 
		</ul><br>
     <!--<div class="input-group">
        <input type="text" class="form-control" placeholder="Search Blog..">
        <span class="input-group-btn">
          <button style="height: 34px;" class="btn btn-default" type="button">
            <span class="glyphicon glyphicon-search"></span>
          </button>
        </span>
      </div>-->
</div>
  <!--Modal for Adding Users ends-->
<!-- Modal for Adding Faculty starts-->
  <div class="modal fade" id="facultyModal" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Faculty Form</h4>
        </div>
			<div class="panel-body">  
                    <form role="form" method="post" action="">  
                        <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Employee Number" name="emp_number" type="text" required/>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Last Name, First Name M.I." name="fname" type="text"required/>  
                            </div>  
							<!--<div class="form-group">  
                                <input class="form-control" placeholder="Middle Name" name="mname" type="text"required/>  
                            </div>
							<div class="form-group">  
                                <input class="form-control" placeholder="Last Name" name="lname" type="text" required/>  
                            </div>-->
							<div class="form-group">  
                                <input class="form-control" placeholder="Date Hired" name="date_hired" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="date_hired"required/>  
                            </div>
							<div class="form-group">  
                                <!--<input class="form-control" placeholder="Status" name="status" type="text" required/>-->
								<select id="status" name="status" class="form-control">
								<option>Select Status</option>
								<option value="Part-time Faculty">Part-time Faculty</option>
								<option value="Temporary">Temporary</option>
								<option value="Full-time Faculty">Full-time Faculty</option>
								</select>
                            </div>
							<div class="form-group">  
                                <input class="form-control" placeholder="Field/Expertise" name="background_field" type="text" required/>  
                            </div>
							<div class="form-group">  
                                <input class="form-control" placeholder="Address" name="address" type="text" required/>  
                            </div> 
							<div class="form-group">  
                             <input class="form-control" placeholder="Contact Number" name="contact_no" type="text" maxlength="11" required/>  
                            </div> 
							<div class="form-group">  
                                <input class="form-control" placeholder="E-mail" name="email" type="email" required />  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Password" name="pass" type="password" value="" required />  
                            </div> 
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Add Faculty" name="register_faculty" >  
  
                        </fieldset>  
                    </form>   
                </div> 
<?php  
  
include("db_connect.php"); //make connection here  
if(isset($_POST['register_faculty']))  
{    
    $emp_number=$_POST['emp_number'];//same  
	$fname=$_POST['fname'];//same
	$contact_no=$_POST['contact_no'];//same
	$date_hired=$_POST['date_hired'];
	$status=$_POST['status'];
	$background_field=$_POST['background_field'];
	$address=$_POST['address'];
	$user_email=$_POST['email'];//same
	$user_pass=$_POST['pass'];//same 

    if($emp_number=='')  
    {  
        echo"<script>alert('Please enter the emp_number')</script>";  
    exit();  
    } 
    if($fname=='')  
    {  
        echo"<script>alert('Please enter the First Name')</script>";  
	exit();  
    } 
	/* if($mname=='')  
    {  
        echo"<script>alert('Please enter the Middle Name')</script>";  
	exit();  
    } 
	if($lname=='')  
    {  
        echo"<script>alert('Please enter the Last Name')</script>";  
	exit();  
    } */
	if($date_hired=='')  
    {  
        echo"<script>alert('Please enter the Date')</script>";  
	exit();  
    }
	if($status=='')  
    {  
        echo"<script>alert('Please enter the Status')</script>";  
	exit();  
    }
	if($background_field=='')  
    {  
        echo"<script>alert('Please enter the Background Field')</script>";  
	exit();  
    }
	if($address=='')  
    {  
        echo"<script>alert('Please enter the Address')</script>";  
	exit();  
    }
	if($contact_no=='')  
    {  
        echo"<script>alert('Please enter the Contact Number')</script>";  
	exit();  
    }
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
    $check_faculty_query="select * from faculty_tbl WHERE emp_number='$emp_number'OR contact_no='$contact_no' OR user_email='$user_email'";  
    $run_query=mysqli_query($con,$check_faculty_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
		//echo "<script>alert('The data $emp_number or $email is already existing in our database, Please try another one!')</script>"; 
		$message = "Some Data exist already.\\nTry again.";
				echo "<script type='text/javascript'>alert('$message');</script>";
				echo"<script>window.open('admin.php','_self')</script>"; 
		exit();  
    }  
//insert the user into the database.  
    $insert_user="insert into faculty_tbl (emp_number,fname,date_hired,status,background_field,address,contact_no,user_email,user_pass) VALUES ('$emp_number','$fname','$date_hired','$status','$background_field','$address','$contact_no','$user_email',md5('$user_pass'))";  
    if(mysqli_query($con,$insert_user))  
    {  
        echo"<script>window.open('admin.php','_self')</script>";  
    }    
}  
?>  				
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!--Modal for adding Faculty ends-->
  <!-- Modal for Adding Subjects starts-->
  <div class="modal fade" id="subjectModal" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Subject Form</h4>
        </div>
			<div class="panel-body">  
                    <form role="form" method="post" action="">  
                       <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Subject Code" name="subject_code" type="text" autofocus required/>  
                            </div>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Subject Description" name="subject_description" type="text" value=""required/>  
                            </div>  
							<div class="form-group">
                                <select id="unit" name="unit" class="form-control">
								<option>Select Unit</option>
								<option value="2">2</option>
								<option value="3">3</option>
								<option value="5">5</option>
								</select>
                            </div>
							<div class="form-group">  
                                <select id="lecture" name="lecture" class="form-control">
								<option>Select Lecture</option>
								<option value="2">2</option>
								<option value="3">3</option>
								</select>
                            </div>
							<div class="form-group">
							<select id="laboratory" name="laboratory" class="form-control">
							<option>Select Laboratory</option>
							<option value="0">0</option>
							<option value="2">2</option>
							<option value="3">3</option>
							</select>
							</div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Add Subject" name="add" >  
  
                        </fieldset>  
                    </form>   
                </div> 
<?php  
  
include("db_connect.php"); //make connection here  

if(isset($_POST['add']))  
{    
   
    $subject_code=$_POST['subject_code'];//same  
	$subject_description=$_POST['subject_description'];//same
	$unit=$_POST['unit'];//same 
	$lecture=$_POST['lecture'];//same
	$laboratory=$_POST['laboratory'];//same  

    if($subject_code=='')  
    {  
        echo"<script>alert('Please enter the subject_code')</script>";  
    exit();  
    } 
    if($subject_description=='')  
    {  
        echo"<script>alert('Please enter the Data')</script>";  
	exit();  
    } 
	if($unit=='')  
    {  
        echo"<script>alert('Please enter the Unit')</script>";  
	exit();  
    } 
	if($lecture=='')  
    {  
        echo"<script>alert('Please enter the Lecture')</script>";  
	exit();  
    }
	if($laboratory=='')  
    {  
        echo"<script>alert('Please enter the laboratory')</script>";  
	exit();  
    }
  	
//here query check weather if user already registered so can't add again.  
    $check_subject_query="select * from subject_tbl WHERE subject_code='$subject_code'";  
    $run_query=mysqli_query($con,$check_subject_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
//echo "<script>alert('Email $subject_code is already existing in our database, Please try another one!')</script>";  
		$message = "Some Data exist already.\\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo"<script>window.open('admin.php','_self')</script>";
exit();  
    }  
//insert the user into the database.  
    $insert_user="insert into subject_tbl (subject_code,subject_description,unit,lecture,laboratory) VALUES ('$subject_code','$subject_description','$unit','$lecture','$laboratory')";  
    if(mysqli_query($con,$insert_user))  
    {  
        echo"<script>window.open('admin.php','_self')</script>";
		
    }  
   
}  
  
?>         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!--Modal for Adding Users ends-->
  <!-- Modal for Adding Subjects starts-->
  <div class="modal fade" id="roomModal" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Room Form</h4>
        </div>
			<div class="panel-body">  
                    <form role="form" method="post" action="">  
                       <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Room" name="room" type="text" autofocus required/>  
                            </div> 
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Add Room" name="add_room" >  
  
                        </fieldset>  
                    </form>   
                </div> 
<?php  
  
include("db_connect.php"); //make connection here  

if(isset($_POST['add_room']))  
{    
   
    $room=$_POST['room'];//same   

    if($room=='')  
    {  
        echo"<script>alert('Please enter the subject_code')</script>";  
    exit();  
    } 
   
  	
//here query check weather if user already registered so can't add again.  
    $check_room_query="select * from room_tbl WHERE room='$room'";  
    $run_query=mysqli_query($con,$check_room_query);  
  
    if(mysqli_num_rows($run_query)>0)  
    {  
		$message = "Some Data exist already.\\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo"<script>window.open('admin.php','_self')</script>";  
exit();  
    }  
//insert the user into the database.  
    $insert_user="insert into room_tbl (room) VALUE ('$room')";  
    if(mysqli_query($con,$insert_user))  
    {  
        echo"<script>window.open('admin.php','_self')</script>";  
    }
}  
  
?>         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!--Modal for Adding Users ends-->
    <!-- Modal for Adding Time starts-->
  <div class="modal fade" id="timeModal" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Time Form</h4>
        </div>
			<div class="panel-body">  
                    <form role="form" method="post" action="">  
                       <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Time" name="class_time" type="text" autofocus required/>  
                            </div> 
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Add Time" name="add_time" >  
  
                        </fieldset>  
                    </form>   
                </div> 
<?php  

include("db_connect.php"); //make connection here  

if(isset($_POST['add_time']))  
{    
   
    $class_time=$_POST['class_time'];//same   

    if($class_time=='')  
    {  
        echo"<script>alert('Please enter the subject_code')</script>";  
    exit();  
    } 
   
  	
//here query check weather if user already registered so can't add again.  
    $check_room_query="select * from time_tbl WHERE class_time='$class_time'";  
    $run_query=mysqli_query($con,$check_room_query);  
    if(mysqli_num_rows($run_query)>0)  
    {  
		$message = "Some Data exist already.\\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo"<script>window.open('admin.php','_self')</script>";   
exit();  
    }  
//insert the user into the database.  
    $insert_user="insert into time_tbl (class_time) VALUE ('$class_time')";  
    if(mysqli_query($con,$insert_user))  
    {  
        echo"<script>window.open('admin.php','_self')</script>";  
    }
}  
  
?>         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
    <div class="modal fade" id="dayModal" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Day Form</h4>
        </div>
			<div class="panel-body">  
                    <form role="form" method="post" action="">  
                       <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Day/s" name="assigned_day" type="text" autofocus required/>  
                            </div> 
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Add Day" name="add_day" >  
  
                        </fieldset>  
                    </form>   
                </div> 
<?php  

include("db_connect.php"); //make connection here  

if(isset($_POST['add_day']))  
{    
   
    $assigned_day=$_POST['assigned_day'];//same   
    if($assigned_day=='')  
    {  
        echo"<script>alert('Please enter the assigned')</script>";  
    exit();  
    } 
   
  	
//here query check weather if user already registered so can't add again.  
    $check_day_query="select assigned_day from day_tbl WHERE assigned_day='$assigned_day'";  
    $run_query=mysqli_query($con,$check_day_query);  
    if(mysqli_num_rows($run_query)>0)  
    {  
		$message = "Some Data exist already.\\nTry again.";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo"<script>window.open('admin.php','_self')</script>";  
exit();  
    }  
//insert the user into the database.  
    $insert_user="insert into day_tbl (assigned_day) VALUE ('$assigned_day')";  
    if(mysqli_query($con,$insert_user))  
    {  
        echo"<script>window.open('admin.php','_self')</script>";  
    }
}  
  
?>         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
  <!--Modal for Adding Users ends-->
    <div class="modal fade" id="signatoryModal" role="dialog">
  <div class="modal-dialog">
  <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Add Signatory Form</h4>
        </div>
			<div class="panel-body">  
                    <form role="form" method="post" action="">  
                       <fieldset>  
                            <div class="form-group">  
                                <input class="form-control" placeholder="Fullname" name="sname" type="text" autofocus required/>  
                            </div>
							<div class="form-group">  
                                <input class="form-control" placeholder="Designation" name="sdesignation" type="text" autofocus required/>  
                            </div>
                            <input class="btn btn-lg btn-success btn-block" type="submit" value="Add Signatory" name="add_signatory" >  
                        </fieldset>  
                    </form>   
                </div> 
<?php  

include("db_connect.php"); //make connection here  

if(isset($_POST['add_signatory']))  
{    
   
    $sname=$_POST['sname'];//same
	$sdesignation=$_POST['sdesignation'];//same     

    if($sname=='')  
    {  
        echo"<script>alert('Please enter the Name')</script>";  
    exit();  
    } 
    if($sdesignation=='')  
    {  
        echo"<script>alert('Please enter the Designation')</script>";  
    exit();  
    } 
  	
//here query check weather if user already registered so can't add again.  
    $check_room_query="select * from signatory_tbl WHERE sname='$sname'";  
    $run_query=mysqli_query($con,$check_room_query);  
    if(mysqli_num_rows($run_query)>0)  
    {  
echo "<script>alert('The $sname is already existing in our database, Please try another one!')</script>";  
exit();  
    }  
//insert the user into the database.  
    $insert_user="insert into signatory_tbl (sname,sdesignation) VALUE ('$sname','$sdesignation')";  
    if(mysqli_query($con,$insert_user))  
    {  
        echo"<script>window.open('admin.php','_self')</script>";  
    }
}  
  
?>         <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
      
    </div>
  </div>
<div class="">
<?php include("header.php");?>
<span style="font-size:30px;cursor:pointer" onclick="openNav()">&#9776;</span>
<?php include("table_faculty.php");?>
<?php include("subject_table.php");?>
<div class="row">
<div class="container">
<div class="col-sm-4">
<button class="dd_collapsible">Time</button>
<div class="panel">
<?php include("time_tbl.php");?>
</div>
</div>
<div class="col-sm-4">
<button class="dd_collapsible">Days</button>
<div class="panel">
<?php include("tbl_day.php");?>
</div>
</div>
<div class="col-sm-4" id="">
  <button type="button" class="dd_collapsible">Signatory</button>
  <div class="panel">
<?php include("signatory_tbl.php");?>
</div>
</div>
</div>
</div>
</div>
<div><?php include("footer.php");?></div>
</body>
</html>
<script>
function openNav() {
    document.getElementById("mySidenav").style.width = "250px";
    document.getElementById("main").style.marginLeft = "250px";
}

function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    document.getElementById("main").style.marginLeft= "0";
}
</script>
<script>
var acc = document.getElementsByClassName("dd_collapsible");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight){
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>
     