<html>  
<head>  
  <title>Class Scheduling System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css\bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css\font-awesome.css">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script> 
</head>  
  
<body>  
<?php include("header.php");?><span></span>
<?php include("header_sub.php");?><span></span>
<?php
	session_start();
	$ID = $_SESSION['ID'];
	?>
	<div class="bordered_div">
<div class="table-scrol">    
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
	<table class="table table-bordered table-hover" style="table-layout: fixed">  
        <thead>  
        <tr>  
         <th>Subject</th> 
         <th>Days</th>
		 <th>Time</th>
		<th>Room</th>
		<th>Faculty</th>
        </tr>  
        </thead> 
	<?php
	$con = mysqli_connect('localhost', 'root', '', 'pup_ocss');// connection
	$query = "SELECT * from schedule_tbl WHERE fname = '$ID'";
	// declare and execute the query
	$sql = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($sql)) {
		$subject = $row[1];
		$days = $row[2];
		$time = $row[3];
		$room = $row[4];
		$fname=$row[5];
		?>
	<tr>  
<!--here showing results in the table -->   
            <td><?php echo $subject; ?></td>
			<td><?php echo $days; ?></td>
			<td><?php echo $time; ?></td>
			<td><?php echo $room; ?></td>
			<td><?php echo $fname; ?></td>
        </tr>  
        <?php } ?>  
  
    </table>  
        </div>  
</div>
</div>

<script>
function myFunction() {
    window.print();
}
</script>
<style>
.print_btn {
    text-align: right;
    padding-right: 20px;
	padding-bottom: 20px;
}
@media print
{    
    .print_btn, .print_btn *
    {
        display: none !important;
    }
.bordered_div{
	padding-top:20px;
}
}
</style>	
<?php include("footer.php");?>
</body>
</html>
