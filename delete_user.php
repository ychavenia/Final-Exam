<?php   
include("db_connect.php");  
$delete_email=$_GET['delete'];  
$delete_delete="delete  from users WHERE user_email='$delete_email'";//delete query  
$run=mysqli_query($con,$delete_delete);  
if($run)  
{  
//javascript function to open in the same window
    echo "<script>window.open('admin.php?deleted=user has been deleted','_self')</script>";  
}  
?> 
