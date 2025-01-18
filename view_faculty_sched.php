<?php//session variable declare to variable $ID
	$ID = $_SESSION['ID'];
	// connection
	$con = mysqli_connect('localhost', 'root', '', 'pup_ocss');

	// query
	$query = "SELECT * from schedule_tbl WHERE ID = $ID";

	// declare and execute the query
	$sql = mysqli_query($con, $query);
	while ($row = mysqli_fetch_array($sql)) {
		$fname = $row['fname'];
		// Display username from database
		
		echo $fname;
		
	}
	<?