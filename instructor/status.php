<?php


session_start();
  
   
require_once "../include/connection.php";

if(isset($_POST['status'])){
        $id=$_POST['id'];
        $action = $_POST['action'];
        $sent_by = $_POST['sent_by'];
        $sql1 = "UPDATE messages SET status ='$status' where id = '$id';";
        $database->query($sql1);
    }
    else{
        die(mysqli_error($database));
      }

      header("location: message.php?id=".$id."&receiver=".$sent_by."");
?>      