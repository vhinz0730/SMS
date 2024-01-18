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

    if($_GET) {
        require_once "../include/connection.php";
        $pid=$_GET["pid"];
        $result001= $database->query("SELECT * FROM tblposts WHERE id=$pid;");
        $sql= $database->query("DELETE FROM tblposts WHERE id ='$pid';");
        header("location: post-manager.php");
    }

?>