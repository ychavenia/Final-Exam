<?php
//including the database connection file
include_once("db_connect.php");
 
//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY ID DESC"); // mysql_query is deprecated
$result = mysqli_query($con, "SELECT * FROM faculty_tbl ORDER BY ID DESC"); // using mysqli_query instead
?>
 
<html>
<head>    
    <title>OCSS</title>
</head>
 
<body>
<
    <table class="table table-bordered table-hover" style="table-layout:auto">
        <tr>
            <td>Employee Number</td>
            <td>Name</td>
            <td>Date Hired</td>
			<td>Status</td>
            <td>Background</td>
			<td>Address</td>
            <td>Contact Number</td>
            <td>Email</td>
            <td>Action</td>
        </tr>
        <?php 
        //while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
        while($res = mysqli_fetch_array($result)) {         
            echo "<tr>";
            echo "<td>".$res['emp_number']."</td>";
            echo "<td>".$res['fname']."</td>";
            echo "<td>".$res['date_hired']."</td>";
			echo "<td>".$res['status']."</td>";
			echo "<td>".$res['background_field']."</td>";
			echo "<td>".$res['address']."</td>";
			echo "<td>".$res['contact_no']."</td>";
			echo "<td>".$res['user_email']."</td>";
			 echo "<td><a href=\"edit.php?ID=$res[ID]\">Edit</a> | <a href=\"delete.php?ID=$res[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
                 
        }
        ?>
    </table>
</body>
</html>