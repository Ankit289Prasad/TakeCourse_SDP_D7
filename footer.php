<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy 2022 | Designed by<b class="fh1"> Group D7 </b>
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
            let progressHeight = (window.pageYOffset/totalHeight)*100;
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