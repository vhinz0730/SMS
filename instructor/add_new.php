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

require_once "../include/connection.php";
require 'includes/form_handlers/createJoinClass_handler.php';
?>

	
<div class="bg">
    <div class="wrapper">

        <div class="creatClass_box">  	
			
            <div id="first">
                <div class="creatClass_header">
                    <h1>Create Class</h1>
                </div>

			   <form action="createJoinClass.php" method="POST">

			  		<input type="text" name="yr_lvl" autocomplete="off" placeholder="Year Level" value = "<?php 
					?>" >
				   	<br>

					<input type="text" name="section" autocomplete="off" placeholder="Section" value = "<?php 
					?>" >
				   	<br>

					<input type="text" name="code" autocomplete="off" placeholder="Course Code" value = "<?php 
					?>" >
				   	<br>

				    <input type="text" name="subject_name" autocomplete="off" placeholder="Subject Name" value = "<?php 
					?>" >
				    <br>

				    <input type="text" name="description" autocomplete="off" placeholder="Description" value = "<?php 
					?>" >
				    <br>

                    <input type="text" name="unit" autocomplete="off" placeholder="Unit" value = "<?php 
					?>" >
				    <br>

                    <input type="text" name="time" autocomplete="off" placeholder="Time" value = "<?php 
					?>" >
				    <br>

                    <input type="text" name="day" autocomplete="off" placeholder="Day" value = "<?php 
					?>" >
				    <br>

                    <input type="text" name="room" autocomplete="off" placeholder="Room" value = "<?php 
					?>" >
				    <br>

                     <button class="cancel_button"><a href="subject.php">Cancel</a></button>
				     <button  type="sumbit" name="createClass_button" id ="create_class_button">Create</button>
		     		 </form>
             </div>
<?php
header("location: subject.php"); ?>