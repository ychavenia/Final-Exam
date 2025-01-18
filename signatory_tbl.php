<div class="table-scrol">    
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
	<table class="table table-bordered table-hover" style="table-layout: fixed">
        <thead>  
        <tr>  
            <th>Signatory Name</th>
			<th>Designation</th>
			<th>Action</th> 			
        </tr>  
        </thead>  
        <?php  
        include("db_connect.php");  
        $view_day_query="select * from signatory_tbl";//select query for viewing users.  
        $run=mysqli_query($con,$view_day_query);//here run the sql query.  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {   
			$id=$row[0];
            $sname=$row[1];
			$sdesignation=$row[2]; 
        ?>  
        <tr>  
<!--here showing results in the table -->   
            <td><?php echo $sname;?></td>
			<td><?php echo $sdesignation;?></td>  
            <td>
			<!--<a href="edit_signatory.php?id=<?php //echo $id?>"><button class="btn btn-warning"><i class="fa fa-pencil"> </i> Edit</button></a>-->
			<a href="delete_time.php?remove=<?php echo $sname ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
        </tr>  
  
        <?php } ?>  
  
    </table>  
        </div>  
</div>
