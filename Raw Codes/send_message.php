<!DOCTYPE html>
<html>
<head>
<style>
input[type=text], select, textarea {
    width: 100%;
    padding: 12px;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
    margin-top: 6px;
    margin-bottom: 16px;
    resize: vertical;
}

input[type=submit] {
    background-color: #4CAF50;
    color: white;
    padding: 12px 20px;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

.container {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}
</style>



</head>
<?php
if(isset($_POST['send']))
{

include "smsGateway.php";
$smsGateway = new SmsGateway('jhunelpenaflorida@gmail.com', 'jhunel123');
$number = $_POST['number'];
$message = $_POST['message'];
$deviceID = 64674;
$number = '+63'.$number;
$message = $message;

$result = $smsGateway->sendMessageToNumber($number, $message, $deviceID);
if($result)
{
     echo'<script>';
              echo'alert("MESSAGE SUCCESSFULLY SEND!");';
              echo'window.location.href="admin.php";';
              echo'</script>'; 
}
 
}
?>
<body>



<h3>SEND MESSAGE </h3>

<div class="container">
 <form method="POST">
    <label for="fname">NUMBER:</label>
    <input type="text" id="fname" name="number" placeholder="number..">
 
    <label for="subject">MESSAGE</label>
    <textarea id="subject" name="message" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" name="send" value="SEND MESSAGE">
  </form>
</div>

</body>
</html>
