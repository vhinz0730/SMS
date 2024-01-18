<?php

require_once "../include/connection.php";



if(isset($_POST['Save'])) {
      $subject_id=$_POST["subject_id"];
      $code=$_POST["code"];
      $instructor=$_POST["instructor"];
      $subject_name=$_POST["subject_name"];
      $description=$_POST["description"];
      $unit=$_POST["unit"];
      $time=$_POST["time"];
      $day=$_POST["day"];
      $room=$_POST["room"];
      $courseCode=$_POST["courseCode"];
        $sql1="UPDATE subject SET code='$code', subject_name='$subject_name', description='$description',unit='$unit',time='$time',day='$day' where subject_id = '$subject_id';";
        $database->query($sql1);
        $sql1="UPDATE subjects SET code='$code', subject_name='$subject_name', description='$description',unit='$unit',time='$time',day='$day' where courseCode = '$courseCode';";
        $database->query($sql1);
        $error= '4';
       
        }
        else{
          die(mysqli_error($database));
        }
       
    

        



header("location: subject.php?action=edit&error=".$error."&id=".$id);
?>