<?php   
include("db_connect.php");  
$delete_id=$_GET['del'];  
$delete_query="delete  from schedule_tbl  WHERE ID='$delete_id'";//delete query  
$run=mysqli_query($con,$delete_query);  
if($run)  
{  
//javascript function to open in the same window
    echo "<script>window.open('create_schedule.php?deleted=user has been deleted','_self')</script>";  
}  
?> 
