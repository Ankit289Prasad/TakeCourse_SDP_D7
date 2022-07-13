<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Change Password');
define('PAGE', 'changepass');
include('./header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
 $adminEmail = $_SESSION['adminLogEmail'];
 if(isset($_REQUEST['adminPassUpdatebtn'])){
  if(($_REQUEST['adminPass'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="alert alert-warning col-sm-6 mt-2" role="alert"> Fill All Fileds </div>';
  } else {
    $sql = "SELECT * FROM admin WHERE admin_email='$adminEmail'";
    $result = $conn->query($sql);
    if($result->num_rows == 1){
     $adminPass = $_REQUEST['adminPass'];
     $sql = "UPDATE admin SET admin_pass = '$adminPass' WHERE admin_email = '$adminEmail'";
      if($conn->query($sql) == TRUE){
       // below msg display on form submit success
       $passmsg = '<div class="alert alert-success col-sm-6 mt-2" role="alert"> Updated Successfully </div>';
      } else {
       // below msg display on form submit failed
       $passmsg = '<div class="alert alert-danger col-sm-6 mt-2" role="alert"> Unable to Update </div>';
      }
    }
   }
}
 ?>

  <div class="col-sm-9">
   <div class="row">
     <div class="col-sm-6">
       <form class="mt-3 mx-3">
         <div class="form-group">
           <label for="inputEmail">Email</label>
           <input type="email" class="form-control shadow-none" id="inputEmail" value=" <?php echo $adminEmail ?>" readonly>
         </div>
         <div class="form-group">
           <label for="inputnewpassword">New Password</label>
           <input type="password" class="form-control shadow-none" id="inputnewpassword" placeholder="New Password" name="adminPass">
         </div>
         <button type="submit" class="btn searchbtnsr text-white shadow-none mr-4 mt-3" name="adminPassUpdatebtn">Update</button>
         <button type="reset" class="btn shadow-none btn-secondary mt-3">Reset</button>
         <?php if(isset($passmsg)) {echo $passmsg; } ?>
       </form>
     </div>
   </div>
  </div>
 
 
  </div>  <!-- div Row close from header -->
 </div>  <!-- div Conatiner-fluid close from header -->
 <?php if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]))
    {
    echo'<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy 2021 &nbsp|&nbsp Designed by <b class="fh1"> Ankit Prasad </b> &nbsp|
       <a href="../index.php">&nbsp Home Page</a></small>
    </footer>';}
  ?>
<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/popper.min.js"></script>
<script type="text/javascript" src="../js/bootstrap.min.js"></script>
<script type="text/javascript">
let progress = document.getElementById('progressbar');
let totalHeight = document.body.scrollHeight - window.innerHeight;
window.onscroll = function() {
    let progressHeight = (window.pageYOffset / totalHeight) * 100;
    progress.style.height = progressHeight + "%";
}
</script>

<!-- Font Awesome JS -->
<script type="text/javascript" src="../js/all.min.js"></script>

<!-- Admin Ajax Call JavaScript -->
<script type="text/javascript" src="../js/adminajaxrequest7.js"></script>

<!-- Custom JavaScript -->
<script type="text/javascript" src="../js/custom.js"></script>
</body>

</html>