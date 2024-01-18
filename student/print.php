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
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
  margin-left: auto;  
  margin-right: auto;  
}
</style>

    <?php
    if($_POST) {
      $sqlmain= "SELECT * FROM subjects WHERE code ='$keyword' OR subject_name='$keyword' OR subject_name LIKE '$keyword%' OR subject_name LIKE '%$keyword' OR subject_name LIKE '%$keyword%'";
      } else {
      $sqlmain= "SELECT * FROM subjects ORDER BY subject_id DESC";
      }
    ?>
  
          <table>
            <thead>
              <tr><th colspan="8">Student: <?php echo ($username); ?></th></tr>
              <tr><th colspan="8"><br></th></tr>
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
          <td>'.ucwords($subject_name).'</td>
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
<?php
if(isset($_GET["id"])) {
    $subject_id=$_GET["id"];
    $action=$_GET["action"];
    if( $action== 'grades') {
    $instructor_id=$_GET ["instructor_id"]; 
   }
   }
?>
<th colspan="8" id="print-btn">
<a href="subject.php" id="print-btn" >Back</a>
<button onclick="window.print();" class="btn btn-primary btn-sm" id="print-btn">Print</button>
</th>

<?php include("section/footer.php"); ?>