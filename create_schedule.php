<html>  
<head>  
   <title>Create Scheduling</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css\bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script>
<style>
  .panel-body {
    padding: 15px;
    background-color: #fff;
}
div#left-col {
    padding-top: 20px;
	 padding-bottom: 20px;
}

.print_btn {
    text-align: right;
    padding-right: 20px;
}
@media print
{    
		.panel-body,th#action {
			display: none !important;
}
td#action_sub{
	display: none !important;
}
}
</style>
</head>  
  
<body>
<?php include("header.php");?><span></span>
<div class="container-fluid">
<div class="col-sm-3" id="left-col">  
<div class="panel-body">  
                 <form role="form" method="post" action="">  
                  <fieldset> 
					<div class="form-group">
					<span>Course Description:</span>
					<select id="subject_description" name="subject_description" class="form-control"> 
					<option value="">Select</option>
					<?php
					include("db_connect.php");
					$cdquery="SELECT subject_description FROM subject_tbl";
					$cdresult=mysqli_query($con,$cdquery);
					while ($cdrow=mysqli_fetch_array($cdresult)) {
					// $subject_desc=$cdrow["subject_description"];
					echo "<option>".$cdrow['subject_description']."</option>";
					}	
					?>
					<?php echo $cdrow['subject_description'];?>"><?php echo $cdrow['subject_description'];?>
					</select>	
					</div><!--The select tag of Subject code ends-->
					<div class="form-group">
					<span>Day/s:</span>
					<select id="day_description" name="day_description" class="form-control">
					<option value="">Select</option>
					<?php
					include("db_connect.php");
					$cdquery="SELECT assigned_day FROM day_tbl";
					$cdresult=mysqli_query($con,$cdquery);
					while ($cdrow=mysqli_fetch_array($cdresult)) {
					//$time_desc=$cdrow["class_time"];
					//echo "<option value=".$time_desc.">$time_desc</option>";
					echo "<option>".$cdrow['assigned_day']."</option>";
					}	
					?>
					</select>
					</div>
					<div class="form-group">
					<span>Time:</span>
					<select id="time_description" name="time_description" class="form-control">
					<option value="">Select</option>
					<?php
					include("db_connect.php");
					$cdquery="SELECT class_time FROM time_tbl";
					$cdresult=mysqli_query($con,$cdquery);
					while ($cdrow=mysqli_fetch_array($cdresult)) {
					//$time_desc=$cdrow["class_time"];
					//echo "<option value=".$time_desc.">$time_desc</option>";
					echo "<option>".$cdrow['class_time']."</option>";
					}	
					?>
					</select>
					</div>
					<div class="form-group">
					<span>Room:</span>
					<select id="room_description" name="room_description" class="form-control">
					<option value="">Select</option>
					<?php
					include("db_connect.php");
					$cdquery="SELECT room FROM room_tbl";
					$cdresult=mysqli_query($con,$cdquery);
					while ($cdrow=mysqli_fetch_array($cdresult)) {
					//$room_desc=$cdrow["room"];
					//echo "<option value=".$room_desc.">$room_desc</option>";
					echo "<option>".$cdrow['room']."</option>";
					}	
					?>
					</select>	
					</div><!--The select tag of Subject code ends-->
					<div class="form-group">
					
					<span>Professor:</span>
					<select id='fname' name='fname' class='form-control'>  
					<option value=''>Select</option>
					<?php
					include("db_connect.php");
					$cdquery="SELECT * FROM faculty_tbl";
					$cdresult=mysqli_query($con,$cdquery);
					while ($cdrow=mysqli_fetch_array($cdresult)) {
					//$lname=$cdrow["lname"];
					$fname=$cdrow["fname"];
					//$comma="  ";
						echo "<option>".$fname."</option>";
					}
					?>
					</select>
					</div><!--This ends the fname-->
					<!--<div class="form-group">
					<span>Employee ID:</span>
					<select id='fname' name='emp_number' class='form-control' onChange='check();'> 
					<option value=''>Select</option>
					<?php
					/* include("db_connect.php");
					$cdquery="SELECT * FROM faculty_tbl";
					$cdresult=mysqli_query($con,$cdquery);
					while ($cdrow=mysqli_fetch_array($cdresult)) {
					$emp_number=$cdrow["emp_number"];
					echo "<option>".$emp_number."</option>";
					//echo'<input type="hidden" name="emp_number" value="'. $cdrow['emp_number'] .'">';
					}	 */
					?>
					</select>
					</div>-->
					<!--The select tag of fname ends-->
					<button class="btn btn-lg btn-success btn-block" type="submit" value="Save" name="add_schedule">
					<i class="fa fa-floppy-o" aria-hidden="true"></i> Save</button>
					<button class="btn btn-lg btn-success btn-block" onClick="myFunction()"><i class="fa fa-print" aria-hidden="true"></i> Print</button>
					</div><!--The select tag of Subject code ends-->
					<!--The select tag of Subject code ends-->
                   </fieldset>  
                   </form>   
     </div> 
