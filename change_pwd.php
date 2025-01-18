<?php
session_start ();
$ID = $_SESSION['ID'];
if ($ID)
{
//ID is logged in
if (@$_POST['submit'])
{
//check fields
$ID_pass =md5(@$_POST['ID_pass']);
$newuser_pass = md5(@$_POST['newuser_pass']);
$repeatnewuser_pass =md5(@$_POST['repeatnewuser_pass']);
//check user_pass against db
//connect to db
include("db_connect");
$queryget = mysqli_query ("SELECT user_pass FROM faculty_tbl WHERE fname='$ID'")or die ("Query didnt work");
$row = mysqli_fetch_assoc($queryget);
$ID_passdb = $row ['user_pass'];
//check user_passs
if($ID_pass==$ID_passdb)
{
//check the new user_pass
if ($newuser_pass==$repeatnewuser_pass)
{
//succes
//change user_pass in db
$querychange = mysqli_query ("
UPDATE faculty_tbl SET user_pass='$newuser_pass' WHERE fname='$ID'
");
session_destroy();
die ("Your user_pass has been changed.<a href='index.php'>Return </a>to the main page");
}
else 
 die ("New user_pass dont match!");
}
else 
 die("Old user_pass doesnt match!");
}
else
{
echo("
<form action ='change_pwd.php' method='POST'>
 Old user_pass: <input type ='text' name ='ID_pass'><p>
 New user_pass: <input type='user_pass' name='newuser_pass'><br>
 Repeat new user_pass <input type='user_pass' name='repeatnewuser_pass'><p>
 <input type='submit' name='submit' value='Change user_pass'>
</form>
");
}
}
else
   die ("You must be logged in to change your user_pass");
?>