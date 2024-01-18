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


$userrow = $database->query("SELECT * FROM admin WHERE admin_email='$useremail'");
  $userfetch=$userrow->fetch_assoc();
  $userid= $userfetch["admin_id"];
  $username=$userfetch["admin_name"];


include "section/header.php";
include "section/sidebar.php";
?>


<div class="main">
  <div class="container bg-dark text-white">



  <form action="student.php" method="POST">

    <div data-aos="fade-up" data-aos-duration="1000" class="row">
      <div class="col">
        <div class="box">
          <div class="container-1">
            <span class="icon"><i class="fa fa-search"></i></span>
            <input type="search" name="search" id="search" placeholder="Student Name or email" list="student" />
          </div>
          </div>
        </div>
    </div>

    <?php
    echo '<datalist id="student">';
    $list11 = $database->query("SELECT fname,lname,student_email FROM student;");

    for ($y=0;$y<$list11->num_rows;$y++){
    $row00=$list11->fetch_assoc();
    $d=$row00["fname"];
    $e=$row00["lname"];
    $c=$row00["student_email"];
    echo "<option value='$lanem,$d'><br />";
    echo "<option value='$c'><br />";
    };

    echo ' </datalist>';
    ?>
    <div data-aos="fade-up" data-aos-duration="1000" class="row text-center" style="margin-top: 20px;">
      <div class="col">
        <input type="submit" value="Search" class="btn btn-warning btn-sm" style="padding: 7px;">
      </div>
    </div>

    </form>

    <div data-aos="fade-up" data-aos-duration="1200" class="row text-center" style="margin-top: 50px; margin-bottom: 20px; color: #E0E1E4;">
      <div class="col">
          <p>All Students (<?php echo $list11->num_rows; ?>)</p>
      </div>
    </div>
    
    <?php
    if($_POST) {
    $keyword=$_POST["search"];

    $sqlmain= "SELECT * FROM student WHERE student_email='$keyword' OR fname='$keyword' OR fname LIKE '$keyword%' OR fname LIKE '%$keyword' OR lname LIKE '%$keyword%'";
    } else {
    $sqlmain= "SELECT * FROM student ORDER BY student_id DESC";

    }
    ?>
    <div data-aos="fade-up" data-aos-duration="1400" class="row" style="margin-top: 20px; margin-bottom: 70px;">
      <div class="col">
          <table class="styled-table">
            <thead>
              <tr>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Actions</th>
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
    $student_id=$row["student_id"];
    $fname=$row["fname"];
    $mname=$row["mname"];
    $lname=$row["lname"];
    $email=$row["student_email"];
    $phone=$row["student_phone"];
    echo '
    <tbody>
    <tr>
      <td>'.substr($fname,0,50).'</td>
      <td>'.substr($mname,0,50).'</td>
      <td> '.substr($lname,0,50).'</td>
      <td>'.substr($email,0,50).'</td>
      <td>'.substr($phone,0,19).'</td>
      <td>
      <a href="?action=edit&id='.$student_id.'&error=0" class="btn btn-warning btn-sm">Edit</a>
      <a href="?action=drop&id='.$student_id.'&name='.$fname.'" class="btn btn-danger btn-sm">Remove</a>
      </td>
    </tr>
    </tbody>

  ';

    }
    }
    ?>
      </table>
  </div>
