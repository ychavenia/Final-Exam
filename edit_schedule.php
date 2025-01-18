<?php
// including the database connection file
include_once("db_connect.php");?>
<?php
//getting ID from url
$ID = $_GET['ID'];
//selecting data associated with this particular ID
$result = mysqli_query($con, "SELECT * FROM schedule_tbl WHERE ID='$ID'");
while($res = mysqli_fetch_array($result))
{	
	$ID=$res['ID'];
    $subject = $res['subject'];
    $days= $res['days'];
	$time = $res['time'];
	$room = $res['room'];
	$fname=$res['fname'];
}
?>
<html>
<head>    
    <title>Edit Data</title>
	<title>OCSS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css\bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script>
<style>  
    .row {  
     margin-top: 0px;  
	}
	 input.btn.btn-lg.btn-success.btn-block:focus {
    background: maroon;
}
  
</style> 
</head>
 
<body>
 <div class="row">
 <div class="col-md-4 col-md-offset-4">  
    <form name="form1" method="post" action="edit_schedule.php">
<div class="cont_edit">
<div class="form-group">
  <label for="usr">Course Description:</label>
  <input type="text" class="form-control" id="usr" name="subject" value="<?php echo $subject;?>"required>
</div>
<div class="form-group">
  <label for="usr">Day/s:</label>
  <input type="text" class="form-control" id="usr" name="days" value="<?php echo $days;?>"required>
</div>
<div class="form-group">
  <label for="usr">Time:</label>
  <input type="text" class="form-control" id="usr" name="time" value="<?php echo $time;?>"required>
</div>
<div class="form-group">
  <label for="usr">Room:</label>
  <input type="text" class="form-control" id="usr" name="room" value="<?php echo $room;?>"required>
</div>
<div class="form-group">
  <label for="usr">Professor:</label>
  <input type="text" class="form-control" id="usr" name="fname" value="<?php echo $fname;?>"required>
</div>

                <input type="hidden" name="ID" value="<?php echo $_GET['ID'];?>">
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Update" name="update" >
		<?php
if(isset($_POST['update']))
{    
    $ID = $_POST['ID'];
    $subject=$_POST['subject'];
    $days=$_POST['days'];    
    $time=$_POST['time'];
	$room=$_POST['room'];
	$fname=$_POST['fname'];
	
    // checking empty fields
    if(empty($subject) || empty($days) || empty($time)|| empty($room)|| empty($fname)){            
        if(empty($subject)) {
            echo"<script>alert('Please enter the subject')</script>";
        }
		if(empty($days)) {
            echo"<script>alert('Please enter the schedule day')</script>";
        }
        
        if(empty($time)) {
            echo"<script>alert('Please enter the time')</script>";
        } 
		if(empty($room)) {
            echo"<script>alert('Please enter the room')</script>";
        }
		if(empty($fname)) {
            echo"<script>alert('Please enter the fname')</script>";
        }
		
    } else {
        //updating the table
        $result = mysqli_query($con, "UPDATE schedule_tbl SET subject='$subject',days='$days',time='$time',room='$room',fname='$fname' WHERE ID=$ID");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: create_schedule.php");
    }
}
?>
</div>
</form>
</div>
</div>
</body>
</html>