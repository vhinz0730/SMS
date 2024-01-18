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
<link rel="stylesheet" type="text/css" href="print.css" media="print">
<style>
table, th, td {
  border: 1px solid black;
  border-collapse: collapse;
  text-align: center;
  margin-left: auto;  
  margin-right: auto;  
}
<?php
if(isset($_GET["id"])) {
  $subject_id=$_GET["id"];
  $info = $database->query("SELECT * FROM `subjects` WHERE `subject_id` = '$subject_id'") or die(mysqli_error());
      $infos = $info->fetch_array();
      $instructor = $infos['instructor'];
      $subject_name = $infos['subject_name'];
 }

?>


</style>


      <table>
        <thead>
         
          <tr>
            <td style="width:300px;border:1px solid black;font-size:18px;height:15px" colspan="3" >Instructor: <?php echo ucwords($instructor);?><br>Subject: <?php echo ucwords($subject_name);?></td>    
          </tr>
          <tr>
          <th style="width:150px;border:1px solid black;font-size:20px;height:15px text-align: center;" colspan="3">List of Students</th>
          </tr>
<tr>
<td colspan="3"><br></td>
          </tr>
          <tr>
            <th>Names</th>
            <th></th>
          </tr>
          <tr><td colspan="3"><br></td></tr>
        </thead>
<form action="subject.php" method="POST">
<?php
    if($_POST) {
      $sqlmain= "SELECT * FROM subjects WHERE code ='$keyword' OR subject_name='$keyword' OR subject_name LIKE '$keyword%' OR subject_name LIKE '%$keyword' OR subject_name LIKE '%$keyword%'";
      } else {
      $sqlmain= "SELECT * FROM subjects ORDER BY subject_id DESC";
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
		        <td style="width:300px;border:1px solid black;font-size:18px;height:15px">'.ucwords($student).'</td>
            <td style="width:150px;border:1px solid black;font-size:20px;height:15px"></td>
            <td style="width:150px;border:1px solid black;font-size:20px;height:15px"></td>
            </tr>
            </tbody>        
      ';}

               }     }
                }
              }
    


?>
<?php
if(isset($_GET["id"])) {
    $subject_id=$_GET["id"];
    $action=$_GET["action"];
    if( $action== 'view') {
    $instructor_id=$_GET ["instructor_id"]; 
   }
   }
?>
<br> 


  <th colspan="3" id="print-btn">
<a href="classlist.php?action=view&id=<?php echo ($subject_id); ?>&ins=<?php echo ($instructor_id);?>" class="btn btn-warning btn-sm" id="print-btn" >Back</a>&nbsp&nbsp
 <button onclick="window.print();" class="btn btn-primary btn-sm" id="print-btn">Print</button>
  </th>

<?php include "section/footer.php" ?>