<div class="table-scrol">    
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
	<table class="table table-bordered table-hover" style="table-layout: fixed">
        <thead>  
        <tr>  
            <th>Time of Classes</th>
			<th>Action</th> 
        </tr>  
        </thead>  
        <?php  
        include("db_connect.php");  
        $view_day_query="select * from time_tbl";//select query for viewing users.  
        $run=mysqli_query($con,$view_day_query);//here run the sql query.  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {   
            $class_time=$row[1];  
        ?>  
        <tr>  
<!--here showing results in the table -->   
            <td><?php echo $class_time;?></td>  
            <td><a href="delete_time.php?remove=<?php echo $class_time ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
        </tr>  
  
        <?php } ?>  
  
    </table>  
        </div>  
</div>
