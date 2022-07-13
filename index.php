<?php include('./header.php');
include('./dbConnection.php');?>
    <div class="container-fluid remove-vid-marg">
        <div class="vid-parent">
            <video playsinline autoplay muted loop>
                <source src="video/banvid.mp4">
            </video>
            <div class="vid-overlay"></div>
        </div>
        <div class="vid-content">
            <h1 class="my-content h">Welcome to Take Course</h1>
            <small class="my-content">Always Deliver's Quality</small><br>
            <?php 
                    if(isset($_SESSION['is_login'])){
                        echo '<a href="./Student/studentProfile.php" class="btn btn-lg text-white shadow-none btn-sm">My Profile</a>';
                    }
                    else{
                        echo '<a href="#" class="btn btn-lg text-white shadow-none btn-sm" data-toggle="modal" data-target="#stuRegModalCenter">Get Started</a>';
                    }
            ?>
        </div>
    </div>
    <div class="container-fluid txt-banner">
        <div class="row bottom-banner">
            <div class="col-lg-3 col-md-3 col-6">
                <h5><i class="fas fa-book-open mr-3"></i>100+ Online Course</h5>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <h5><i class="fas fa-users mr-3"></i>Expert Instructors</h5>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <h5><i class="fas fa-keyboard mr-3"></i>Lifetime Access</h5>
            </div>
            <div class="col-lg-3 col-md-3 col-6">
                <h5><i class="fas fa-rupee-sign mr-3"></i>Refund Guranteed</h5>
            </div>
        </div>
    </div>


    <div class="container mt-5 pcourse" id="course">
        <h1 class="text-center"><b>Popular Courses</b></h1>
        <div class="card-deck mt-4">
        <?php
        $sql = "SELECT * FROM course LIMIT 3";
        $result = $conn->query($sql);
        if($result->num_rows > 0){ 
          while($row = $result->fetch_assoc()){
            $course_id = $row['course_id'];
            echo '
            <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
              <div class="card">
              <div class="equal-column-content">
                <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="'.$row['course_name'].'" />
                <div class="card-body">
                  <h5 class="card-title"><b>'.$row['course_name'].'</b></h5>
                  <p class="card-text">'.$row['course_desc'].'</p>
                </div>
                </div>
                <div class="card-footer crbg">
                  <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">&#8377 '.$row['course_price'].'<span></p> <a class="btn searchbtnsr shadow-none text-white font-weight-bolder float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                </div>
              </div>
            </a>  ';
          }
        }
        ?>
        </div>
        <div class="card-deck mt-4">
        <?php
        $sql = "SELECT * FROM course LIMIT 3,3";
        $result = $conn->query($sql);
        if($result->num_rows > 0){ 
          while($row = $result->fetch_assoc()){
            $course_id = $row['course_id'];
            echo '
            <a href="coursedetails.php?course_id='.$course_id.'" class="btn" style="text-align: left; padding:0px; margin:0px;">
              <div class="card">
              <div class="equal-column-content">
                <img src="'.str_replace('..', '.', $row['course_img']).'" class="card-img-top" alt="'.$row['course_name'].'" />
                <div class="card-body">
                  <h5 class="card-title fw-bolder"><b>'.$row['course_name'].'</b></h5>
                  <p class="card-text">'.$row['course_desc'].'</p>
                </div></div>
                <div class="card-footer crbg">
                  <p class="card-text d-inline">Price: <small><del>&#8377 '.$row['course_original_price'].'</del></small> <span class="font-weight-bolder">&#8377 '.$row['course_price'].'<span></p> <a class="btn searchbtnsr text-white font-weight-bolder shadow-none float-right" href="coursedetails.php?course_id='.$course_id.'">Enroll</a>
                </div>
              </div>
            </a>  ';
          }
        }
        ?>
        </div>
        <div class="text-center mt-5 mb-5">
            <a href="./courses.php" class="btn btn-danger shadow-none btn-sm">View All Courses</a>
        </div>
    </div>
    <div class="container-fluid pb-3" id="Feedback" style="background: linear-gradient(to right, #660198, rgb(150, 45, 199),#660198);">
        <h1 class="text-center testyheading p-4"><b>Students's Feedback</b></h1>
        <div class="row">
            <div class="col-md-12">
                <div id="testimonial-slider" class="owl-carosel" >
                <?php 
              $sql = "SELECT s.stu_name, s.stu_occ, s.stu_img, f.f_content FROM student AS s JOIN feedback AS f ON s.stu_id = f.stu_id";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()){
                  $s_img = $row['stu_img'];
                  $n_img = str_replace('../','',$s_img)
            ?>
              <div class="testimonial">
                <p class="description font1" >
                <?php echo $row['f_content'];?>  
                </p>
                <div class="pic">
                  <img src="<?php echo $n_img; ?>" alt=""/>
                </div>
                <div class="testimonial-prof">
                  <h4><?php echo $row['stu_name']; ?></h4>
                  <small><?php echo $row['stu_occ']; ?></small>
                </div>
              </div>
              <?php }} ?>
                </div>
            </div>
        </div>
    </div>
    <!--Contact Us start-->
    <?php
    include('./contact.php');
    ?>
    <!--Contact Us end-->
    <div class="container-fluid txt-banner1">
        <div class="row text-white text-center">
            <div class="col-md-3 col-6 social-hover fb p-2">
            <a href="https://www.linkedin.com/in/ankit-prasad-752365169/" class="text-white" target="_blank" ><i class="fab fa-linkedin"></i> Linkedin</a>
            </div>
            <div class="col-md-3 col-6 social-hover gh p-2">
                <a href="https://github.com/Ankit289Prasad" class="text-white" target="_blank" ><i class="fab fa-github"></i> Github</a>
            </div>
            <div class="col-md-3 col-6 social-hover wa p-2">
                <a href="https://wa.link/qxw2ac" class="text-white" target="_blank" ><i class="fab fa-whatsapp"></i> Whatsapp</a>
            </div>
            <div class="col-md-3 col-6 social-hover ig p-2">
                <a href="https://www.instagram.com/_.ankit._.prasad._" class="text-white" target="_blank" ><i class="fab fa-instagram"></i> Instagram</a>
            </div>
        </div>
    </div>
    <div class="container-fluid p-4" style="background-color: rgb(185, 185, 185);">
        <div class="conatiner">
            <div class="row text-center fsm">
                <div class="col-md-6 col-12">
                    <h4 class="fh"><b>About Us!</b></h4>
                    <p><b>We always deliver's quality.</b><br> Try our courses at cheaper price and give feedback to us.<br> If any issues then please contanct via given email.<br>Our team will resolve the issues within 24 hours.<br><b class=>Happy Learning!</b></p>
                </div>
                <div class="col-md-6 col-12">
                <h4 class="fh"><b>Take Course</b></h4>
                <p>Institute of Technical Education <br>and Research, SOA University<br/> Phone: +919876543211<br/><i> takecourse2022@gmail.com</i>
                </p>
                </div>
            </div>
        </div>
    </div>
    <footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy 2022 | Designed by <b class="fh1"> Group D7 </b>
        <?php 
                    if(isset($_SESSION['is_login'])){
                        echo '</small>';
                    }
                    else if(isset($_SESSION['is_admin_login'])){
                        echo ' | <a href="./admin/adminDashboard.php" class="text-decoration-none"> Admin Dashboard</a></small>';
                    }
                    else{
                        echo ' | <a href="#login" data-toggle="modal" data-target="#adminLoginModalCenter" class="text-decoration-none"> Admin Login</a></small>';
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
                    <button type="button" class="btn searchbtnsr text-white shadow-none" id="adminLoginBtn" onclick="checkAdminLogin()">Login</button>
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
            let progressHeight = (window.pageYOffset/totalHeight)*145;
            progress.style.height = progressHeight + "%";
        }
    </script>
    <script src="./js/jquery.min.js"></script>
    <script src="./js/popper.min.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
        // Change Navbar Color on Scroll
        // $(window).scrollTop() returns the position of the top of the page
        $(window).scroll(function () {
          if($(window).scrollTop() <= 80){
            $(".navbar").addClass('fixed-top');
          }
          else if ($(window).scrollTop() >= 600) {
          $(".navbar").css("background-color", "rgba(101, 37, 138, 0.85)");
          $(".navbar").addClass('fixed-top shadow');
          } else {
          $(".navbar").css("background-color", "transparent");
          $(".navbar").removeClass('fixed-top shadow');
          }
        });
        })
    </script>
    <script src="./js/all.min.js"></script>
    <script type="text/javascript" src="./js/owl.min.js"></script>
    <script type="text/javascript" src="./js/testyslider.js"></script>
    <script type="text/javascript" src="./js/ajaxrequet5.js"></script>
    <script type="text/javascript" src="./js/adminajaxrequest7.js"></script>
    <script type="text/javascript" src="./js/custom.js"></script>
</body>

</html>