<div class="col-sm-9" id="right-col">
<?php include("schedule_tbl.php");?>
</div>
</div>
<?php include("footer.php");?>
</body>  
</html> 
<?php   
include("db_connect.php");
if(isset($_POST['add_schedule']))
{    
	$subject_description=$_POST['subject_description'];//same  
	$day_description = $_POST['day_description'];
	$time_description=$_POST['time_description'];
	$room_description=$_POST['room_description'];
	$fname=$_POST['fname'];//same  
	//$emp_number = $_POST['emp_number'];
	
	
	//$day_description =$_POST['day_description'];
	//$day_description=$_POST['day_description'];
    /*if(empty($fname) || empty($subject_description) || empty($room_description)|| empty($time_description)) {                
        if(empty($fname)) {
            echo"<script>alert('Please enter the Faculty')</script>";
			exit();
        }
        
        if(empty($subject_description)) {
            echo"<script>alert('Please enter the Subject')</script>";
			exit();
        }
        
        if(empty($room_description)) {
            echo"<script>alert('Please enter the Room')</script>";
			exit();
        }
        if(empty($time_description)) {
            echo"<script>alert('Please enter the Time')</script>";
			exit();
        }
        //link to the previous page
        //echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
		echo "<script>window.open('create_schedule.php','_self')</script>";
    } */
	if($fname==''){
		echo"<script>alert('Please enter the fname')</script>";
		exit();
	}
	if($subject_description=='')  
    {  
        echo"<script>alert('Please enter the Subject_deSC')</script>";
		exit();
    }  
	if($room_description=='')
	{
		echo"<script>alert('Please enter the room description')</script>";
		exit();
	}
	if($time_description=='')
	{
		echo"<script>alert('Please enter the time description')</script>";
		exit();
	}	
	/*if($day_description=='')
	{
		echo"<script>alert('Please enter the days')</script>";
		exit();
	}*/
	/*if(empty($day_description)) {
          echo "<font color='red'>Email field is empty.</font><br/>";
        }*/
		//here query check weather if user already registered so can't register again. 	
			//$check_sched_query="select * from schedule_tbl WHERE EXISTS ( SELECT fname,room,time from schedule_tbl where fname='$fname'||room = '$room_description'&&time='$time_description'";
			
			$check_sched_query = "select * from schedule_tbl WHERE room = '$room_description' AND time='$time_description' AND days='$day_description' AND fname = '$fname'";
			$run_query = mysqli_query($con,$check_sched_query);  
			if(mysqli_num_rows($run_query)>0)  {  
			
				echo "<script>alert('$fname, $room_description, $time_description and $day_description has conflicts, Please try another one!')</script>";
				exit();
				 //echo "<script>window.open('create_schedule.php','_self')</script>";
			}
			
				//insert the user into the database.

            /*$s = "insert into new(time) values('$t1')"; 
            $res=mysql_query($s);
                if($res){
                    echo "insert success";
                }else{
                    echo "error in inserting";
                }*/
			
			$insert_user="insert into schedule_tbl (subject,days,time,room,fname) VALUES ('$subject_description','$day_description','$time_description','$room_description','$fname')"; 			
			if(mysqli_query($con,$insert_user)) 
			{  
				echo "<script>window.open('create_schedule.php','_self')</script>";  
			}
	}  
?>
<script>
function myFunction() {
    window.print();
}
</script>
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
     