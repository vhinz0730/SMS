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


<?php include "section/header.php" ?>
<?php include "section/sidebar.php" ?>


<div class="main">
<div class="container text-white">

    <div class="col">
      <table class="styled-table">
        <thead>
          <tr>
          <th>Students</th>
          <th>First </th>
          <th>Second </th>
          <th>Third </th>
          <th>Fourth</th>
          <th>Final Grade</th>
          <th>Action</th>
          </tr>
        </thead> 

<?php
    if($_POST) {
      $sqlmain= "SELECT * FROM subjects WHERE code ='$keyword' OR subject_name='$keyword' OR subject_name LIKE '$keyword%' OR subject_name LIKE '%$keyword' OR subject_name LIKE '%$keyword%'";
      } else {
      $sqlmain= "SELECT * FROM subjects ORDER BY subject_id DESC";
      }
    ?>   
<?php
    $result= $database->query($sqlmain);
    if($result->num_rows==0) {
      echo '
    
      ';
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
          $q_instructor = $database->query("SELECT * FROM `instructor` WHERE `instructor_email` = '$useremail'") or die(mysqli_error());
		      $f_instructor = $q_instructor->fetch_array();
		      $instructor_name = $f_instructor['fname']." ".$f_instructor['lname'];
          if($instructor == $instructor_name)
          {if(isset($_GET["id"])) {
             $id=$_GET["id"];
                  if (($id == $subject_id)&&($status == "go")){
        echo '         
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
  <form action="savegrade.php" method="POST">
  <input type="hidden" value="'.$sid.'" name="id">
  <input type="hidden" value="'.$subject_id.'" name="subject_id">
  <input type="hidden" value="'.$instructor_id.'" name="instructor_id">
  <tbody>
  <tr>
     <td>'.ucwords($student).'</td>
    <td>
      <input type="number"  name="first" value="'.$first.'" min="0"  max="95" class="kd1">
    </td> 
    <td>
      <input type="number"  name="second" value="'.$second.'" min="0"  max="95" class="kd1">
    </td> 
    <td>
      <input type="number"  name="third" value="'.$third.'"   min="0" max="95" class="kd1">
    </td>
    <td>
      <input type="number" name="fourth" value="'.$fourth.'"  min="0" max="95" class="kd1">
    </td>
    <td>
      <input type="text" name="final" value="'.$final.'" size="2" maxlength="2" class="result1" readonly>
    </td>
    <td><input type="submit" value="Save" name="Save" class="btn btn-success btn-sm"></td>
    </tr>
    </tbody>
    </form>
         
      ';}
               }     }
                }
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
    if(isset($_GET["id"])) {
      $subject_id=$_GET["id"];
      $action=$_GET["action"];
      if( $action== 'print') {
      $instructor_id=$_GET ["instructor_id"]; 
     }
     }
?>

<div class="text-center">
<table>
  <a href="subject.php" class="btn btn-danger  btn-sm">Back</a>&nbsp&nbsp
  <a href="prints.php?action=print&id=<?php echo ($subject_id);?>&name=<?php echo ($instructor_id);?>" class="btn btn-primary btn-sm" id="print">Print</a>
</table>
</div>
<script>
     $(document).ready(function() {
  $(document).on("input", ".kd1", function() {
    $('table tr').each(function() {
     
      var total = 0,
        count = 0;

   
      $('.kd1', this).each(function() {
       
        if (this.value.trim() != '0') {
     
          count++;
         
          total += (Number(this.value.trim()) || 0);
        }
      });
         if(count == 4){
      $('.result1', this).val(total / count || 0);}
    });
  });

});
    </script>
<?php include "section/footer.php" ?>