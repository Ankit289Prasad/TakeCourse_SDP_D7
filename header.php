<?php   session_start(); ?>
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
    <link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display&display=swap" rel="stylesheet">
    <title>Take Course</title>
</head>

<body id="top" data-spy="scroll" data-target=".navbar" data-offset="60">
    <div id="progressbar"></div>
    <div id="scrollPath"></div>
    <div id="home"></div>
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
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
                <li class="nav-item custom-nav-item"><a href="#home" class="nav-link">Home</a></li>
                <li class="nav-item custom-nav-item"><a href="#course" class="nav-link">Courses</a></li>
                <li class="nav-item custom-nav-item"><a href="./paymentstatus.php" class="nav-link">Payment Status</a>
                </li>
                <?php 
                    if(isset($_SESSION['is_login'])){
                        echo '<li class="nav-item custom-nav-item"><a href="./Student/studentProfile.php" class="nav-link">My Profile</a></li>
                        <li class="nav-item custom-nav-item"><a href="./logout.php" class="nav-link">Log Out</a></li>';
                    }else if(isset($_SESSION['is_admin_login'])){
                        echo '<li class="nav-item custom-nav-item"><a href="./logout.php" class="nav-link">Log Out</a></li>';
                    }
                    else{
                        echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Sign Up</a></li>
                        <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-target="#stuLoginModalCenter" data-toggle="modal">Login</a></li>';
                    }
                ?>

                <li class="nav-item custom-nav-item"><a href="#Feedback" class="nav-link">Feedback</a></li>
                <li class="nav-item custom-nav-item"><a href="#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>