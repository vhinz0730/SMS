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
require_once "../include/connection.php";




if($_POST) {
    $result= $database->query("SELECT * FROM webuser");
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $oldemail=$_POST["oldemail"];
    $email=$_POST['email'];
    $tele=$_POST['Tele'];
    $id=$_POST['id00'];
    $instructor_name = $_POST['fname']." ".$_POST['lname'];

    $result1 = $database->query("SELECT usertype = 'admin' FROM webuser");
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    
   
    if ($password==$cpassword) {
        $error='3';
        $aab="SELECT instructor.instructor_id FROM instructor INNER JOIN webuser on instructor.instructor_email=webuser.email where webuser.email='$email';";
        $result= $database->query($aab);
        if($result->num_rows==1) {
            $id2=$result->fetch_assoc()["instructor_id"];
        }else {
            $id2=$id;
        }
        
        if($id2!=$id) {
            $error='1';
                
        } else {

            $sql1="UPDATE instructor SET instructor_email='$email', fname='$fname', lname='$lname',instructor_phone='$tele' WHERE instructor_id= '$id';";
            $database->query($sql1);
            $sql1="UPDATE subject SET instructor = '$instructor_name' where instructor_id = '$id';";
            $database->query($sql1);
            $sql1="UPDATE subjects SET instructor = '$instructor_name' where instructor_id = '$id';";
            $database->query($sql1);
            $sql1="UPDATE webuser set email='$email' where email='$oldemail' ;";
            $database->query($sql1);
            echo $sql1;
            $error= '4';
            }
    }else {
        $error='2';
    }

}else {
    $error='3';
}

header("location: instructor.php?action=edit&error=".$error."&id=".$id);
?>