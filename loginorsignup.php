<?php 
session_start();
  include('./dbConnection.php');
  // Header Include from mainInclude 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="Ankit Prasad">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="theme-color" content="rgb(32, 0, 44)">
    <link rel="icon" href="icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
    <?php include './css/style.php'; ?>
    <link rel="stylesheet" href="./css/owl.theme.min.css">
    <link rel="stylesheet" href="./css/testyslider.css">
    <link rel="stylesheet" href="./css/owl.min.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <title>Take Course</title>
</head>

<body id="top" data-spy="scroll" data-target=".navbar" data-offset="60">
    <div id="progressbar"></div>
    <div id="scrollPath"></div>
    <div id="course"></div>
    <nav class="navbar navbar-expand-sm navbar-dark pl-5">
        <a class="navbar-brand" href="index.php">Take Course</a>
        <span class="navbar-text pl-3">Always Deliver's Quality</span>
        <div class="pr-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup"
                aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon dark-bg"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
            <ul class="navbar-nav custom-nav">
                <li class="nav-item custom-nav-item"><a href="./index.php#home" class="nav-link">Home</a></li>
                <li class="nav-item custom-nav-item"><a href="#course" class="nav-link">Courses</a></li>
                <li class="nav-item custom-nav-item"><a href="./paymentstatus.php" class="nav-link">Payment Status</a></li>
                <?php 
                    if(isset($_SESSION['is_login'])){
                        echo '<li class="nav-item custom-nav-item"><a href="./Student/studentProfile.php" class="nav-link">My Profile</a></li>
                        <li class="nav-item custom-nav-item"><a href="./logout.php" class="nav-link">Log Out</a></li>';
                    }else if(isset($_SESSION['is_admin_login'])){
                        echo '<li class="nav-item custom-nav-item"><a href="./logout.php" class="nav-link">Log Out</a></li>';
                    }
                ?>
                
                <li class="nav-item custom-nav-item"><a href="./index.php#Feedback" class="nav-link">Feedback</a></li>
                <li class="nav-item custom-nav-item"><a href="./index.php#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>
    <div class="containr-fluid cb">
        <div class="row">
            <img src="./image/Course/banncor.jpg" alt="Courses"
                style="margin-top:-170px; height:100%; width:100%; object-fit:cover; box-shadow:10px;" />
        </div>
    </div>
    <div class="row">
      <div class="col-md-1 col-sm-1"></div>
        <div class="col-sm-4 col-md-4 jumbotron1 mx-5 mt-3 mb-3">
        <?php if(isset($_SESSION['is_admin_login'])){ 
          echo '<div class="d-flex text-center justify-content-center"><div class="alert alert-warning col-sm-10" role="alert"> Admin Should Log Out First! </div></div>';}?>
            <h5 class="mb-3 text-center"><b>If Already Registered !! Login</b></h5>
            <form role="form" id="stuLoginForm">
                <div class="form-group">
                    <i class="fas fa-envelope"></i><label for="stuLogEmail"
                        class="pl-2 font-weight-bold">Email</label><small id="statusLogMsg1"></small><input type="email"
                        class="form-control shadow-none " placeholder="Email" name="stuLogEmail" id="stuLogEmail">
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="stuLogPass"
                        class="pl-2 font-weight-bold">Password</label><input type="password"
                        class="shadow-none  form-control" placeholder="Password" name="stuLogPass" id="stuLogPass">
                </div>
                <button type="button" class="btn searchbtnsr text-white shadow-none" id="stuLoginBtn"
                    onclick="checkStuLogin()">Login</button>
                    <?php if(isset($_SESSION['is_admin_login'])){?> <script> document.getElementById("stuLoginBtn").disabled = true; </script> <?php }?>
            </form><br />
            <small id="statusLogMsg"></small>
        </div>
        <div class="col-sm-4 col-md-4 jumbotron1 mx-5 mt-3 mb-3">
            <h5 class="mb-3 text-center"><b>New User !! Sign Up</b></h5>
            <form role="form" id="stuRegForm">
                <div class="form-group">
                    <i class="fas fa-user"></i><label for="stuname" class="pl-2 font-weight-bold">Name</label><small
                        id="statusMsg1"></small><input type="text" class="form-control shadow-none " placeholder="Name"
                        name="stuname" id="stuname">
                </div>
                <div class="form-group">
                    <i class="fas fa-envelope"></i><label for="stuemail"
                        class="pl-2 font-weight-bold">Email</label><small id="statusMsg2"></small><input type="email"
                        class="form-control shadow-none " placeholder="Email" name="stuemail" id="stuemail">
                    <small class="form-text">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <i class="fas fa-key"></i><label for="stupass" class="pl-2 font-weight-bold">New
                        Password</label><small id="statusMsg3"></small><input type="password"
                        class="shadow-none form-control" placeholder="Password" name="stupass" id="stupass">
                </div>
                <button type="button" class="btn searchbtnsr text-white shadow-none" id="signup" onclick="addStu()">Sign
                    Up</button>
            </form> <br />
            <small id="successMsg"></small>
        </div>
    </div>
    <hr />

    <?php 
// Contact Us
include('./contact.php'); 
?>

    <?php 
  // Footer Include from mainInclude 
  include('./footer.php'); 
?>