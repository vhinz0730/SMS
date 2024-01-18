<!-- code -->
<?php

  session_start();

  if(isset($_SESSION["user"])) {
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='admin') {
      header("location: ../signin.php");
    } else {
      $useremail=$_SESSION["user"];
    }

  } else {
    header("location: ../signin.php");
  }

  // import database
  require_once "../include/connection.php";

  $userrow = $database->query("SELECT * FROM admin WHERE admin_email='$useremail'");
  $userfetch=$userrow->fetch_assoc();
  $userid= $userfetch["admin_id"];
  $username=$userfetch["admin_name"];

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
if(isset($_GET["id"])) {
      $subject_id=$_GET["id"];
      $info = $database->query("SELECT * FROM `subjects` WHERE `subject_id` = '$subject_id'") or die(mysqli_error());
		      $infos = $info->fetch_array();
		      $instructor = $infos['instructor'];
          $subject_name = $infos['subject_name'];
     }
     
     ?>
<?php
    if($_POST) {
      $sqlmain= "SELECT * FROM subjects WHERE code ='$keyword' OR subject_name='$keyword' OR subject_name LIKE '$keyword%' OR subject_name LIKE '%$keyword' OR subject_name LIKE '%$keyword%'";
      } else {
      $sqlmain= "SELECT * FROM subjects ORDER BY subject_id DESC";
      }
    $result= $database->query($sqlmain);
    if($result->num_rows==0) {
     
    } else {
      echo '
      <table>
      <thead>
        <tr>
       <td style="width:300px;border:1px solid black;font-size:18px;height:15px"  colspan="3">Instructor: '.ucwords($instructor).'</td>
       <td style="width:300px;border:1px solid black;font-size:18px;height:15px"  colspan="3"> Subject: '.ucwords($subject_name).'</td>
       </tr>
       <tr>
       <th style="width:150px;border:1px solid black;font-size:20px;height:15px text-align: center;" colspan="6">Grades</th>
     </tr>
        <tr><th colspan="6"><br></th></tr>
        <tr>
          <th>Names</th>
          <th>First Grading</th>
          <th>Second Grading</th>
          <th>Third Grading</th>
          <th>Fourth Grading</th>
          <th>Final Grade</th>
        </tr>
      </thead>

';
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
          $first=$row["first"];
          $second=$row["second"];
          $third=$row["third"];
          $fourth=$row["fourth"];
          $final=$row["final"];
          if(isset($_GET["id"])) {
             $id=$_GET["id"];
                  if (($id == $subject_id)&&($status == "go")){
        echo '
            <tbody>
            <tr>
		        <td style="width:300px;border:1px solid black;font-size:18px;height:15px">'.substr($student,0,50).'</td>
            <td style="width:300px;border:1px solid black;font-size:18px;height:15px">'.substr($first,0,50).'</td>
            <td style="width:300px;border:1px solid black;font-size:18px;height:15px">'.substr($second,0,50).'</td>
            <td style="width:300px;border:1px solid black;font-size:18px;height:15px">'.substr($third,0,50).'</td>
            <td style="width:300px;border:1px solid black;font-size:18px;height:15px">'.substr($fourth,0,50).'</td>
            <td style="width:300px;border:1px solid black;font-size:18px;height:15px">'.substr($final,0,50).'</td>
            </tr>
            </tbody>        
      ';}

               }     }
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


<th colspan="6" id="print-btn">
<a href="gradesheet.php?action=grades&id=<?php echo ($subject_id); ?>&ins=<?php echo ($instructor_id);?>" class="btn btn-warning btn-sm" id="print-btn" >Back</a>&nbsp&nbsp
<button onclick="window.print();" class="btn btn-primary btn-sm" id="print-btn">Print</button>
</th>

<?php include "section/footer.php" ?>