<?php   
include("db_connect.php");
if(isset($_POST['add_schedule']))
{    

    $faculty=$_POST['faculty'];//same  
	$subject_description=$_POST['subject_description'];//same  
	$room_description=$_POST['room_description'];
	$time_description=$_POST['time_description'];
	$day_description=implode (',',$_POST['time_description']);
	//$day_description = $_POST['day_description'];
	
	
	//$day_description =$_POST['day_description'];
	//$day_description=$_POST['day_description'];
    /*if(empty($faculty) || empty($subject_description) || empty($room_description)|| empty($time_description)) {                
        if(empty($faculty)) {
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
	if($faculty==''){
		echo"<script>alert('Please enter the Subject')</script>";
		exit();
	}
	if($subject_description=='')  
    {  
        echo"<script>alert('Please enter the Subject')</script>";
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
			//$check_sched_query="select * from schedule_tbl WHERE EXISTS ( SELECT faculty,room,time from schedule_tbl where faculty='$faculty'||room = '$room_description'&&time='$time_description'";
			
			$check_sched_query = "select * from schedule_tbl WHERE room = '$room_description' AND time='$time_description' AND days='$day_description'";
			$run_query = mysqli_query($con,$check_sched_query);  
			if(mysqli_num_rows($run_query)>0)  {  
			
				echo "<script>alert('$faculty, $room_description, $time_description $day_description has conflicts, Please try another one!')</script>";
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
			
			$insert_user="insert into schedule_tbl (faculty,subject,room,time,days) VALUES ('$faculty','$subject_description','$room_description','$time_description','".$day_description."')"; 			
			if(mysqli_query($con,$insert_user)) 
			{  
				echo "<script>window.open('create_schedule.php','_self')</script>";  
			}
	}  
?>
 <script>((document.getElementById("mon").checked == false)
      && (document.getElementById("tue").checked == false)
      && (document.getElementById("wed").checked == false)
      && (document.getElementById("thurs").checked == false)
      && (document.getElementById("fri").checked == false)
      && (document.getElementById("sat").checked == false)
     { 
    alert("Please check any one method"); 
	 isValid = false;}
	 return isValid;
</script>