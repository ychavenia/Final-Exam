<div class="table-scrol">    
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
	<table class="table table-bordered table-hover" style="table-layout:auto">
        <thead>  
        <tr>  
            <th>Employee Number</th>  
            <th>Faculty Name</th>
			 <th>Date Hired</th>
			  <th>Status</th>
			   <th>Background</th>
			    <th>Address</th>
			  <th>Contact Number</th>
			  <th>Email Address</th>
            <th>Action</th>  
        </tr>  
        </thead>  
        <?php  
        include("db_connect.php");  
        $view_users_query="select * from faculty_tbl order by fname";//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {   
			$ID = $row[0];
            $emp_number=$row[1];  
            $fname=$row[2];
			$date_hired=$row[3];
			$status=$row[4];
			$background_field=$row[5];
			$address=$row[6];
			$contact_no=$row[7];
			$user_email=$row[8];
        ?>  
        <tr>  
<!--here showing results in the table -->   
            <td><?php echo $emp_number;  ?></td>  
            <td><?php echo $fname;  ?></td>
			<td><?php echo $date_hired;  ?></td> 
			<td><?php echo $status;  ?></td> 
			<td><?php echo $background_field;  ?></td>
			<td><?php echo $address;  ?></td> 
			<td><?php echo $contact_no;?></td>
			<td><?php echo $user_email;?></td>
			<td>
			<a href="view_each_faculty_sched.php?fname=<?php echo $fname?>">
				<button class="btn btn-warning"><i class="fa fa-eye" aria-hidden="true"></i></button>
			</a>
			<a href="edit_faculty.php?ID=<?php echo $ID?>">
				<button class="btn btn-warning" id="gbtn"><i class="fa fa-pencil"> </i></button>
			</a>
            <a class="links" href="delete_faculty.php?remove=<?php echo $emp_number ?>">
				<button class="btn btn-success"><i class="fa fa-trash-o"></i></button>
			</a></td>
			<!--<td><a href="#" data-toggle="modal" data-target="#deletefacultyModal">Delete</a></td>-->
			<!--btn btn-danger is a bootstrap button to show danger-->  
        </tr>  
        <?php } ?>  
    </table>  
        </div>
    </div>
