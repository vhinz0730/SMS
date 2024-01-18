<!-- code -->
<?php

  session_start();

  if(isset($_SESSION["user"])) {
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='instructor') {
      header("location: ../signin.php");
    } else {
      $useremail=$_SESSION["user"];
    }

  } else {
    header("location: ../signin.php");
  }

  // import database
  require_once "../include/connection.php";



?>

<!-- header -->
<?php include "section/header.php" ?>

<!-- sidebar -->
<?php include "section/sidebar.php" ?>



<div class="main">
<div class="container text-white">
<?php
    if($_POST) {
      $keyword=$_POST["search"];
      $sqlmain = "SELECT * FROM subjects WHERE code ='$keyword' OR subject_name='$keyword' OR yr_lvl LIKE '$keyword%' OR section LIKE '%$keyword' OR student LIKE '%$keyword%'";
      } else {
      $sqlmain = "SELECT * FROM subjects ORDER BY subject_id DESC";
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
                <th>Student</th>
                <th>Year Level</th>
                <th>Section</th>
                <th>Action</th>
                
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
          $id=$row['id'];
          $instructor_id=$row["instructor_id"];
          $subject_id=$row["subject_id"];
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
          $yr_lvl=$row['yr_lvl'];
          $section=$row['section'];
          $q_instructor = $database->query("SELECT * FROM `instructor` WHERE `instructor_email` = '$useremail'") or die(mysqli_error());
		    $f_instructor = $q_instructor->fetch_array();
		    $instructor_name = $f_instructor['fname']." ".$f_instructor['lname'];
          if($instructor == $instructor_name){   
            if($status == "wait"){
        echo '
        <tbody>
        <tr>
          <td>'.substr($code,0,50).'</td>
          <td>'.substr($subject_name,0,50).'</td>
          <td>'.substr($description,0,50).'</td>
          <td>'.substr($unit,0,50).'</td>
          <td>'.substr($time,0,50).'</td>
          <td>'.substr($day,0,50).'</td>
          <td>'.substr($room,0,50).'</td>
          <td>'.substr($student,0,50).'</td>
          <td>'.substr($yr_lvl,0,50).'</td>
          <td>'.substr($section,0,50).'</td>
          <td>
          <a href="?action=add&id='.$id.'&name='.$student.'" class="btn btn-success btn-sm">Accept</a>
          <a href="?action=drop&id='.$id.'&name='.$student.'" class="btn btn-danger btn-sm">Reject</a>
          
         </td>
        </tr>
        </tbody>
      ';}
              }    }
                }      
?>
<br> 
      </table>
  </div>
</div>
<?php
  if(isset($_GET["id"])) {
    $id=$_GET["id"];
    $action=$_GET["action"];
    if($action=='drop') {
    $student=$_GET["name"];
    echo '
    <div class="overlay">
    <div class="popup text-center">
      <img src="../asset/img/undraw_faq.svg" width="50%" style="margin-bottom: 10px;">
      <a class="close" href="classjoin.php">&times;</a>
      <p>Reject this student from your class?</p>
      <a href="delete_schedule.php?id='.$id.'&name='.$student.'" class="btn btn-warning btn-sm">Yes</a>
      </div>
    </div>
    </div>
    ';
    }
  } 
  if(isset($_GET["id"])) {
    $id=$_GET["id"];
    $action=$_GET["action"];
    if($action=='add') {
    $student=$_GET["name"];
    echo '
    <div class="overlay">
    <div class="popup text-center">
      <img src="../asset/img/undraw_faq.svg" width="50%" style="margin-bottom: 10px;">
      <a class="close" href="classjoin.php">&times;</a>
      <p>Do you want to add this student to your class?</p>
      <a href="accept.php?id='.$id.'" class="btn btn-warning btn-sm">Yes</a>
      </div>
    </div>
    </div>
    ';
    }
  } 
?>
<?php include "section/footer.php" ?>