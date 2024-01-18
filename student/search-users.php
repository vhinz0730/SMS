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

        
        $searchUser = "SELECT * FROM instructor WHERE `fname` = '$search' OR instructor_email = '$search'";
        $searchUserStatus = mysqli_query($database,$searchUser) or die(mysqli_error($database));
        
        if(mysqli_num_rows($searchUserStatus) > 0) { 

            header('Location: search-results.php?message=Search results:');

        } else {

            header('Location: search-results.php?message=No user found.');

        }
        

    } else { 

        header('Location: chats.php?message=Please input instructor name or email.');

    }

    $_SESSION['search'] = $search;
?>