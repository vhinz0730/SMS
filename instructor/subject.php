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

<div class="main">
  <div class="container bg-dark text-white">


  <form action="subject.php" method="POST">
    <div data-aos="fade-up" data-aos-duration="1000" class="row">
      <div class="col">
        <div class="box">
          <div class="container-1">
            <span class="icon"><i class="fa fa-search"></i></span>
            <input type="search" name="search" id="search" placeholder="Subject" list="subject" />
          </div>
          </div>
        </div>
    </div>
    <div data-aos="fade-up" data-aos-duration="1000" class="row text-center" style="margin-top: 20px;">
      <div class="col">
        <input type="submit" value="Search" class="btn btn-warning btn-sm" style="padding: 7px;">
      </div>
    </div>
    </form>
  <div> 
    <br>
  </div>
    <?php
    if($_POST) {
    $keyword=$_POST["search"];
    $sqlmain= "SELECT * FROM subject WHERE code ='$keyword' OR subject_name='$keyword' OR subject_name LIKE '$keyword%' OR subject_name LIKE '%$keyword' OR subject_name LIKE '%$keyword%'";
    } else {
    $sqlmain= "SELECT * FROM subject ORDER BY time ASC";
    }
    ?>
    
    <div data-aos="fade-up" data-aos-duration="1300" class="row text-center">
      <div class="col">
      <a href="add_subject.php" class="btn btn-warning btn-sm">Add Subject</a>
      </div>
    </div>

    <div data-aos="fade-up" data-aos-duration="1400" class="row" style="margin-top: 20px; margin-bottom: 70px;">
      <div class="col">
          <table class="styled-table">
            <thead>
              <tr>
                <th>Code</th>
                <th>Subject Name</th>
                <th>Description</th>
                <th>Unit</th>
                <th>time</th>
                <th>Day</th>
                <th>Room</th>
                <th>Course Code</th>
                <th>Action </th>
                </tr>
            </thead>

    <?php
    $result= $database->query($sqlmain);
    
    if($result->num_rows==0) {
    echo '
    <div class="row" style="position: absolute; margin-top: 100px; left: 43%;">
    <div class="col">
        <img src="../asset/img/undraw_taken.svg" width="25%">
        <p style="margin-top:10px 0 20px 0; color:#E0E1E4;">There\'s nothing here.</p>
    </div>
    </div>  
    ';
    } else {
        for($x=0; $x<$result->num_rows;$x++) {
          $row=$result->fetch_assoc();
          $subject_id=$row["subject_id"];
          $code=$row["code"];
          $subject_name=$row["subject_name"];
          $description=$row["description"];
          $unit=$row["unit"];
          $time=$row["time"];
          $day=$row["day"];
          $room=$row["room"];
          $courseCode=$row["courseCode"];
          $instructor=$row["instructor"];
          $instructor_id=$row["instructor_id"];
          $q_instructor = $database->query("SELECT * FROM `instructor` WHERE `instructor_email` = '$useremail'") or die(mysqli_error());
		      $f_instructor = $q_instructor->fetch_array();
		      $instructor_name = $f_instructor['fname']." ".$f_instructor['lname'];
          if($instructor == $instructor_name){
        echo '
        <tbody>
        <tr>
          <td>'.ucwords($code).'</td>
          <td>'.ucwords($subject_name).'</td>
          <td>'.ucwords($description).'</td>
          <td>'.substr($unit,0,50).'</td>
          <td>'.strtoupper($time).'</td>
          <td>'.strtoupper($day).'</td>
          <td>'.substr($room,0,50).'</td>
          <td>'.substr($courseCode,0,50).'</td>
          <td>
          <a href="classlist.php?action=view&id='.$subject_id.'&ins='.$instructor_id.'" class="btn btn-info btn-sm">Class List</a><br>
          <a href="?action=edit&id='.$subject_id.'&error=0" class="btn btn-warning btn-sm">Edit</a>
          <a href="?action=drop&id='.$subject_id.'&name='.$subject_name.'" class="btn btn-danger btn-sm">Remove</a>
          <a href="gradesheet.php?action=grades&id='.$subject_id.'&ins='.$instructor_id.'" class="btn btn-info btn-sm">Add Grades</a>
          </td>
        </tr>
        </tbody>
    
      ';}
          }
    }    
    ?>
      </table>
  </div>
</div>

    <?php 
    if(isset($_GET["id"])) {
    $id=$_GET["id"];
    $action=$_GET["action"];
    if($action=='drop') {
    $nameget=$_GET["name"];
    echo '
    <div class="overlay">
    <div class="popup text-center">
      <img src="../asset/img/undraw_faq.svg" width="50%" style="margin-bottom: 10px;">
      <a class="close" href="subject.php">&times;</a>
      <p>Remove this class?</p>
      <a href="delete_subject.php?id='.$id.'" class="btn btn-warning btn-sm">Yes</a>
      </div>
    </div>
    </div>
    ';
    } 

   elseif($action=='add') {
    $sqlmain= "SELECT * FROM subject where subject_id= '$id'";
    $error_1=$_GET["action"];
    $errorlist= array(
    '1'=>'<p class="text-center" style="color:rgb(255, 62, 62);">Subject already exist.</p>',
    '2'=>'<p class="text-center" style="color:rgb(255, 62, 62);">2</p>',
    '3'=>'<p class="text-center" style="color:rgb(255, 62, 62);">3</p>',
    '4'=>"",
    '0'=>'',
    );
    if($error_1!='4') {
    } else {
    echo '
    <div class="overlay">
    <div class="popup text-center">
        <img src="../asset/img/undraw_welcome.svg" width="50%" style="margin-bottom: 10px;">
        <a class="close" href="subject.php">&times;</a>
        <p>Successfully updated!</p>
        <a href="settings.php" class="btn btn-warning btn-sm">Okay</a>
        </div>
    </div>
    </div>
    ';
    }
  
      if(isset($_GET["id"])) {
      $id=$_GET["id"];
      $action=$_GET["action"];
      if( $action== 'view') {
      $instructor_id=$_GET ["instructor_id"]; 
      }
    }
    if(isset($_GET["id"])) {
      $id=$_GET["id"];
      $action=$_GET["action"];
      if( $action== 'grades') {
      $instructor_id=$_GET ["instructor_id"]; 
     }
     }
    }elseif($action=='edit') {
      $sqlmain= "SELECT * from subject WHERE subject_id= '$id'";
      $result= $database->query($sqlmain);
      $row=$result->fetch_assoc();
      $code=$row["code"];
          $subject_name=$row["subject_name"];
          $description=$row["description"];
          $unit=$row["unit"];
          $time=$row["time"];
          $day=$row["day"];
          $room=$row["room"];
          $courseCode=$row["courseCode"];
          $instructor=$row["instructor"];
      $error_1=$_GET["error"];
      $errorlist= array(
      '1'=>'<p class="text-center" style="color:rgb(255, 62, 62);"></p>',
      '2'=>'<p class="text-center" style="color:rgb(255, 62, 62);"></p>',
      '3'=>'<p class="text-center" style="color:rgb(255, 62, 62);"></p>',
      '4'=>"",
      '0'=>'',
      );
  
      if($error_1 == '0') {
      echo '
      <div class="overlay">
      <div class="popup text-center" style="bottom: 30px;">
      <a class="close" href="subject.php">&times;</a>
      <form action="edit_subject.php" method="POST">
      <div class="form__group field">
        <input type="hidden" value="'.$id.'" name="subject_id">
        <input type="hidden" value="'.$courseCode.'" name="courseCode">
        <input type="text" name="code" class="form__field" placeholder="Code" value="'.$code.'" required>
        <label for="code" class="form__label">Code: </label>
      </div>
  
      <div class="form__group field">
          <input type="text" name="subject_name" class="form__field" placeholder="Subject Name" value="'.$subject_name.'" required>
          <label for="subject_name" class="form__label">Subject Name: </label>
      </div>
  
      <div class="form__group field">
          <input type="text" name="description" class="form__field" placeholder="Description" value="'.$description.'" required>
          <label for="description" class="form__label">Description: </label>
      </div>
  
      <div class="form__group field">
          <input type="text" name="unit" class="form__field" placeholder="Unit" value="'.$unit.'" required>
          <label for="unit" class="form__label">Unit: </label>
      </div>
  
      <div class="form__group field">
          <input type="text" name="time" class="form__field" placeholder="Time" value="'.$time.'" required>
          <label for="time" class="form__label">Time: </label>
      </div>
  
      <div class="form__group field">
          <input type="text" name="day" class="form__field" placeholder="Day" value="'.$day.'" required>
          <label for="day" class="form__label">Day: </label>
      </div>
  
      <div class="form__group field">
          <input type="text" name="room" class="form__field" placeholder="Room" value="'.$room.'" required>
          <label for="room" class="form__label">Room: </label>
      </div>
      
      <div class="form__group field">
          <input type="submit" value="Save" name="Save" class="btn btn-warning btn-sm">
      </div>
      </form>
      </div>
      </div>
      ';
  
      } else {
      echo '
      <div class="overlay">
      <div class="popup text-center">
      <a class="close" href="subject.php">&times;</a>
      <h3>Updated successfully!</h3>
      <a href="subject.php" class="btn btn-warning btn-sm">Okay</a>
      </div>
      </div>
      ';
  
      };
    };
      }
      

?> 

  </div>
</div>

<script>
     $(document).ready(function() {
  $(document).on("input", ".kd1", function() {
    $('table tr').each(function() {
      // variables for holding total and count
      var total = 0,
        count = 0;

      // get all input fields and iterate over them
      $('.kd1', this).each(function() {
        // check the value is non-empty
        if (this.value.trim() != '') {
          // increment count for calculating average
          count++;
          // update total based on input value
          // treat input value as 0 if number parsing produces NaN
          total += (Number(this.value.trim()) || 0);
        }
      });
      // calculate and update the average although treat as zero if NaN
      $('.result1', this).val(total / count || 0);
    });
  });

});
    </script>






<?php include "section/footer.php" ?>