<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About |Kansi National High School</title>
    <link href="asset/css/style.css" rel="stylesheet">
    <link href="asset/css/bootstrap.css" rel="stylesheet">
    <link href="asset/css/animation.css" rel="stylesheet">
    <link href="asset/css/aos.css" rel="stylesheet">
    <link href="asset/img/logo.png" rel="icon">
    <!-- Slick slider -->
    <link href="asset/css/slick.css" rel="stylesheet">
    <style>
      div {
          animation: transitionIn-Y-bottom 1s;
      }
    </style>
</head>
<body>

<!-- header -->
<header class="p-3 text-bg-dark" style="font-size: large;">
  <div class="container">
    <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

      <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
        <li><a href="index.php" class="nav-link px-2 text-white">Home</a></li>
        <li><a href="about.php" class="nav-link px-2 text-warning">About</a></li>
      </ul>
      
      <div class="text-end">
        <a href="signin.php" type="button" class="btn btn-outline-light me-2">Sign in</a>
        <a href="signup.php" type="button" class="btn btn-warning">Enroll Now!</a>
      </div>

    </div>
  </div>
</header>

<!-- content -->
<main class="bg-dark text-white">
  <div class="px-4 py-4 my-4 text-center">

    <h1 class="display-5 fw-bold">About <span class="text-warning">Us</span></h1>
    <img data-aos="fade-up" src="asset/img/276737ae927e2cac648b99fed4f5d551.gif" class="d-block mx-lg-auto rounded img-fluid" alt="About us" width="500" height="400" loading="lazy">

    <div class="col-lg-6 mx-auto" style="margin-top: 10px;">
      <p class="lead mb-4">
      “Striving for Excellence, Shaping the Future”
      </p>
      <p data-aos="fade-up" class="lead mb-4" style="margin-top: 10px;">
      “Dedicated to Learning, Committed to Success”
      </p>
      <p data-aos="fade-up" style="margin-top: 100px;">
        
      </p>
      <p data-aos="fade-up">Call us: 09851327080</p>
      <p data-aos="fade-up">Email us: vncnt.gallarde@gmail.com</p>
    </div>
    
  </div>
</main>

<!-- footer -->
<?php include "section/footer.php"; ?>

<script src="asset/js/bootstrap.bundle.js"></script>
<script src="asset/js/aos.js"></script>
<script src="asset/js/jquery-3.6.1.min.js"></script>
<script src="asset/js/slick.min.js"></script>
<script type="text/javascript">
  AOS.init({
    duration: 1500,
  }
  );
</script>
</body>
</html>