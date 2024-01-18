<?php
if(isset($_SESSION["user"])) {
	if(($_SESSION["user"])=="" or $_SESSION['usertype']!='student') {
	  header("location: ../signin.php");
	} else {
	  $userLoggedIn=$_SESSION["user"];
	}
  } else {
	header("location: ../signin.php");
  }
require_once "../include/connection.php";
	$userLoggedIn  = $_SESSION['user'];
	$user_details_query = mysqli_query($database, "SELECT * FROM webuser WHERE email = '$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
	
	
	 if(isset($_POST['joinClass_button'])){
		$courseCode = strip_tags($_POST['courseCode']);
		$courseCode = str_replace(' ', '', $courseCode);
		$username1 =  $user['email'];
		$q_student = $database->query("SELECT * FROM `student` WHERE `student_email` = '$userLoggedIn'") or die(mysqli_error());
		$f_student = $q_student->fetch_array();
		$student = $f_student['fname']." ".$f_student['lname'];
			$q_subject = $database->query("SELECT * FROM `subject` WHERE `courseCode` = '$courseCode'") or die(mysqli_error());
			$f_subject = $q_subject->fetch_array();
			$code= $f_subject['code'];
			$subject_name= $f_subject['subject_name'];
			$description = $f_subject['description'];
			$unit= $f_subject['unit'];
			$time = $f_subject['time'];
			$day=$f_subject['day'];
			$room=$f_subject['room'];
			$courseCode=$f_subject['courseCode'];
			$instructor_name=$f_subject['instructor'];
			$yr_lvl=$f_subject['yr_lvl'];
			$section=$f_subject['section'];
			$instructor_id=$f_subject['instructor_id'];
			$subject_id=$f_subject['subject_id'];
			$first="";
			$second="";
			$third="";
			$fourth="";
			$final="";
			$status="wait";
			$q_student = $database->query("SELECT * FROM `student` WHERE `student_email` = '$userLoggedIn'") or die(mysqli_error());
			$f_student = $q_student->fetch_array();
			$student_id = $f_student['student_id'];
			$student_name = $f_student['fname']." ".$f_student['lname'];


			$result = mysqli_query($database, "SELECT courseCode FROM subject where courseCode = '$courseCode'");
			$total = mysqli_num_rows($result);
			if($total==1){
				$result = mysqli_query($database, "SELECT courseCode,student FROM subjects where courseCode = '$courseCode' and student='$student'");
				$total = mysqli_num_rows($result);
				if($total==0){
				$query = mysqli_query($database, "INSERT INTO subjects VALUES('','$student_id','$subject_id', '$instructor_id','$code', '$subject_name', '$description', '$unit','$time', '$day', '$room', '$courseCode','$instructor_name', '$yr_lvl', '$section','$student','$first','$second','$third','$fourth','$final','$status')");
				$msg = 1;
				header("location: subject.php?msg=".$msg."");
				exit();
				}
				else{
				$msg = 2;
				header("location: subject.php?msg=".$msg."");
        		exit();
				}
			}
			else{
				$msg = 3;
				header("location: subject.php?msg=".$msg."");
			}
			exit();
	 }
 ?>