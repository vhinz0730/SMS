<?php
require_once "../include/connection.php";
$code="";
$subject_name= "";
$description = "";
$unit= "";
$time = "";
$day="";
$room="";
$courseCode="";
$username1=  "";
$user2= "";
$instructor_id="";

	$userLoggedIn  = $_SESSION['user'];
	$user_details_query = mysqli_query($database, "SELECT * FROM webuser WHERE email = '$userLoggedIn'");
	$user = mysqli_fetch_array($user_details_query);
	


	if(isset($_POST['createClass_button'])){
		$yr_lvl = strip_tags($_POST['yr_lvl']); 
		$yr_lvl = str_replace(' ', '', $yr_lvl);
		$uc = strtoupper($yr_lvl);

		$section = strip_tags($_POST['section']); 
		$section = str_replace(' ', '', $section);
		$upper = strtoupper($section);

		$code = strip_tags($_POST['code']); 
		$code = str_replace(' ', '', $code);
        
        $subject_name = strip_tags($_POST['subject_name']);
		$subject_name = str_replace(' ', '', $subject_name); 

		$description = strip_tags($_POST['description']); 
		$description = str_replace(' ', '', $description);

		$unit = strip_tags($_POST['unit']); 
		$unit = str_replace(' ', '', $unit);

		$time = strip_tags($_POST['time']); 
		$time = str_replace(' ', '', $time);

		$day = strip_tags($_POST['day']); 
		$day = str_replace(' ', '', $day);

		$room = strip_tags($_POST['room']); 
		$room = str_replace(' ', '', $room);

		$instructor_id = strip_tags($_POST['instructor_id']); 
		$instructor_id = str_replace(' ', '', $instructor_id);
		
		$i = 0;
	    $courseCode = strtolower($code . "_" . $subject_name);
		$check_code_query = mysqli_query($database, "SELECT courseCode FROM subject WHERE courseCode = '$courseCode'");
			
		$i = 0;
		while (mysqli_num_rows($check_code_query) != 0) {
			$i++;
			$courseCode = $courseCode . "_" . $i;
			$check_code_query = mysqli_query($database, "SELECT courseCode FROM subject WHERE courseCode = '$courseCode'");
		}
		$username1 =  $user['email'];	
		$q_instructor = $database->query("SELECT * FROM `instructor` WHERE `instructor_email` = '$userLoggedIn'") or die(mysqli_error());
		$f_instructor = $q_instructor->fetch_array();
		$instructor_id = $f_instructor['instructor_id'];
		$instructor_name = $f_instructor['fname']." ".$f_instructor['lname'];
		
		if(($code != "") && ($subject_name != "") && ($description != "")){
			$query = mysqli_query($database, "INSERT INTO subject VALUES('', '$instructor_id','$code', '$subject_name', '$description', '$unit','$time', '$day', '$room', '$courseCode','$instructor_name', '$uc', '$upper')");
		
		
		}
		
		$_SESSION['subject_name'] = "";
		$_SESSION['email'] ="";
		header("Location: subject.php");
		
        exit();   
	 }
	 if(isset($_POST['cancel_button'])){
        header("Location: index.php");
		exit();
	 }

 ?>