<?php   session_start(); ?>
<?php
  include('./dbConnection.php');    
	$ORDER_ID = "";
	
	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {
		$ORDER_ID = $_POST["ORDER_ID"];
	}

?>  
<!DOCTYPE html>
<html lang="en">

<head>
    <meta name="author" content="Ankit Prasad">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <div id="ps"></div>
    <nav class="navbar navbar-expand-sm navbar-dark pl-5 fixed-top">
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
                <li class="nav-item custom-nav-item"><a href="./index.php#course" class="nav-link">Courses</a></li>
                <li class="nav-item custom-nav-item"><a href="#ps" class="nav-link">Payment Status</a></li>
                <?php 
                    if(isset($_SESSION['is_login'])){
                        echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link">My Profile</a></li>
                        <li class="nav-item custom-nav-item"><a href="./logout.php" class="nav-link">Log Out</a></li>';
                    }else{
                        echo '<li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-toggle="modal" data-target="#stuRegModalCenter">Sign Up</a></li>
                        <li class="nav-item custom-nav-item"><a href="#" class="nav-link" data-target="#stuLoginModalCenter" data-toggle="modal">Login</a></li>';
                    }
                ?>  
                <li class="nav-item custom-nav-item"><a href="./index.php#Feedback" class="nav-link">Feedback</a></li>
                <li class="nav-item custom-nav-item"><a href="./index.php#contact" class="nav-link">Contact</a></li>
            </ul>
        </div>
    </nav>
    <div class="pcd">
    <div class="containr-fluid">
        <div class="row cb">
            <div class="col-md-8 col-12">
                <img src="./image/banpay.jpg" alt="Courses" style="height:100%; width:80%;object-fit:contain; box-shadow:10px;"/>
            </div>
            <div class="col-md-4 col-12 mt-5">
            <div class="container pst">
                <h3 class="text-center"><b>Payment Status</b></h3>
                <form action="" method="post">
                    <div class="form-group row as">
                        <lable class="offset-sm-3 col-form-label lbl pl-5">Order ID: </lable>
                        <div><input type="text" class="shadow-none form-control ml-3" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>"></div>
                        <div><input type="submit" value="View" class="shadow-none btn searchbtnsr text-white ml-5" name="viewBill"></div>
                    </div>
                </form>
           
    
    <div class="container mt-5 " id="section-to-print">
    <?php
      if(isset($_REQUEST['viewBill']))
      if ($_POST['ORDER_ID']!="")
      { 
        $sql = "SELECT order_id FROM courseorder";
        $result = $conn->query($sql);
        $c=0;
        while($row = $result->fetch_assoc()){
          if($_POST["ORDER_ID"] == $row["order_id"]){ $c=1;?>
            <div class="row justify-content-center">
              <div class="col-auto">
                <h2 class="text-center">Payment Receipt</h2>
                <table class="table table-bordered">
                  <tbody>
                      <tr class="Bill row1">
                        <td><label>Order ID</label></td>
                        <td><?php if (isset($row["order_id"])) echo $row["order_id"] ?></td>
                      </tr>
                      <tr class="row2">
                        <td><label>Status</label></td>
                        <td>Success</td>
                      </tr>
                      <tr class="row1">
                        <td></td>
                          <td><button class="btn searchbtnsr text-white shadow-none" onclick="javascript:window.print();">Print Receipt</button></td>
                      </tr>
                    </tbody>
                  </table>      
                </div>
              </div>
      <?php break;
      }
      }
      if($c==0){
        echo '<div class="d-flex text-center justify-content-center"><div class="alert alert-danger mr-3 col-sm-6 mt-2" role="alert"> Invalid Order ID!!</div></div>';
      }
      }
      else{
        echo '<div class="d-flex text-center justify-content-center"><div class="alert alert-warning mr-3 col-sm-6 mt-2" role="alert"> Please Enter Order ID!!</div></div>';
      }
      ?>
 </div>
        </div>
    </div>
    </div> 
</div>
    <!--Contact Us start-->
    <div class="container mt-4" id="contact">
    <h2 class="text-center mb-4"><b>Contact US!</b></h2>
    <div class="row">
        <div class="col-md-8">
            <form action="" method="POST">
                <input type="text" class="form-control shadow-none" name="name" placeholder="Name"><br>
                <input type="text" class="form-control shadow-none"" name="subject" placeholder="Subject"><br>
                <input type="email" class="form-control shadow-none"" name="email" placeholder="E-mail"><br>
                <textarea style="height: 150px;" name="message" placeholder="How can we help you?" class="form-control shadow-none"></textarea><br>
                <div class="tc">
                <input type="submit" class="btn searchbtnsr text-white shadow-none" value="Send" name="submit"><br><br></div>
            </form>
        </div>
        <div class="col-md-4 stripe shadow-lg text-white text-center">
            <h4><b>Take Course</b></h4>
            <p>Institute of Technical Education and Research, SOA University<br/> Phone: +919876543211<br/> takecourse2022@gmail.com
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