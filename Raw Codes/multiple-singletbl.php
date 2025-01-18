<?php
ini_set('display_errors', 0);
include 'connection/db_connection.php';
$memberid=$_POST['memberid'];
$query=mysql_query("INSERT INTO existing_member (member_id,member_name,dob,gender,address,city,state,phone,email,height,weight,bmi,bp,medical,image_path,joining_date)
 SELECT member_id,member_name,dob,gender,address,city,state,phone,email,height,weight,bmi,bp,medical,image_path,joining_date FROM member_registration
 WHERE member_id='".$memberid."'" ); 

 /*
$query2=mysql_query("INSERT INTO existing_member (membership_type) SELECT membership_type  FROM membership_details
WHERE member_id='".$memberid."'"); */

 $query2=mysql_query("INSERT INTO existing_member (membership_type)
SELECT a.membership_type as membership_type FROM membership_details a
INNER JOIN member_registration c ON c.member_id = a.member_id, c.member_name=a.member_name
where a.member_id='".$memberid."'");

if($query2)
{ 
    //$sql=mysql_query("DELETE FROM member_registration WHERE member_id='".$memberid."'");
    //$sql1=mysql_query("delete from membership_details where member_id='".$memberid."'");

    echo "<script>
                alert('Data Deleted Successfully');
                window.location.href='close_member.php';
                </script>"; 
} 
else
{
echo "User Data Already Exist";
}