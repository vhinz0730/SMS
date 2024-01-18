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
require 'includes/form_handlers/createJoinClass_handler.php';
require_once "../include/connection.php";
$today = date('Y-m-d');
?>
<?php
$userrow = $database->query("SELECT * FROM student WHERE student_email='$useremail'");
$userfetch=$userrow->fetch_assoc();
$username=$userfetch["fname"]." ".$userfetch["mname"]." ".$userfetch["lname"];
?>


<?php include "section/header.php" ?>
<?php include "section/sidebar.php" ?>


<div class="main">
<div class="container text-white">
          <table class="styled-table">
            <thead>
              <tr>
                <th>Code</th>
                <th>Subject Name</th>
                <th>Description</th>
                <th>Unit</th>
                <th>Time</th>
                <th>Day</th>
                <th>Room</th>
                <th>Instructor</th>
                <th>Grade</th> 
              </tr>
            </thead>
          </table>

</div>
</div>



<?php include("section/footer.php"); ?>