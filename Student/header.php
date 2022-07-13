<?php 
include_once('../dbConnection.php');
 if(!isset($_SESSION)){ 
   session_start(); 
 } 
 if(isset($_SESSION['is_login'])){
  $stuLogEmail = $_SESSION['stuLogEmail'];
 } 
 // else {
 //  echo "<script> location.href='../index.php'; </script>";
 // }
 if(isset($stuLogEmail)){
  $sql = "SELECT stu_img FROM student WHERE stu_email = '$stuLogEmail'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $stu_img = $row['stu_img'];
 }
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 
 <meta name="theme-color" content="rgb(32, 0, 44)">
 <title>
  <?php echo $stuName ?>
 </title>
<link rel="icon" href="../icon.ico" type="image/x-icon">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/all.min.css">
 <link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="../css/stustyl13.css">

</head>

<body>
 <!-- Top Navbar -->
 <div id="progressbar"></div>
    <div id="scrollPath"></div>
 <nav class="navbar navbar-dark p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 col-12 mr-0" href="../index.php">Take Course <small class="text-white">Student Dashboard </small></a> 
 </nav>

 <!-- Side Bar -->
 <div class="container-fluid mb-5 zzdx">
  <div class="row">
   <nav class="col-sm-2 bg-light sidebar py-4 d-print-none">
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
       <?php
       if($stu_img==""){
      echo '<li class="nav-item mb-3 d-flex justify-content-center">
      <div class="profile-pic">
      <img src="../image/stu/alt.jpg" class="img-thumbnail rounded-circle">
      </div>
      </li>';
    }
    else{
      echo '<li class="nav-item mb-3 d-flex justify-content-center">
      <div class="profile-pic">
      <img src="';echo $stu_img; echo '" alt="studentImage" class="img-thumbnail rounded-circle">
      </div>
      </li>';}
      ?>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'profile') {echo 'active';} ?>" href="studentProfile.php">
        <i class="fas fa-user"></i>&nbsp
        Profile <span class="sr-only">(current)</span>
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'mycourse') {echo 'active';} ?>" href="myCourse.php">
        <i class="fa fa-book"></i>&nbsp
        My Courses
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'feedback') {echo 'active';} ?>" href="stufeedback.php">
        <i class="fas fa-star-half-alt"></i>&nbsp
        Feedback
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'studentChangePass') {echo 'active';} ?>" href="studentChangePass.php">
        <i class="fas fa-key"></i>&nbsp
        Change Password
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../logout.php">
        <i class="fas fa-sign-out-alt"></i>&nbsp
        Logout
       </a>
      </li>
     </ul>
    </div>
   </nav>