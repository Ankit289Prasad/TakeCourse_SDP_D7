<?php   session_start(); include('./dbConnection.php');?>
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
    <link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Ubuntu:wght@300&display=swap" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <title>Take Course</title>
</head>

<body id="top" data-spy="scroll" data-target=".navbar" data-offset="60" >
    <div id="progressbar"></div>
    <div id="scrollPath"></div>
    <div id="course"></div>
    <nav class="navbar navbar-expand-sm navbar-dark pl-5">
        <a class="navbar-brand" href="index.php">Take Course</a>
        <span class="navbar-text pl-3">Always Deliver's Quality</span>
        <div class="pr-2">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
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
                    else{
                        echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Sign Up</a></li>
                        <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-target="#stuLoginModalCenter" data-toggle="modal">Login</a></li>';
                    }
                ?>
                
                <li class="nav-item custom-nav-item"><a href="./index.php#Feedback" class="nav-link">Feedback</a></li>
                <li class="nav-item custom-nav-item"><a href="./index.php#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>

    <div class="containr-fluid cb">
        <div class="row">
            <img src="./image/Course/banncor.jpg" alt="Courses" style="margin-top:-170px; height:100%; width:100%; object-fit:cover; box-shadow:10px;"/>
        </div>
    </div>

    <div class="container">
    <?php
          if(isset($_GET['course_id'])){
           $course_id = $_GET['course_id'];
           $_SESSION['course_id'] = $course_id;
           $sql = "SELECT * FROM course WHERE course_id = '$course_id'";
          $result = $conn->query($sql);
          if($result->num_rows > 0){ 
            while($row = $result->fetch_assoc()){
              echo ' 
                <div class="row jbt mx-2">
                <div class="col-md-4">
                  <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top cdtl" alt="Guitar" />
                </div>
                <div class="col-md-8">
                  <div class="card-body">
                    <h5 class="card-title"><b>Course Name: '.$row['course_name'].'</b></h5>
                    <p class="card-text"> <b>Description: </b>'.$row['course_desc'].'</p>
                    <p class="card-text"> <b>Duration: </b>'.$row['course_duration'].'</p>
                    <form action="checkout.php" method="post">
                      <p class="card-text d-inline"><b>Price: </b><small><del>&#8377 '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">&#8377 '.$row['course_price'].'<span></p>
                      <input type="hidden" name="id" value='. $row["course_price"] .'> 
                      <button type="submit" class="btn searchbtnsr text-white font-weight-bolder float-right shadow-none" name="buy">Buy Now</button>
                    </form>
                  </div>
                </div>
                </div>
              ';
            }
          }
         }
        ?>
        <div class="container mt-3">
            <div class="row">
            <?php $sql = "SELECT * FROM lesson";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
          echo '
           <table class="table table-bordered">
             <thead>
               <tr class="hbg  text-center">
                 <th scope="col">Lesson No.</th>
                 <th scope="col">Lesson Name</th>
               </tr>
             </thead>
             <tbody>';
             $num = 0;
             while($row = $result->fetch_assoc()){
              if($row['course_id'] == $course_id) {
               $num++;
              echo ' <tr class="';if($num%2==0)
              echo row1;
              else
              echo row2;
    echo'">
               <th scope="row">'.$num.'</th>
               <td>'. $row["lesson_name"].'</td></tr>';
              }
             }
             echo '</tbody>
           </table>';
            } ?>
            </div>
        </div>
    </div>

    <footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy 2021 | Designed by <b class="fh1"> Group D7 </b>
        <?php 
                    if(isset($_SESSION['is_login'])){
                        echo '</small>';
                    }
                    else if(isset($_SESSION['is_admin_login'])){
                        echo ' | <a href="./admin/adminDashboard.php"> Admin Dashboard</a></small>';
                    }
                    else{
                        echo ' | <a href="#login" data-toggle="modal" data-target="#adminLoginModalCenter"> Admin Login</a></small>';
                    }
            ?>
        
    </footer>
    <!-- Start Student Registration Modal -->
    <div class="modal fade" id="stuRegModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuRegModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stuRegModalCenterTitle">Student Registration</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="clearAllStuReg()">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <?php include('studentRegistration.php'); ?>
                </div>
                <div class="modal-footer">
                    <span id="successMsg"></span>
                    <button type="button" class="btn searchbtnsr text-white shadow-none" id="signup" onclick="addStu()">Sign Up</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="clearAllStuReg()">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Student Registration Modal -->
    <!-- Start Admin Login Modal -->
    <div class="modal fade" id="adminLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="adminLoginModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="adminLoginModalCenterTitle">Admin Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="clearAdminLoginWithStatus()">
            <span aria-hidden="true">&times;</span>
          </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="adminLoginForm">
                        <div class="form-group">
                            <i class="fas fa-envelope"></i><label for="adminLogEmail" class="pl-2 font-weight-bold">Email</label><small id="statusAdminLogMsg1"></small><input type="email" class="form-control shadow-none" placeholder="Email" name="adminLogEmail" id="adminLogEmail">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key"></i><label for="adminLogPass" class="pl-2 font-weight-bold">Password</label><small id="statusAdminLogMsg2"></small><input type="password" class="form-control shadow-none" placeholder="Password" name="adminLogPass" id="adminLogPass">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <small id="statusAdminLogMsg"></small>
                    <button type="button" class="btn text-white searchbtnsr shadow-none" id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal" onClick="clearAdminLoginWithStatus()">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Admin Login Modal -->
    <!-- Start Student Login Modal -->
    <div class="modal fade" id="stuLoginModalCenter" tabindex="-1" role="dialog" aria-labelledby="stuLoginModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="stuLoginModalCenterTitle">Student Login</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" onClick="clearStuLoginWithStatus()">
                <span aria-hidden="true">&times;</span>
              </button>
                </div>
                <div class="modal-body">
                    <form role="form" id="stuLoginForm">
                        <div class="form-group">
                            <i class="fas fa-envelope"></i><label for="stuLogEmail" class="pl-2 font-weight-bold">Email</label><small id="statusLogMsg1"></small><input type="email" class="form-control shadow-none" placeholder="Email" name="stuLogEmail" id="stuLogEmail">
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key"></i><label for="stuLogPass" class="pl-2 font-weight-bold">Password</label><small id="statusLogMsg2"></small><input type="password" class="form-control shadow-none" placeholder="Password" name="stuLogPass" id="stuLogPass">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <div id="statusLogMsg"></div>
                    <button type="button" class="btn searchbtnsr text-white shadow-none" id="stuLoginBtn" onclick="checkStuLogin()">Login</button>
                    <button type="button" class="btn btn-secondary shadow-none" data-dismiss="modal" onClick="clearStuLoginWithStatus()">Cancel</button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Student Login Modal -->
    <script type="text/javascript">
        let progress = document.getElementById('progressbar');
        let totalHeight = document.body.scrollHeight - window.innerHeight;
        window.onscroll = function(){
            let progressHeight = (window.pageYOffset/totalHeight)*100;
            progress.style.height = progressHeight + "%";
        }
    </script> 
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script src="./js/all.min.js"></script>
    <script type="text/javascript" src="./js/owl.min.js"></script>
    <script type="text/javascript" src="./js/testyslider.js"></script>
    <script type="text/javascript" src="./js/ajaxrequet5.js"></script>
    <script type="text/javascript" src="./js/adminajaxrequest7.js"></script>
</body>

</html>