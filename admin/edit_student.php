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
    $id=$_POST['id00'];
    $dob=$_POST['student_birthdate'];


    $result1 = $database->query("SELECT usertype = 'admin' FROM webuser");
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];

    
    
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

            $sql1="UPDATE student SET student_email='$email',fname='$fname', mname='$mname', lname='$lname',student_birthdate='$dob',student_password='$password',student_phone='$tele',student_address='$address' WHERE student_id=$id ;";
            $database->query($sql1);
            echo $sql1;
            $sql1="UPDATE webuser set email='$email' where email='$oldemail' ;";
            $database->query($sql1);
            echo $sql1;
            $error= '4';
            
        }
        
    }else {
        $error='1';
    }

}else {
    $error='3';
}

header("location: student.php?action=edit&error=".$error."&id=".$id);
?>