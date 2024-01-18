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

<?php
if(isset($_POST['submit']))
{
$comment=$_POST['comment'];
$postid=intval($_GET['nid']);
$userrow = $database->query("SELECT * FROM admin WHERE admin_email='$useremail'");
  $userfetch=$userrow->fetch_assoc();
  $useremail= $userfetch["admin_email"];
  $username=$userfetch["admin_name"];

$query=mysqli_query($database," insert into tblcomments(postId,name,email,comment,status) values ('$postid','$username','$useremail','$comment','')");
if($query):
  echo "<script>alert('Comment successfully submitted. ');</script>";
else :
 echo "<script>alert('Something went wrong. Please try again.');</script>";  

endif;
}
?>
<div class="main">
    <div class="container bg-dark text-white">
<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
   
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

 
    <link href="css/modern-business.css" rel="stylesheet">

  </head>

  <body>


   
    <div class="container">


     
      <div class="row" style="margin-top: 4%">

     
        <div class="col-md-8">

      
<?php
$pid=intval($_GET['nid']);
 $query=mysqli_query($database,"select tblposts.posted as posted, tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.id='$pid'");
while ($row=mysqli_fetch_array($query)) {
?>

<div id="back_button">
        <a href="index.php" class="text-warning" style="font-size: larger; margin-left: 10px;"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
    </div>
 <div class="row" style="margin-top: 8%; margin-right: -70%; margin-left: 30%;" >
   <div class="col-md-10">
<div class="card my-10" style="Color:black">
<div>
            Posted by: <p1 style="color: red"><?php echo htmlentities ($row['posted']);?></p1>
</div><div>
            Post Title:<h2 class="card-title" style="color: blue"> <?php echo ucwords ($row['posttitle']);?></h2>
</div>
               
 <img class="img-fluid rounded" src="../postimages/<?php echo htmlentities($row['PostImage']);?>" alt="<?php echo htmlentities($row['posttitle']);?>">
 <p style="color: black">Posted Details:</p>
 <div>
             <textarea class="textdisable" texct-color="black" disabled='disabled' rows="10" cols="83"><?php 
               $pt=$row['postdetails'];
              echo  (substr($pt,0));?></textarea>
             </div>
          </div>
</div>
</div> 
     
<?php } ?> 

    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  </body>

</html>
</div>
</div>