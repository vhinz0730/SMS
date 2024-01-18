<?php

session_start();

if(isset($_SESSION["user"])) {
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='student') {
        header("location: ../signin.php");
    } else {
        $useremail=$_SESSION["user"];
    }
} else {
    header("location: ../signin.php");
}
require 'includes/form_handlers/createJoinClass_handler.php';
require_once "../include/connection.php";
$today = date('Y-m-d');
?>
<?php
$userrow = $database->query("SELECT * FROM student WHERE student_email='$useremail'");
$userfetch=$userrow->fetch_assoc();
$username=$userfetch["fname"]." ".$userfetch["mname"]." ".$userfetch["lname"];
?>

<?php include "section/header.php" ?>
<?php include "section/sidebar.php" ?>

<div class="main">
  <div class="container bg-dark text-white">
<div class="row" style="margin-center: auto;">
<div data-aos="fade-up" class="col">
	<form action="subject.php" method="POST">
   <table class="styled-table">
    <thead>
      
      <tr>
      <th> <?php echo "<div> $today </div>" ?> </th> 
             <th>
             <input type="text-warning" name="courseCode" data-aos="fade-up" data-aos-duration="1300" placeholder="Class code" autocomplete="off" value = "">
             </th>
             <th>
                <button data-aos="fade-up" data-aos-duration="1300" class="w-100 btn btn-lg btn-success" name="joinClass_button" id="create_class_button" type="submit">Join</button>
             </th>
      </tr>
    </thead> 
   </table>
</div>
</div>

    <?php
    if($_POST) {
      $sqlmain= "SELECT * FROM subjects WHERE code ='$keyword' OR subject_name='$keyword' OR subject_name LIKE '$keyword%' OR subject_name LIKE '%$keyword' OR subject_name LIKE '%$keyword%'";
      } else {
      $sqlmain= "SELECT * FROM subjects ORDER BY student ASC";
      }
    ?>
    <div data-aos="fade-up" data-aos-duration="1400" class="row" style="margin-top: 20px; margin-bottom: 70px;">
      <div class="col">
          <table class="styled-table">
            <thead>
              <tr>
                <th>Code</th>
                <th>Subject Name</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Time</th>
                <th>Day</th>
                <th>Room</th>
                <th>Instructor</th>
                
                
                </tr>
            </thead>
<?php
    $result= $database->query($sqlmain);
    if($result->num_rows==0) {
    echo '
    <div class="row" style="position: absolute; margin-top: 100px; left: 43%;">
    <div class="col">
        <img src="../asset/img/undraw_taken.svg" width="25%">
        <p style="margin-top:10px 0 20px 0; color:#E0E1E4;">There\'s nothing here.</p>
    </div>
    </div>  
    ';
    } else {
        for($x=0; $x<$result->num_rows;$x++) {
          $row=$result->fetch_assoc();
          $status=$row["status"];
          $subject_id=$row["subject_id"];
          $student_id=$row["student_id"];
          $instructor_id=$row["instructor_id"];
          $code=$row["code"];
          $subject_name=$row["subject_name"];
          $description=$row["description"];
          $unit=$row["unit"];
          $time=$row["time"];
          $day=$row["day"];
          $room=$row["room"];
          $courseCode=$row["courseCode"];
          $instructor=$row["instructor"];
          $student=$row['student'];
          $q_student = $database->query("SELECT * FROM `student` WHERE `student_email` = '$useremail'") or die(mysqli_error());
		      $f_student = $q_student->fetch_array();
		      $student_name = $f_student['fname']." ".$f_student['lname'];
          if($student == $student_name){
            if($status=="go"){
        echo '
        <tbody>
        <tr>
          <td>'.substr($code,0,50).'</td>
          <td>'.substr($subject_name,0,50).'</td>
          <td>'.ucwords($description).'</td>
          <td>'.substr($unit,0,50).'</td>
          <td>'.strtoupper($time).'</td>
          <td>'.strtoupper($day).'</td>
          <td>'.ucwords($room).'</td>
          <td>'.ucwords($instructor).'</td>
        
         
        </tr>
        </tbody>
      ';}
          }
        }
        }
?>
    
      </table>
  </div>
</div>


    <?php 
    if(isset($_GET["id"])) {
    $id=$_GET["id"];
    $action=$_GET["action"];
    if($action=='drop') {
    $nameget=$_GET["name"];
    echo '
    <div class="overlay">
    <div class="popup text-center">
      <img src="../asset/img/undraw_faq.svg" width="50%" style="margin-bottom: 10px;">
      <a class="close" href="subject.php">&times;</a>
      <p>Remove this class?</p>
      <a href="delete_subject.php?id='.$id.'" class="btn btn-warning btn-sm">Yes</a>
      </div>
    </div>
    </div>
    ';
    } 
    } 
?> 
<?php
   if(isset($_GET["id"])) {
    $student_id=$_GET["id"];
    $action=$_GET["action"];
    if( $action== 'print') {
    $instructor_id=$_GET["instructor_id"];
   }
   }
?>
<div class="text-center">
<table>
  <a href="print.php?action=print&id=<?php echo ($student_id);?>&name=<?php echo ($instructor_id);?>" class="btn btn-primary btn-sm" id="print">Print Schedule</a>
</table>
</div>
<?php
  if(isset($_GET["msg"])){
    $msg =$_GET["msg"];
    if($msg==1){
    echo '
    <div class="overlay">
    <div class="popup text-center">
      <img src="../asset/img/success.gif" width="50%" style="margin-bottom: 10px;">
      <a class="close" href="subject.php">&times;</a>
      <p>Request Sent! </p>
      <p>Please wait for your instructor to confirm your request.<p>
      <a href="subject.php" class="btn btn-success btn-sm">Yes</a>
      </div>
    </div>
    </div>
    ';}
    elseif($msg==2){
      echo '
      <div class="overlay">
      <div class="popup text-center">
        <img src="../asset/img/error.gif" width="50%" style="margin-bottom: 10px;">
        <a class="close" href="subject.php">&times;</a>
        <p>You already sent a request</p>
        <p>Please inform your instructor for faster response.<p>
        <a href="subject.php" class="btn btn-warning btn-sm">Yes</a>
        </div>
      </div>
      </div>
      ';

    }
    else{
      echo '
      <div class="overlay">
      <div class="popup text-center">
        <img src="../asset/img/error.gif" width="50%" style="margin-bottom: 10px;">
        <a class="close" href="subject.php">&times;</a>
        <p>Course Code not found!</p>
        <p>Please ask your instructor for the Course Code.<p>
        <a href="subject.php" class="btn btn-warning btn-sm">Yes</a>
        </div>
      </div>
      </div>
      ';

    }






  }
   


?>



<?php include("section/footer.php"); ?>