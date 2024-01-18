<?php

session_start();

if(isset($_SESSION["user"])) {
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='student') {
        header("location: ../signin.php");
    } else {
    $useremail=$_SESSION["user"];
  }
} else {
    header("location: ../signin.php");
}

if (isset($_GET['id'])) {
	require_once "../include/connection.php";
        $id=$_GET["id"];
        $result001= $database->query("SELECT * FROM subjects WHERE id='$id';");
        $sql= $database->query("DELETE FROM subjects WHERE subject_id ='$id';");
        header("location: subject.php");
    }

?>