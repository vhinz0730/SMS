<?php

session_start();

if(isset($_SESSION["user"])){
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='admin'){
        header("location: ../signin.php");
    } else {
    $useremail=$_SESSION["user"];
  }
}else{
    header("location: ../signin.php");
}

require_once "../include/connection.php";
?>

<?php include "section/header.php" ?>
<?php include "section/sidebar.php" ?>
    
    <style>
        form{
            width: 100%;
            padding: 480px;
            border-radius: 10px;
        }
    </style>
    
<form action="add_new.php" method="POST" >
<table  class="table table-dark" background-color: grey>
    <thead>
        <tr>
            <th>  
    <div class="form_group field">
        <input type="hidden" value="'.$id.'" name="id00">
    </div>

    <div class="form__group field">
        <input type="text" name="code" class="form__field" placeholder="Code" value="" required>
        <label for="code" class="form__label">Code: </label>
    </div>

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
        <a href="subject.php">  <input type="submit" name="createClass_button" id="create_class_button" value="Save" class="btn btn-warning btn-sm"></a>
    </div>

    </th>
    </tr>
    </thead>

    </table>
</form>
<?php include "section/footer.php" ?>