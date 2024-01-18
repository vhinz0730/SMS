<?php

require_once "../include/connection.php";

if (isset($_GET['id'])) {
        $id=$_GET["id"];
        $status = "go";
        $sql1="UPDATE subjects SET status = '$status' where id = '$id';";
        $database->query($sql1);
        }
        else{
          die(mysqli_error($database));
        }
header("location: classjoin.php");
?>