<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="pup_ocss";
$con=mysqli_connect("$servername","$username","","$dbname"); // This is to connect the form to the database
mysqli_select_db($con,"$dbname"); // $link is a variable used in the program, assigned to mysqli_connect

// Create connection
$con= mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "<p>Connection is OK</p>";

?>