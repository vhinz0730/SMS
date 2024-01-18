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

//import database
require_once "../include/connection.php";


($_POST)
    $result= $database->query("SELECT * FROM webuser");
    $name=$_POST['name'];
    $oldemail=$_POST["oldemail"];
    $email=$_POST['email'];
    $password=$_POST['password'];
    $cpassword=$_POST['cpassword'];
    $id=$_POST['id00'];


    header("location: settings.php?action=edit&error=".$error."&id=".$id);
?>