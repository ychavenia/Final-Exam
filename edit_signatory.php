<?php
// including the database connection file
include_once("db_connect.php");?>
<?php
//getting id from url
$id = $_GET['id'];
 
//selecting data associated with this particular id
$result = mysqli_query($con, "SELECT * FROM signatory_tbl WHERE id=$id");
while($res = mysqli_fetch_array($result))
{	
	$id=$res['id'];
    $sname = $res['sname'];
    $sdesignation = $res['sdesignation'];
	
	
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
  <label for="usr">Signatory Name:</label>
  <input type="text" class="form-control" id="usr" name="sname" value="<?php echo $sname;?>" required>
</div>
<div class="form-group">
  <label for="usr">Designation:</label>
  <input type="text" class="form-control" id="usr" name="sdesignation" value="<?php echo $sdesignation;?>"required>
</div>

                <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                <input class="btn btn-lg btn-success btn-block" type="submit" value="Update" name="update" >
		<?php
if(isset($_POST['update']))
{    
    $id = $_POST['id'];
    $sname=$_POST['sname'];
    $sdesignation=$_POST['sdesignation'];
	
    // checking empty fields
    if(empty($sname) || empty($sdesignation)){            
		if(empty($sname)) {
            echo"<script>alert('Please enter the sname')</script>";
        }
        
        if(empty($sdesignation)) {
            echo"<script>alert('Please enter the sname')</script>";
        }
		
    } else {
        //updating the table
        $result = mysqli_query($con, "UPDATE signatory_tbl SET sname='$sname',sdesignation='$sdesignation' WHERE id=$id");
        
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