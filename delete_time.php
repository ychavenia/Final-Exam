<?php    
include("db_connect.php");  
$delete_number=$_GET['remove'];  
$delete_remove="delete  from time_tbl WHERE class_time='$delete_number'";//delete query  
$run=mysqli_query($con,$delete_remove);  
if($run)  
{  
//javascript function to open in the same window
    echo "<script>window.open('admin.php?deleted=user has been deleted','_self')</script>";  
}  
  
?>  