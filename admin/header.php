<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <meta http-equiv="X-UA-Compatible" content="ie=edge">
 <meta name="theme-color" content="rgb(37, 0, 34)">
 <title>
  <?php echo TITLE ?>
 </title>
<link rel="icon" href="./icon.ico" type="image/x-icon">
<link rel="stylesheet" href="../css/bootstrap.min.css">
<link rel="stylesheet" href="../css/all.min.css">
 <link rel="preconnect" href="https://fonts.gstatic.com">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

 <!-- Custom CSS -->
 <link rel="stylesheet" href="../css/admin1style1.css">

</head>

<body>
 <!-- Top Navbar -->
 <div id="progressbar"></div>
    <div id="scrollPath"></div>
 <nav class="navbar navbar-dark p-0 shadow">
  <a class="navbar-brand col-sm-3 col-md-2 col-12 mr-0" href="../index.php">Take Course <small class="text-white">Admin Panel</small></a> 
 </nav>

 <!-- Side Bar -->
 <div class="container-fluid mb-5">
  <div class="row">
   <nav class="col-sm-3 col-md-2 bg-light sidebar py-4 d-print-none">
    <div class="sidebar-sticky">
     <ul class="nav flex-column">
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'dashboard') {echo 'active';} ?>" href="adminDashboard.php">
        <i class="fas fa-tachometer-alt"></i>
        &nbsp;&nbsp;Dashboard
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'courses') {echo 'active';} ?>" href="courses.php">
        <i class="fas fa-book-reader"></i>
        &nbsp;&nbsp;Courses
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'lessons') {echo 'active';} ?>" href="lessons.php">
        <i class="fas fa-scroll"></i>
        &nbsp;&nbsp;Lessons
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'students') {echo 'active';} ?>" href="students.php">
        <i class="fas fa-users"></i>
        &nbsp;Students
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'sellreport') {echo 'active';} ?>" href="sellReport.php">
        <i class="fas fa-table"></i>
        &nbsp;&nbsp;Sell Report
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'paymentstatus') {echo 'active';} ?>" href="adminPaymentStatus.php">
        <i class="fas fa-rupee-sign"></i>
        &nbsp;&nbsp;Payment Status
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'feedback') {echo 'active';} ?>" href="feedback.php">
        <i class="fa fa-star-half-alt"></i>
        &nbsp;&nbsp;Feedback
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link <?php if(PAGE == 'changepass') {echo 'active';} ?>" href="adminChangePass.php">
        <i class="fas fa-key"></i>
        &nbsp;&nbsp;Change Password
       </a>
      </li>
      <li class="nav-item">
       <a class="nav-link" href="../logout.php">
        <i class="fas fa-sign-out-alt"></i>
        &nbsp;&nbsp;Logout
       </a>
      </li>
     </ul>
    </div>
   </nav>