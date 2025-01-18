<html>  
<head>  
  <title>Class Scheduling System</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link type="text/css" rel="stylesheet" href="css\bootstrap.min.css">
  <link type="text/css" rel="stylesheet" href="css\font-awesome.css">
  <link type="text/css" rel="stylesheet" href="style.css">
  <script src="script/jquery-3.1.1.min.js"></script>
  <script src="script/bootstrap.min.js"></script> 
</head>  
  
<body>  
<div class="table-scrol">    
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
	<table class="table table-bordered table-hover" style="table-layout: fixed">
        <thead>  
        <tr>    
            <th>Course Description</th>
			<th>Day/s</th>
			<th>Time</th>
			<th>Room</th>
			<th>Professor</th>
            <th id="action">Actions</th>  
			
        </tr>  
        </thead>  
        <?php  
        include("db_connect.php");  
        $view_schedule_query="select * from schedule_tbl order by fname ";//select query for viewing users.  
        $run=mysqli_query($con,$view_schedule_query);//here run the sql query.  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        { 	$ID=$row[0];
            $subject_description=$row[1];
			$sched_day=$row[2];
			$time_description=$row[3];
			$room_description=$row[4];
			$fname=$row[5];
        ?>  
        <tr>  
<!--here showing results in the table -->    
            <td><?php echo $subject_description;?></td>  
			<td><?php echo $sched_day; ?></td>
			<td><?php echo $time_description;?></td>
			<td><?php echo $room_description;?></td>
			<td><?php echo $fname;?></td>
			<input type="hidden" value="<?php $ID ?>"/>
            <td id ="action_sub">
			<a href="edit_schedule.php?ID=<?php echo $ID?>"><button class="btn btn-warning"><i class="fa fa-pencil"> </i> Edit</button></a>
			<a class="links" href="delete_schedule.php?del=<?php echo $ID ?>"><button class="btn btn-success"><i class="fa fa-trash-o"></i> Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
        </tr>  
  
        <?php } ?>  
  
    </table>  
        </div>  
</div>
</body>
</html>
