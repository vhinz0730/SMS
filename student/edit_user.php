<?php

//import database
require_once "../include/connection.php";

if($_POST) {
    $result= $database->query("SELECT * FROM webuser");
    $fname=$_POST['fname'];
    $mname=$_POST['mname'];
    $lname=$_POST['lname'];
    $oldemail=$_POST["oldemail"];
    $address=$_POST['address'];
    $email=$_POST['email'];
    $tele=$_POST['Tele'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $id=$_POST['id00'];
    
    if ($password==$cpassword) {
        $error='3';
        $aab="SELECT student.student_id FROM student INNER JOIN webuser on student.student_email=webuser.email where webuser.email='$email';";
        $result= $database->query($aab);
        if($result->num_rows==1) {
            $id2=$result->fetch_assoc()["student_id"];
        }else {
            $id2=$id;
        }
        
        if($id2!=$id) {
            $error='1';
                
        } else {

            $sql1="UPDATE student SET student_email='$email',fname='$name', mname='$mname', lname='$lname',student_password='$password',student_phone='$tele',student_address='$address' WHERE student_id=$id ;";
            $database->query($sql1);
            echo $sql1;
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

header("location: settings.php?action=edit&error=".$error."&id=".$id);
?>