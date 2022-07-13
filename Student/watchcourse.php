<?php
if(!isset($_SESSION)){ 
   session_start(); 
 }
include('../dbConnection.php');

 if(isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../icon.ico" type="image/x-icon">

    <title>Watch Course</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="../css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="../css/stustyl13.css">
</head>

<body>
    <div id="progressbar"></div>
    <div id="scrollPath"></div>
    <div class="container-fluid bgwc shadow">
        <div class="d-flex">
            <h3 class="my-2 wch">Welcome to E-Learning</h3>
            <a class="btn searchbtnsr1 ml-4 mr-2 my-2" href="./myCourse.php">My Courses&nbsp&nbsp<i
                    class="far fa-arrow-alt-circle-left"></i></a>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-3 border-right bg-light pb-3">
                <h5 class="text-center tabh text-white mt-3">Lessons</h5>
                <ul id="playlist" class="nav flex-column">
                    <?php
             if(isset($_GET['course_id'])){
              $course_id = $_GET['course_id'];
              $sql = "SELECT * FROM lesson WHERE course_id = '$course_id'";
              $result = $conn->query($sql);
              $c=1;
              if($result->num_rows > 0){
               $row = $result->fetch_assoc();
               echo '<li class="lessons active border-bottom py-2 '; if(PAGE == 'profile') {echo 'active';}; echo '" movieurl='.$row['lesson_link'].' style="cursor: pointer;">';echo '&nbsp&nbsp'.$c.'.&nbsp';echo ''. $row['lesson_name'] .'</li>';
               while($row = $result->fetch_assoc()){
                  $c=$c+1;
                echo '<li class="lessons border-bottom py-2 '; if(PAGE == 'profile') {echo 'active';}; echo '" movieurl='.$row['lesson_link'].' style="cursor: pointer;">';echo '&nbsp&nbsp'.$c.'.&nbsp';echo ''. $row['lesson_name'] .'</li>';
               }
              }
             }
          ?>
                </ul>
            </div>
            <div class="col-sm-8">
                <video id="videoarea" src="" class="mt-3 mx-2" type="video/mp4" controls>
                </video>
            </div>
        </div>
    </div>
    <?php 
    echo '<footer class="container-fluid bg-dark text-center p-2 fixed-bottom zix">
        <small class="text-white">Copyright &copy 2022 &nbsp|&nbsp Designed by <b class="fh1">Group D7 </b> &nbsp|
       <a href="../index.php">&nbsp Home Page</a></small>
    </footer>';
    ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script type="text/javascript">
    $('#playlist li').click(function() {
        $(this).addClass('active').siblings().removeClass('active');
    });
    let progress = document.getElementById('progressbar');
    let totalHeight = document.body.scrollHeight - window.innerHeight;
    window.onscroll = function() {
        let progressHeight = (window.pageYOffset / totalHeight) * 100;
        progress.style.height = progressHeight + "%";
    }
    </script>
    <!-- Jquery and Boostrap JavaScript -->
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>

    <!-- Font Awesome JS -->
    <script type="text/javascript" src="../js/all.min.js"></script>

    <!-- Ajax Call JavaScript -->
    <!-- <script type="text/javascript" src="..js/ajaxrequest.js"></script> -->

    <!-- Custom JavaScript -->
    <script type="text/javascript" src="../js/custom.js"></script>
</body>

</html>