<div class="bordered_div">
<div class="table-scrol">    
<div class="table-responsive"><!--this is used for responsive display in mobile and other devices-->  
	<table class="table table-bordered table-hover table-striped" style="table-layout: fixed">  
        <thead>  
        <tr>  
            <th>User E-mail</th> 
            <th>Operation</th>  
        </tr>  
        </thead>  
        <?php  
        include("db_connect.php");  
        $view_users_query="select * from users";//select query for viewing users.  
        $run=mysqli_query($con,$view_users_query);//here run the sql query.  
        while($row=mysqli_fetch_array($run))//while look to fetch the result and store in a array $row.  
        {   
            $user_email=$row[1];     
        ?>  
        <tr>  
<!--here showing results in the table -->   
            <td><?php echo $user_email;  ?></td>
            <td><button class="btn btn-danger" href="#" data-toggle="modal" data-target="#edituserModal">Edit</button>
			<a href="delete_user.php?delete=<?php echo $user_email ?>"><button class="btn btn-danger">Delete</button></a></td> <!--btn btn-danger is a bootstrap button to show danger-->  
        </tr>  
        <?php } ?>  
  
    </table>  
        </div>  
</div>
</div>