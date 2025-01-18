<?php
// including the database connection file
include_once("db_connect.php");?>
<?php
//getting ID from url
$ID = $_GET['ID'];
 
//selecting data associated with this particular ID
$result = mysqli_query($con, "SELECT * FROM subject_tbl WHERE ID=$ID");
while($res = mysqli_fetch_array($result))
{	
	$ID=$res['ID'];
    $subject_code = $res['subject_code'];
    $subject_description = $res['subject_description'];
    $unit= $res['unit'];
	$lecture = $res['lecture'];
	$laboratory = $res['laboratory'];
	
	
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
    <form name="form1" method="post" action="edit_subject.php">
<div class="cont_edit">
<div class="form-group">
  <label for="usr">Subject Code:</label>
  <input type="text" class="form-control" id="usr" name="subject_code" value="<?php echo $subject_code;?>" required>
</div>
<div class="form-group">
  <label for="usr">Subject Description:</label>
  <input type="text" class="form-control" id="usr" name="subject_description" value="<?php echo $subject_description;?>"required>
</div>
<div class="form-group">
  <label for="usr">Unit:</label>
  <input type="text" class="form-control" id="usr" name="unit" value="<?php echo $unit;?>"required>
</div>
<div class="form-group">
  <label for="usr">Lecture:</label>
  <input type="text" class="form-control" id="usr" name="lecture" value="<?php echo $lecture;?>"required>
</div>
<div class="form-group">
  <label for="usr">Laboratory:</label>
  <input type="text" class="form-control" id="usr" name="laboratory" value="<?php echo $laboratory;?>"required>
</div>

                <input type="hidden" name="ID" value="<?php echo $_GET['ID'];?>">
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Update" name="update" >
		<?php
if(isset($_POST['update']))
{    
    $ID = $_POST['ID'];
    $subject_code=$_POST['subject_code'];
    $subject_description=$_POST['subject_description'];
    $unit=$_POST['unit'];    
    $lecture=$_POST['lecture'];
	$laboratory=$_POST['laboratory'];
	
    // checking empty fields
    if(empty($subject_code) || empty($subject_description) || empty($unit) || empty($lecture)|| empty($laboratory)){            
		if(empty($subject_code)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        }
        
        if(empty($subject_description)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        }
		if(empty($unit)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        }
        
        if(empty($lecture)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        } 
		if(empty($laboratory)) {
            echo"<script>alert('Please enter the subject_code')</script>";
        }
		
    } else {
        //updating the table
        $result = mysqli_query($con, "UPDATE subject_tbl SET subject_code='$subject_code',subject_description='$subject_description',unit='$unit',lecture='$lecture',laboratory='$laboratory' WHERE ID=$ID");
        
        //redirectig to the display page. In our case, it is index.php
        header("Location: admin.php");
    }
}
?>
</div>
</form>
</div>
</div>
</body>
</html>