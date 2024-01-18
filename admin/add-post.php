<?php

session_start();

if(isset($_SESSION["user"])) {
    if(($_SESSION["user"])=="" or $_SESSION['usertype']!='admin') {
        header("location: ../signin.php");
    } else {
    $useremail=$_SESSION["user"];
  }
} else {
    header("location: ../signin.php");
}

require_once "../include/connection.php";


$userrow = $database->query("SELECT * FROM admin WHERE admin_email='$useremail'");
$userfetch=$userrow->fetch_assoc();
$userid= $userfetch["admin_id"];
$username=$userfetch["admin_name"];



include "section/header.php";
include "section/sidebar.php";


if(isset($_POST['submit']))
{
$posttitle=$_POST['posttitle'];
$catid=$_POST['category'];
$subcatid=$_POST['subcategory'];
$postdetails=$_POST['postdescription'];
$arr = explode(" ",$posttitle);
$url=implode("-",$arr);
$imgfile=$_FILES["postimage"]["name"];

$extension = substr($imgfile,strlen($imgfile)-4,strlen($imgfile));

$allowed_extensions = array(".jpg","jpeg",".png",".gif",".JPG",".JPEG",".PNG",".GIF","" );

if(!in_array($extension,$allowed_extensions))
{
echo '
<div class="overlay">
<div class="popup text-center">
<a class="close" href="add-post.php">&times;</a>
<img src="../asset/img/error.gif" width="50%" style="margin-bottom: 10px;">
<h3>Invalid Format</h3>
<a href="add-post.php" class="btn btn-danger btn-sm">Okay</a>
</div>
</div>
';
}
else
{
$imgnewfile=md5($imgfile).$extension;
move_uploaded_file($_FILES["postimage"]["tmp_name"],"../postimages/".$imgnewfile);
$status=1;
$query=mysqli_query($database,"insert into tblposts(posted,PostTitle,CategoryId,SubCategoryId,PostDetails,PostUrl,Is_Active,PostImage) values('$useremail','$posttitle','$catid','$subcatid','$postdetails','$url','$status','$imgnewfile')");
if($query)
{
    echo '
    <div class="overlay">
    <div class="popup text-center">
    <a class="close" href="add-post.php">&times;</a>
    <img src="../asset/img/success.gif" width="50%" style="margin-bottom: 10px;">
    <h3>Post is now available!</h3>
    <a href="add-post.php" class="btn btn-success btn-sm">Okay</a>
    </div>
    </div>
    ';
}
else{
$error="Something went wrong . Please try again.";    
} 

}
}
?>



<div class="main">
<div class="container text-white">
<form name="addpost" method="post" enctype="multipart/form-data">
<div class="form-group m-b-20">
<h4 class="m-b-30 m-t-0 header-title"><b>Post Title</b><h4>
<input type="text" class="form-control" id="posttitle" name="posttitle" placeholder="Enter title" required>
</div>
<div class="row">
<div class="col-sm-12">
 <div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Post Details</b></h4>
<textarea class="summernote" name="postdescription" rows="10" cols="40" required></textarea>
</div>
</div>
</div>
<div class="row">
<div class="col-sm-12">
<div class="card-box">
<h4 class="m-b-30 m-t-0 header-title"><b>Feature Image</b></h4>
<input type="file" class="form-control" id="postimage" name="postimage">
</div>
</div>
</div>
<button type="submit" name="submit" class="btn btn-success waves-effect waves-light">Save and Post</button>
 <button type="button" class="btn btn-danger waves-effect waves-light">Discard</button>
                                        </form>
                                    </div>
                                </div> 
                            </div> 
                        </div>

                    </div> </div></div></div>
       