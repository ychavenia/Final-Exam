<?php session_start(); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<link href="../includes/style_prac2.css" rel="stylesheet" type="text/css" />
<title>Scheduling System</title>
<style type="text/css">
<!--
.style3 {font-family: Georgia, "Times New Roman", Times, serif}
.style20 {font-family: Georgia, "Times New Roman", Times, serif; font-size: x-small; }
.style21 {font-size: x-small}
.style22 {font-family: Geneva, Arial, Helvetica, sans-serif}
.style30 {font-family: "Courier New", Courier, monospace}
.style4 {font-size: 11px;
	font-family: Verdana, Arial, Helvetica, sans-serif;
}
.style2 {font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
}
.style28 {color: #0000FF}
.style5 {	font-family: Verdana, Arial, Helvetica, sans-serif;
	font-weight: bold;
	color: #003399;
}
#error {
	position:absolute;
	left:175px;
	top:221px;
	width:174px;
	height:48px;
	z-index:1;
}
#Layer2 {
	position:absolute;
	left:227px;
	top:275px;
	width:618px;
	height:175px;
	z-index:1;
}
.style31 {font-size: 14px}
.style32 {color: #0F3A6A}
.style33 {
	font-size: 18px;
	font-weight: bold;
}
.style34 {
	font-size: 13px;
	font-weight: bold;
	color: #FF0000;
}
-->
</style>
</head>
<?php
 require ("db-connec.php");
 ?>
  
<?php
   if (isset($_POST['add_schedule'])) 

				
		 	
			$faculty=$_POST['faculty'];//same  
			$subject_description=$_POST['subject_description'];//same  
			$room_description=$_POST['room_description'];
			$time_description=$_POST['time_description'];
			$day_description = $_POST['day_description'];
	

 $result = mysql_query ("SELECT * FROM sched_tbl")or die(mysql_error());
 
if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);

If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
	
			$faculty = MYSQL_RESULT($result,$i,"$subject_description");
			$subject_description = MYSQL_RESULT($result,$i,"subject_description");
			$room_description = MYSQL_RESULT($result,$i,"room_description");
			$time_description = MYSQL_RESULT($result,$i,"subject_description");
			$day_description= MYSQL_RESULT($result,$i,"day_description");
		

			
			if (( $faculty or $room_description or $time_description or $day_description)){
			
			   $result = mysql_query("SELECT `sched`.*, `day`.`day_name`, `course`.`course_yrSec`, `room`.`room_name`,
 `timestart`.`time_s`, `subjects`.`sub_code`,
  `school_yr`.`school_year`, `profile`.`teacher_name` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id having sched_id = '$sched_id'
  			");
			 if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);

If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
	
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$acourse = MYSQL_RESULT($result,$i,"course_yrSec");
			$asubcat = MYSQL_RESULT($result,$i,"sub_code");
			$ateacher = MYSQL_RESULT($result,$i,"teacher_name");
			$aroom = MYSQL_RESULT($result,$i,"room_name");
			$aday = MYSQL_RESULT($result,$i,"day_name");
			$astime = MYSQL_RESULT($result,$i,"time_s");
						
	$i++;	 
			}
			}
			
			$note = "&nbsp;&nbsp;&nbsp;&nbsp;<font face = 'Verdana, Arial, Helvetica, sans-serif', color = '#FF0000' size='2'><i><b>* There is a conflict with the schedule of  $ateacher, $acourse  at $aroom, $aday ,<br>&nbsp;&nbsp;&nbsp;&nbsp;$astime with the subject $asubcat</b></i></font><br><br> ";
			$conflict = true;
			end;
			}
	$i++;	 
			}
			}

if ($conflict != true){
			
			mysql_query ("INSERT INTO sched(course_id, sub_id, teacher_id, room_id, sem_id, year_id, day_id, time_s_id, dept_id)
					VALUES('$faculty', '$hidden_psubcat','$hidden_pt','$hidden_proom','$hidden_psem','$hidden_psy','$hidden_pday','$hidden_pstime', $hidden_pdept)") or die(mysql_error()); 
			
			 $result = mysql_query("SELECT `sched`.*, `day`.`day_name`, `course`.`course_yrSec`, `room`.`room_name`,
 `timestart`.`time_s`, `subjects`.`sub_code`,
  `school_yr`.`school_year`, `profile`.`teacher_name` FROM `sched`,`room`,`course`,`subjects`,`profile`,`timestart` ,`day`,`school_yr`  WHERE sched.room_id=room.room_id and sched.course_id=course.course_id and sched.sub_id=subjects.sub_id and sched.teacher_id=profile.teacher_id and sched.time_s_id=timestart.time_s_id and sched.day_id=day.day_id 
 and sched.year_id=school_yr.year_id having sched.room_id='$hidden_proom' and sched.course_id='$faculty' and sched.sub_id='$hidden_psubcat' and sched.teacher_id='$hidden_pt' and sched.time_s_id='$hidden_pstime' and sched.day_id='$hidden_pday'
 and sched.year_id='$hidden_psy' and sem_id = '$hidden_psem'
  			");
			 if (!$result) 
	{
    die("Query to show fields from table failed");
	}
$numberOfRows = MYSQL_NUMROWS($result);

If ($numberOfRows == 0) 
	{
	echo '';
	}
else if ($numberOfRows > 0) 
	{
	$i=0;
	while ($i<$numberOfRows)
		{			
	
			$sched_id = MYSQL_RESULT($result,$i,"sched_id");
			$bcourse = MYSQL_RESULT($result,$i,"course_yrSec");
			$bsubcat = MYSQL_RESULT($result,$i,"sub_code");
			$bteacher = MYSQL_RESULT($result,$i,"teacher_name");
			$broom = MYSQL_RESULT($result,$i,"room_name");
			$bday = MYSQL_RESULT($result,$i,"day_name");
			$bstime = MYSQL_RESULT($result,$i,"time_s");
						
	$i++;	 
			}
			}
					$note = "&nbsp;&nbsp;&nbsp;&nbsp;<font face = 'Verdana, Arial, Helvetica, sans-serif', size='2'><b> *You have saved schedule of: Course: <font size='4'><i><a href='search_c_result.php?pCourse=$faculty&pSy=$hidden_psy&psem=$hidden_psem'>$bcourse </a></i></font>,&nbsp; Subject: $bsubcat &nbsp;<br> Teacher: <font size='4'><i><a href='search_t_result.php?pT=$hidden_pt&pSy=$hidden_psy&psem=$hidden_psem'>$bteacher </a></i></font>&nbsp; Room: <font size='4'><i><a href='search_r_result.php?pRoom=$hidden_proom&pSy=$hidden_psy&psem=$hidden_psem'>$broom </a></i></font> at $bday,$bstime'</font>";
					//echo "Your file has been saved in the database..";
					//header(
						//	"Location: sched_list.php");
			}	
		}
	}

	

	
?>
