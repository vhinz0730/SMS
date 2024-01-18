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

  $userrow = $database->query("SELECT * FROM instructor WHERE instructor_email='$useremail'");
  $userfetch=$userrow->fetch_assoc();
  $userid= $userfetch["instructor_id"];
  $username=$userfetch["fname"]." ".$userfetch["lname"];

?>

<!-- header -->
<?php include "section/header.php" ?>

<!-- sidebar -->
<?php include "section/sidebar.php" ?>

<div class="main">
<div class="container text-white">
<div data-aos="fade-up" data-aos-duration="1400" class="row" style="margin-top: 20px; margin-bottom: 70px;">
    <div class="col">
      <table class="styled-table">
        <thead>
          <tr>
          <th>List of Students</th>
          <th>Action</th>
         <form action="subject.php" method="POST">
<?php
    if($_POST) {
      $sqlmain= "SELECT * FROM subjects WHERE code ='$keyword' OR subject_name='$keyword' OR subject_name LIKE '$keyword%' OR subject_name LIKE '%$keyword' OR subject_name LIKE '%$keyword%'";
      } else {
      $sqlmain= "SELECT * FROM subjects ORDER BY student ASC";
      }
    $result= $database->query($sqlmain);
    if($result->num_rows==0) {
   
    } else {
        for($x=0; $x<$result->num_rows;$x++) {
          $row=$result->fetch_assoc();
          $sid=$row["id"];
          $student_id=$row["student_id"];
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
          $status=$row['status'];
          $q_instructor = $database->query("SELECT * FROM `instructor` WHERE `instructor_email` = '$useremail'") or die(mysqli_error());
		      $f_instructor = $q_instructor->fetch_array();
		      $instructor_name = $f_instructor['fname']." ".$f_instructor['lname'];
          if($instructor == $instructor_name)
          {if(isset($_GET["id"])) {
             $id=$_GET["id"];
                  if (($id == $subject_id)&&($status == "go")){
        echo '
        <tbody>
        <tr>
          <td>'.ucwords($student).'</td>
          <td><a href="?action=drop&id='.$subject_id.'&name='.$student_id.'" class="btn btn-danger btn-sm">Remove</a> </td>
        </tr>
        
        </tbody>
                  
      ';}
               }     }
                }
              }
              
?>
</table>
<?php
 if(isset($_GET["id"])) {
  $subject_id=$_GET["id"];
  $action=$_GET["action"];
  if($action=='print') {
  $instructor_id=$_GET["instructor"];
  }
}



?>
<br> 
            </div></div>
  </div>
</div>
<table>
<div class = "text-center">
  <a href="subject.php" class="btn btn-warning btn-sm">Back</a>&nbsp&nbsp
  <a href="print.php?action=print&id=<?php echo ($subject_id);?>&name=<?php echo ($instructor_id);?>" class="btn btn-primary btn-sm">Print</a>
</div>
</table>
    <?php 
      if(isset($_GET["id"])) {
        $id=$_GET["id"];
        $action=$_GET["action"];
        if($action=='drop') {
        $nameget=$_GET["name"];
        echo '
        <div class="overlay">
        <div class="popup text-center text-white">
          <img src="../asset/img/undraw_faq.svg" width="50%" style="margin-bottom: 10px;">
          <a class="close" href="?action=view&id='.$subject_id.'&ins='.$instructor_id.'">&times;</a>
          <p>Are you sure you want to remove this student?</p>
          <a href="delete.php?id='.$id.'&name='.$nameget.'" class="btn btn-warning btn-sm">Yes</a>
        </div>
        </div>
        ';
      }
    } 
    else{
      echo '
      <div class="overlay">
      <div class="popup text-center">
      <a class="close" href="subject.php">&times;</a>
      <h3>Deleted successfully!</h3>
      <a href="subject.php" class="btn btn-warning btn-sm">Okay</a>
      </div>
      </div>
      ';
    }
    if(isset($_GET["id"])) {
      $id=$_GET["id"];
      $action=$_GET["action"];
      if($action=='print') {
      $instructor_id=$_GET["instructor"];
      }
    }
?>
<?php include "section/footer.php" ?>