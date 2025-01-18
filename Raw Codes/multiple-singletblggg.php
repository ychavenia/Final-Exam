$result_1 = mysql_query("SELECT info_id FROM info WHERE info_name = '$_POST[name]'");    
$row1 = mysql_fetch_row($result_1);
$infoid = $row1[0];
$result_2 = mysql_query("SELECT image_id FROM image WHERE image_name = '$_FILES[file][name]'"); 
$row2 = mysql_fetch_row($result_2);
$imageid = $row2[0]

$sql = "INSERT INTO id_table (main_id, id_info, id_image) VALUES (NULL, $infoid, $imageid);"; 
if(!mysql_query($sql,$connect_database)){    die('Error: ',mysql_error()); } 