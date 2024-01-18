<?php

session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='instructor'){
        header("location: ../signin.php");
    } else {
    $useremail=$_SESSION["user"];
  }
}else{
    header("location: ../signin.php");
}

require_once "../include/connection.php";
?>
<?php
$userrow = $database->query("SELECT * FROM instructor WHERE instructor_email='$useremail'");
$userfetch=$userrow->fetch_assoc();
$username=$userfetch["fname"]." ".$userfetch["lname"];
?>

<?php include "section/header.php" ?>
<?php include "section/sidebar.php" ?>
  
<form action="add_new.php" method="POST" >


<div class="main">
<div class="container text-white">
<div data-aos="fade-up" data-aos-duration="1400" class="row" style="margin-top: 30px; margin-bottom: 300px;">

<table  class="table table-dark" background-color: grey >
    <thead>
        <tr>
            <th>  

    <div class="form_group field">
        <input type="hidden" value="'.$id.'" name="id00">
    </div>

    <div class="form__group field">
<label for="cars">Year Level</label>
<select id="yr_lvl" name="yr_lvl" required>
  <option value=""></option>
  <option value="first year">First Year</option>
  <option value="secon dyear">Second Year</option>
  <option value="third year">Third Year</option>
  <option value="fourth year">Fourth Year</option>
</select>
</div>

<div class="form__group field">

        <input type="text" name="section" class="form__field" placeholder="Section" value="" required>
        <label for="section" class="form__label">Section: </label>
    </div>
    <div class="form__group field">
        <input type="text" name="code" class="form__field" placeholder="Code" value="" required>
        <label for="code" class="form__label">Code: </label>
    </div>
    <input type="hidden" value="'.$id.'" name="id00">

    <div class="form__group field">
        <input type="text" name="subject_name" class="form__field" placeholder="Subject Name" value="" required>
        <label for="subject_name" class="form__label">Subject Name: </label>
    </div>

    <div class="form__group field">
        <input type="text" name="description" class="form__field" placeholder="Description" value="" required>
        <label for="description" class="form__label">Description: </label>
    </div>


    <div class="form__group field">
        <input type="text" name="unit" class="form__field" placeholder="Unit" value="" required>
        <label for="unit" class="form__label">Unit: </label>
    </div>

    <div class="form__group field">
        <input type="text" name="time" class="form__field" placeholder="Time" value="" required>
        <label for="time" class="form__label">Time: </label>
    </div>

    <div class="form__group field">
        <input type="text" name="day" class="form__field" placeholder="Day" value="" required>
        <label for="day" class="form__label">Day: </label>
    </div>

    <div class="form__group field">
        <input type="text" name="room" class="form__field" placeholder="Room" value="" required>
        <label for="room" class="form__label">Room: </label>
    </div>

    <div class="form__group field">
        <input type="reset" value="Reset" class="btn btn-warning btn-sm" >
        <input type="submit" name="createClass_button" id="create_class_button" value="Save" class="btn btn-warning btn-sm">
    </div>
    </th>
    </tr>
    </thead>

    </table>
    </div>
</div>
</div>
</form>

<?php include "section/footer.php" ?>