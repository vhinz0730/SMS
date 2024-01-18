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


  <div id="back_button">
        <a href="index.php" class="text-warning" style="font-size: larger; margin-left: 10px;"><i class="fa fa-chevron-left" aria-hidden="true"></i> Back</a>
    </div>
    <br></br>

<?php 

     if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 8;
        $offset = ($pageno-1) * $no_of_records_per_page;
        $total_pages_sql = "SELECT COUNT(*) FROM tblposts";
        $result = mysqli_query($database,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);


$query=mysqli_query($database,"select tblposts.posted as posted, tblposts.id as pid,tblposts.PostTitle as posttitle,tblposts.PostImage,tblcategory.CategoryName as category,tblcategory.id as cid,tblsubcategory.Subcategory as subcategory,tblposts.PostDetails as postdetails,tblposts.PostingDate as postingdate,tblposts.PostUrl as url from tblposts left join tblcategory on tblcategory.id=tblposts.CategoryId left join  tblsubcategory on  tblsubcategory.SubCategoryId=tblposts.SubCategoryId where tblposts.Is_Active=1 order by tblposts.id desc  LIMIT $offset, $no_of_records_per_page");
while ($row=mysqli_fetch_array($query)) {
?>
<?php if ($row['posted'] == $useremail){
    echo '
<div class="card mb-5">
<div class="container bg-dark">
<img class="card-img-top" src="../postimages/'.$row['PostImage'].'" alt="'.$row['posttitle'].'">
<div class="card-body">
<h2 class="card-title">Title: '.$row['posttitle'].'"</h2>
<p class="card-title">Details: '.$row['postdetails'].'"</p>
</div>
<div class="card-footer text-muted">
Posted on '.$row['postingdate'].'           
</div>
<div><a href="post-edit.php?action=edit&pid='.$row['pid'].'" class="btn btn-warning btn-sm">EDIT</a>
<br>
<a href="?action=delete&pid='.$row['pid'].'" class="btn btn-danger btn-sm">DELETE</a>
<br></br>
</div>
</div>
<br></br>
';} ?>
<?php } ?>

    <ul class="pagination justify-content-center mb-4">
        <li class="page-item"><a href="?pageno=1"  class="page-link">First</a></li>
        <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>" class="page-link">Prev</a>
        </li>
        <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?> page-item">
            <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?> " class="page-link">Next</a>
        </li>
        <li class="page-item"><a href="?pageno=<?php echo $total_pages; ?>" class="page-link">Last</a></li>
    </ul>

        </div>
      </div>
    </div>

  
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</head>
  </body>
</html>
</div>
</div>



<?php 
    if(isset($_GET["pid"])) {
    $pid=$_GET["pid"];
    $action=$_GET["action"];
    if($action=='edit') {
    }}
?>
        
        <?php 
    if(isset($_GET["pid"])) {
    $pid=$_GET["pid"];
    $action=$_GET["action"];
    if($action=='delete') {
        echo '
    <div class="overlay">
    <div class="popup text-center">
    <a class="close" href="post-manager.php">&times;</a>
    <img src="../asset/img/ww.gif" width="50%" style="margin-bottom: 10px;">
    <h3>Are you sure you want to delete this post?</h3>
    <a href="post-delete.php" class="btn btn-success btn-sm">No</a>
    <a href="post-delete.php?pid='.$pid.'" class="btn btn-danger btn-sm">Yes</a>
    </div>
    </div>
    ';
        

    }}
?>




<?php include "section/footer.php" ?>