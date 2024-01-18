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


  require_once "../include/connection.php";

  $userrow = $database->query("SELECT * FROM student WHERE student_email='$useremail'");
  $userfetch=$userrow->fetch_assoc();
  $userid= $userfetch["student_id"];
  $username=$userfetch["fname"]." ".$userfetch["lname"];

 

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
        <tr>
         <th style="width:300px;border:1px solid black;font-size:18px;height:15px"  colspan="7">Student: <?php echo ($username);?></th>
          </tr>
          <tr><td colspan="7"><br></td></tr>
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
          if($student == $username)
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
  <td style="width:200px;border:1px solid black;font-size:18px;height:15px">'.ucwords($instructor).'</td>
  <td style="width:60px;border:1px solid black;font-size:18px;height:15px">'.ucwords($subject_name).'</td> 
  <td style="width:30px;border:1px solid black;font-size:18px;height:15px">'.substr($first,0,50).'</td>
  <td style="width:30px;border:1px solid black;font-size:18px;height:15px">'.substr($second,0,50).'</td>
  <td style="width:30px;border:1px solid black;font-size:18px;height:15px">'.substr($third,0,50).'</td>
  <td style="width:30px;border:1px solid black;font-size:18px;height:15px">'.substr($fourth,0,50).'</td>
  <td style="width:30px;border:1px solid black;font-size:18px;height:15px">'.substr($final,0,50).'</td>
 </tr>
 </tbody>
 </form>
         
      ';}
               }     }
                }
              
              
?>
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
    $subject_id=$_GET["id"];
    $action=$_GET["action"];
    if( $action== 'grades') {
    $instructor_id=$_GET ["instructor_id"]; 
   }
   }
?>


<th colspan="7" id="print-btn">
<a href="grades.php" id="print-btn" >Back</a>
<button onclick="window.print();" class="btn btn-primary btn-sm" id="print-btn">Print</button>
</th>




<?php include "section/footer.php" ?>