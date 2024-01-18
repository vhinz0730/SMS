<!-- code -->
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

  // import database
  require_once "../include/connection.php";

  $userrow = $database->query("SELECT * FROM student WHERE student_email='$useremail'");
  $userfetch=$userrow->fetch_assoc();
  $username=$userfetch["fname"]." ".$userfetch["mname"]." ".$userfetch["lname"];
  $username1=$userfetch["fname"]." ".$userfetch["lname"];

 

?>

<!-- header -->
<?php include "section/header.php" ?>

<!-- sidebar -->
<?php include "section/sidebar.php" ?>

<?php
    if($_POST) {
      $sqlmain= "SELECT * FROM subjects WHERE code ='$keyword' OR subject_name='$keyword' OR subject_name LIKE '$keyword%' OR subject_name LIKE '%$keyword' OR subject_name LIKE '%$keyword%'";
      } else {
      $sqlmain= "SELECT * FROM subjects ORDER BY subject_id DESC";
      }
    ?>   
<div class="main">
<div class="container text-white">
<div data-aos="fade-up" data-aos-duration="1400" class="row" style="margin-top: 20px; margin-bottom: 70px;">
    <div class="col">
      <table class="styled-table">
        <thead>
          <tr>
          <th>Instructor</th>
          <th>Subject</th>
          <th>First  </th>
          <th>Second  </th>
          <th>Third  </th>
          <th>Fourth </th>
          <th>Final Grade</th>
          </tr>
        </thead>
<?php
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
          $first=$row['first'];
          $second=$row['second'];
          $third=$row['third'];
          $fourth=$row['fourth'];
          $final=$row['final'];
          if($student == $username1)
         {
                  if ($status == "go"){
        echo '        
     
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <form action="savegrade.php" method="POST">
  <input type="hidden" value="'.$sid.'" name="id">
  <input type="hidden" value="'.$subject_id.'" name="subject_id">
  <input type="hidden" value="'.$instructor_id.'" name="instructor_id">
  <tbody>
  <tr>
  <td>'.ucwords($instructor).'</td>
  <td>'.substr($subject_name,0,50).'</td> 
 <td>
   <input type="text" name="first" value="'.$first.'"  size="2" maxlength="2" class="kd1" readonly>
 </td>
 <td>
   <input type="text" name="second" value="'.$second.'" size="2" maxlength="2" class="kd1" readonly>
 </td> 
 <td>
   <input type="text" name="third" value="'.$third.'" size="2" maxlength="2" class="kd1" readonly>
 </td>
 <td>
   <input type="text" name="fourth" value="'.$fourth.'" size="2" maxlength="2" class="kd1" readonly>
 </td>
 <td>
   <input type="text" name="final" value="'.$final.'" size="2" maxlength="2" class="result1" readonly>
 </td>
 </tr>
 </tbody>
 </form>
        
      ';}
               }     }
                }
              
              
?>
</table>   
<br> 

  </div>
</div>

    <?php 
      if(isset($_GET["id"])) {
        $id=$_GET["id"];
        $action=$_GET["action"];
        if($action=='edit') {
        $nameget=$_GET["name"];
        echo '
        <div class="overlay">
        <div class="popup text-center">
          <img src="../asset/img/undraw_faq.svg" width="50%" style="margin-bottom: 10px;">
          <a class="close" href="subject.php">&times;</a>
          <p>Remove '.$student.' from '.$subject_name.' class?</p>
          <a href="?id='.$id.'&name='.$nameget.'" class="btn btn-warning btn-sm">Yes</a>
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
  <a href="prints.php?action=print&id=<?php echo ($student_id);?>&name=<?php echo ($instructor_id);?>" class="btn btn-primary btn-sm" id="print">Print</a>
</table>
</div>


<?php include "section/footer.php" ?>