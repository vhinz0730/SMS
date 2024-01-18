<?php

require_once "../include/connection.php";



if(isset($_POST['Save'])) {
  
      $sid=$_POST["id"];
      $first=$_POST["first"];
      $second=$_POST["second"];
      $third=$_POST["third"];
      $fourth=$_POST["fourth"];
      $final=$_POST["final"];
      $subject_id = $_POST["subject_id"];
      $instructor_id = $_POST["instructor_id"];
        $sql1="UPDATE subjects SET first ='$first', second ='$second', third ='$third', fourth = '$fourth', final ='$final'  where id = '$sid';";
        $database->query($sql1);
        }
        else{
          die(mysqli_error($database));
        }

        header("location: gradesheet.php?action=grades&id=".$subject_id."&ins=".$instructor_id."");    
?>