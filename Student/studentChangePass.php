<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
$stuName="Change Password";
define('PAGE', 'studentChangePass');
include('./header.php'); 
include_once('../dbConnection.php');

 if(isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }

 if(isset($_REQUEST['stuPassUpdateBtn'])){
  if(($_REQUEST['stuNewPass'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-warning col-sm-6" role="alert"> Fill All Fileds </div></div>';
  } else {
    $sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
     $stuPass = $_REQUEST['stuNewPass'];
     $sql = "UPDATE student SET stu_pass = '$stuPass' WHERE stu_email = '$stuEmail'";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $passmsg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-success col-sm-6" role="alert"> Updated Successfully </div></div>';
      } else {
       // below msg display on form submit failed
       $passmsg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-danger col-sm-6" role="alert"> Unable to Update </div></div>';
      }
    }
   }
}

?>

<div class="col-sm-5 col-md-5 jumbotron1 mx-3 mt-3">
      <form method="POST">
        <?php if(isset($passmsg)) {echo $passmsg; } ?>
        <div class="form-group">
          <label for="inputEmail">Email</label>
          <input type="email" class="form-control shadow-none" id="inputEmail" value=" <?php echo $stuEmail ?>" readonly>
        </div>
        <div class="form-group">
          <label for="inputnewpassword">New Password</label>
          <input type="password" class="form-control shadow-none" id="inputnewpassword" placeholder="New Password" name="stuNewPass">
        </div>
        <button type="submit" class="btn searchbtnsr text-white mr-4 mt-4" name="stuPassUpdateBtn">Update</button>
        <button type="reset" class="btn btn-secondary shadow-none mt-4">Reset</button>
        
      </form>
</div>

 </div> <!-- Close Row Div from header file -->
</div>
<?php if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]))
    {
    echo '<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy 2022 &nbsp|&nbsp Designed by <b class="fh1"> Group D7 </b> &nbsp|
       <a href="../index.php">&nbsp Home Page</a></small>
    </footer>';
    }else{
      echo '<footer class="container-fluid bg-dark text-center p-2 fixed-bottom">
        <small class="text-white">Copyright &copy 2022 &nbsp|&nbsp Designed by <b class="fh1"> Group D7 </b> &nbsp|
       <a href="../index.php">&nbsp Home Page</a></small>
    </footer>';
    }
    ?>
    <script type="text/javascript">
        let progress = document.getElementById('progressbar');
        let totalHeight = document.body.scrollHeight - window.innerHeight;
        window.onscroll = function(){
            let progressHeight = (window.pageYOffset/totalHeight)*100;
            progress.style.height = progressHeight + "%";
        }
    </script>
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