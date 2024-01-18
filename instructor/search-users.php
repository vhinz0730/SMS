<?php

    // session start
    session_start();

    //import database
    require_once "../include/connection.php";

    // declaring variables
    $search = "";

    // get form data
    if(isset($_POST['search'])) {
    $search = $_POST['search'];
    }

    if($search != "") {

        $searchUser = "SELECT * FROM student WHERE fname = '$search' OR student_email = '$search'";
        $searchUserStatus = mysqli_query($database,$searchUser) or die(mysqli_error($database));
        
        if(mysqli_num_rows($searchUserStatus) > 0) { 

            header('Location: search-results.php');

        } else {

            header('Location: search-results.php');

        }
        

    } else { 

        header('Location: chats.php?message=Please input student name or email.');

    }

    $_SESSION['search'] = $search;
?>