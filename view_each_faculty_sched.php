
<html>  
<head>  
  <title>Class Scheduling System</title>
  <title>OCSS</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css/font-awesome.css">
  <link type="text/css" rel="stylesheet" href="css/style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script>
</head>  
  
<body>  
<?php include('header.php');?><span></span>

<div class="top-ys">
<span id="lblschyear">
School Year
</span>
<input type="text" class="schyear" id="schyear" size="11" placeholder="Eg. 2017-2018">
</div>
<div class="dsem">
<span id="lblsem">
Semester
</span>
<span> 
<select class="schsem">
<option>First</option>
<option>Second</option>
<option>Summer</option>
</select></span>
</div>
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
	$ID=$_GET['fname'];
	$con = mysqli_connect('localhost', 'root', '', 'pup_ocss');// connection
	$query = "SELECT * from schedule_tbl WHERE fname = '$ID'";
	// declare and execute the query
	$sql = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($sql)) {
		$ID=$row[0];
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
<div class="signatory-right">
<p class="upper-text">Prepared by:</p>
					<div class="cboxsname"><select id="ddsname" name="ddsname" class="">
					<option value="">Select Scheduler's Name</option>
					<?php
					include("db_connect.php");
					$cdquery="SELECT sname FROM signatory_tbl";
					$cdresult=mysqli_query($con,$cdquery);
					while ($cdrow=mysqli_fetch_array($cdresult)) {
					echo "<option>".$cdrow['sname']."</option>";
					}	
					?>
					</select>
					</div>
			
					<div class="cboxsdesignation">
					<select id="ddsdesignation" name="ddsdesignation" class="">
					<option value="">Select Designation</option>
					<?php
					include("db_connect.php");
					$cdquery="SELECT sdesignation FROM signatory_tbl";
					$cdresult=mysqli_query($con,$cdquery);
					while ($cdrow=mysqli_fetch_array($cdresult)) {
					echo "<option>".$cdrow['sdesignation']."</option>";
					}	
					?>
					</select>
					</div>
</div>
<div class="signatory-left">
<p class="upper-text">Noted by:</p>
					<div class="cboxsname">
					<select id="ddhname" name="ddhname" class="">
					<option value="">Select Director's Name</option>
					<?php
					include("db_connect.php");
					$cdquery="SELECT sname FROM signatory_tbl";
					$cdresult=mysqli_query($con,$cdquery);
					while ($cdrow=mysqli_fetch_array($cdresult)) {
					echo "<option>".$cdrow['sname']."</option>";
					}	
					?>
					</select>
					</div>
			
					<div class="cboxsdesignation">
					<select id="ddhdesignation" name="ddhdesignation" class="">
					<option value="">Select Designation</option>
					<?php
					include("db_connect.php");
					$cdquery="SELECT sdesignation FROM signatory_tbl";
					$cdresult=mysqli_query($con,$cdquery);
					while ($cdrow=mysqli_fetch_array($cdresult)) {
					echo "<option>".$cdrow['sdesignation']."</option>";
					}	
					?>
					</select>
					</div>
<!--<p>Dr. Edwin G. Malabuyoc</p>
<p>Director and Head, Academic Programs</p>-->
</div>
<div class="print_btn"><button class="btn btn-info" onClick="myFunction()" style="width: 85px; height: 35px;"><i class="fa fa-print" aria-hidden="true"></i> Print</button></div>

<script>
function myFunction() {
    window.print();
}
</script>
<style>
.cboxsdesignation {
    padding-top: 0px;
	-webkit-appearance: none;
    -moz-appearance: none;
    text-indent: 1px;
    text-overflow: '';
}
.top-ys, .dsem {
    display: inline-block;
}
.dsem{
	padding-left:20px;
}
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
	input#schyear {
    border: none;
}
select.schsem,select#ddsname,select#ddsdesignation,select#ddhdesignation,select#ddhname {
    -webkit-appearance: none;
    -moz-appearance: none;
    text-indent: 1px;
    text-overflow: '';
	border: none;
}	
.bordered_div{
	padding-top:20px;
}
}
cboxsdesignation {
    padding-top: 0px;
}
</style>	
<?php include('footer.php');?>
</body>
</html>