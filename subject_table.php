<div class="table-scrol">    
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
	<table class="table table-bordered table-hover" style="table-layout: auto">
        <thead>  
        <tr>  
            <th>Subject Code</th>  
            <th>Subject Description</th>
			<th>Unit</th>
			 <th>Lecture</th>
			  <th>Lab</th>
            <th>Delete Subject</th>  
        </tr>  
        </thead>  
        <?php  
        include("db_connect.php");  
        $view_users_query="select * from subject_tbl order by subject_code";//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {   
			
            
			$ID=$row[0];
			$subject_code=$row[1];
            $subject_description=$row[2];
			$unit=$row[3];
			$lecture=$row[4];
			$laboratory=$row[5];
        ?>  
        <tr>  
<!--here showing results in the table -->   
            <td><?php echo $subject_code;?></td>  
            <td><?php echo $subject_description;  ?></td>  
			<td><?php echo $unit;  ?></td>
			<td><?php echo $lecture;  ?></td>
			<td><?php echo $laboratory;  ?></td> 
            <td><a href="edit_subject.php?ID=<?php echo $ID?>"><button class="btn btn-warning"><i class="fa fa-pencil"> </i> Edit</button></a>
            <a class="links" href="delete_subject.php?del=<?php echo $ID?>"><button class="btn btn-success"><i class="fa fa-trash-o"></i> Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
        </tr>
        <?php } ?>  
  
    </table>  
        </div>  
</div>