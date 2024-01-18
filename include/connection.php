<?php

    $database=mysqli_connect("localhost","root","","db_sms");
    if (!$database){
        die(mysqli_error("Error"+$database));
    }

?>