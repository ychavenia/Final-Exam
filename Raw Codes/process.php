<?php
	
	$user_email = $_POST['user_email'];
	$user_pass = $_POST['user_pass'];

	// for example this array is the database
	//$db = array('ID' => 1, 'user_email' => '$user_email', 'Suser_pass' => '$user_pass');

	// connection
	$con = mysqli_connect('localhost', 'root', '', 'pup_ocss');

	// query
	$query = "SELECT * from faculty_tbl WHERE user_email = '$user_email' AND  user_pass = md5('$user_pass')";

	// declare and execute the query
	$sql = mysqli_query($con, $query);

	if (mysqli_num_rows($sql)) {
		while ($row = mysqli_fetch_array($sql)) {
			session_start();
			$_SESSION['ID'] = $row['emp_number'];
			header('Location: home.php');
		}
	} else {
		echo 'wrong user_email or user_pass';
	}

	
?>