</div>

    <?php 
    if(isset($_GET["id"])) {
    $id = $_GET["id"];
    $action= $_GET["action"];

    if($action=='drop') {
    $nameget=$_GET["name"];
    echo '
    <div class="overlay">
    <div class="popup text-center">
      <img src="../asset/img/undraw_faq.svg" width="50%" style="margin-bottom: 10px;">
      <a class="close" href="student.php">&times;</a>
      <p>Remove this student?</p>
      <a href="delete_student.php?id='.$id.'" class="btn btn-warning btn-sm">Yes</a>
      </div>
    </div>
    </div>
    ';
    } elseif($action=='view') {
    $sqlmain= "SELECT * FROM student where student_id='$id'";
    $result= $database->query($sqlmain);
    $row=$result->fetch_assoc();
    $fname=$row["fname"];
    $mname=$row["mname"];
    $lname=$row["lname"];
    $email=$row["student_email"];
    $tele=$row["student_phone"];
    $dob=$row["student_birthdate"];

    echo '

    <div class="overlay">
    <div class="popup">
    <a class="close" href="student.php">&times;</a>
        
    <div class="panel" style="margin-left: 10px;">
    <div class="panel-body bio-graph-info">
        <h1 class="text-warning" style="margin-bottom: 25px;">Student Information</h1>
        <div class="row">
            <div class="bio-row">
                <p><span>Name </span>: '.$fname.'</p>
            </div>
            <div class="bio-row">
                <p><span>Name </span>: '.$mname.'</p>
            </div>
            <div class="bio-row">
                <p><span>Name </span>: '.$lname.'</p>
            </div>
            <div class="bio-row">
                <p><span>Email </span>: '.$email.'</p>
            </div>
            <div class="bio-row">
                <p><span>Address</span>: '.$tele.'</p>
            </div>
            <div class="bio-row">
                <p><span>Name </span>: '.$dob.'</p>
            </div>
        </div>
    </div>
    </div>

    </div>
    </div>

    ';

    } elseif($action=='add') {
      $sqlmain= "SELECT * FROM student where student_id='$id'";
    $error_1=$_GET["action"];
    $errorlist= array(
    '1'=>'<p class="text-center" style="color:rgb(255, 62, 62);">Already have an account for this email address.</p>',
    '2'=>'<p class="text-center" style="color:rgb(255, 62, 62);">Try to confirm your password again.</p>',
    '3'=>'<p class="text-center" style="color:rgb(255, 62, 62);"></p>',
    '4'=>"",
    '0'=>'',
    );
    
    if($error_1!='4') {
      
    echo '
    <div class="overlay">
    <div class="popup" style="bottom: 25px;">
    <a class="close" href="student.php">&times;</a>
    
   

    <form action="#" method="POST">

    <div class="form__group field">
        <input type="hidden" value="'.$id.'" name="id00">
        <input type="text" name="fname" class="form__field" placeholder="First Name" value="" required>
        <label for="name" class="form__label">First Name: </label>
    </div>

    <div class="form__group field">
        <input type="text" name="lname" class="form__field" placeholder="Last Name" value="" required>
        <label for="name" class="form__label">Last Name: </label>
    </div>

    <div class="form__group field">
        <input type="email" name="email" class="form__field" placeholder="Phone" value="" required>
        <label for="email" class="form__label">Email: </label>
    </div>

    <div class="form__group field">
        <input type="number" name="student_phone" class="form__field" placeholder="Phone" value="" required>
        <label for="student_phone" class="form__label">Phone: </label>
    </div>

    <div class="form__group field">
        <input type="password" name="password" class="form__field" placeholder="Password" required>
        <label for="password" class="form__label">Password: </label>
    </div>

    <div class="form__group field">
        <input type="password" name="cpassword" class="form__field" required>
        <label for="cpassword" class="form__label">Confirm Password: </label>
    </div>

    <div class="form__group field">
        <input type="reset" value="Reset" class="btn btn-warning btn-sm" >
        <input type="submit" value="Save" class="btn btn-warning btn-sm">
    </div>

    </form>

    </div>
    </div>
    ';

    } else {
    echo '
    <div class="overlay">
    <div class="popup text-center">
        <img src="../asset/img/undraw_welcome.svg" width="50%" style="margin-bottom: 10px;">
        <a class="close" href="student.php">&times;</a>
        <p>Successfully updated!</p>
        <a href="student.php" class="btn btn-warning btn-sm">Okay</a>
        </div>
    </div>
    </div>
    ';
    }

    } elseif($action=='edit') {
      $sqlmain= "SELECT * FROM student WHERE student_id='$id'";
      $result= $database->query($sqlmain);
      $row=$result->fetch_assoc();
      $fname=$row["fname"];
      $mname=$row["mname"];
      $lname=$row["lname"];
      $email=$row["student_email"];
      $tele=$row['student_phone'];
      $dob=$row["student_birthdate"];
      
  
      $error_1=$_GET["error"];
      $errorlist= array(
      '1'=>'<p style="color:rgb(255, 62, 62);text-align:center;">Already have an account for this email address.</p>',
      '2'=>'<p style="color:rgb(255, 62, 62);text-align:center;">Try to confirm your password again.</p>',
      '3'=>'<p style="color:rgb(255, 62, 62);text-align:center;"></p>',
      '4'=>"",
      '0'=>'',
      );
  
      if($error_1!='4') {
      echo '
      <div class="overlay">
      <div class="popup" style="bottom: 70px;">
      <a class="close" href="student.php">&times;</a>
      
      <p class="text-center text-warning">'.$errorlist[$error_1].'</p>
  
      
  
      <form action="edit_student.php" method="POST">
  
  
      <div class="form__group field">
          <input type="hidden" value="'.$id.'" name="id00">
          <input type="hidden" name="oldemail" value="'.$email.'">
          <input type="email" name="email" class="form__field" placeholder="Email Address" value="'.$email.'" required>
          <label for="email" class="form__label">Email</label>
      </div>
  
      <div class="form__group field">
          <input type="text" name="fname" class="form__field" placeholder="Name" value="'.$fname.'" required>
          <label for="name" class="form__label">First/Middle/Last Name:</label>
    
      
      <input type="text" name="mname" class="form__field" placeholder="Name" value="'.$mname.'" required>
      <label for="name" class="form__label"></label>
 
  
    
          <input type="text" name="lname" class="form__field" placeholder="Name" value="'.$lname.'" required>
          <label for="name" class="form__label"></label>
      </div>
  
      <div class="form__group field">
          <input type="tel" name="Tele" class="form__field" placeholder="Phone" value="'.$tele.'" required>
          <label for="Tele" class="form__label">Phone: </label>
      </div>

      <div class="form__group field">
      <input type="text" name="student_birthdate" class="form__field" placeholder="Name" value="'.$dob.'" required>
      <label for="name" class="form__label">Birthday: </label>
  </div>
  
      <div class="form__group field">
          <input type="password" name="password" class="form__field" placeholder="Password" required>
          <label for="password" class="form__label">Password: </label>
      </div>
  
      <div class="form__group field">
          <input type="password" name="cpassword" class="form__field" required>
          <label for="cpassword" class="form__label">Confirm Password: </label>
      </div>
  
      <div class="form__group field">
          <input type="reset" value="Reset" class="btn btn-warning btn-sm" >
          <input type="submit" value="Save" class="btn btn-warning btn-sm">
      </div>
  
      </form>
  
      </div>
      </div>
  
      ';
    } else {
    echo '
    <div class="overlay">
    <div class="popup text-center">
    <a class="close" href="student.php">&times;</a>
    <h3>Updated successfully!</h3>
    <a href="student.php" class="btn btn-warning btn-sm">Okay</a>
    </div>
    </div>
    ';

    };
  };
};
?>
    
  </div>
</div>

<!-- footer -->
<?php include "section/footer.php" ?>