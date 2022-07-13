<?php 
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Edit Student');
define('PAGE', 'students');
include('./header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
 // Update
 if(isset($_REQUEST['requpdate'])){
  // Checking for Empty Fields
  if(($_REQUEST['stu_id'] == "") || ($_REQUEST['stu_name'] == "") || ($_REQUEST['stu_email'] == "") || ($_REQUEST['stu_pass'] == "") || ($_REQUEST['stu_occ'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-warning col-sm-6 mt-2" role="alert"> Fill All Fileds!....Try Again!! &nbsp<div class="spinner-border spinner-border-sm text-success" role="status"></div></div></div>';
  } else {
    // Assigning User Values to Variable
    $sid = $_REQUEST['stu_id'];
    $sname = $_REQUEST['stu_name'];
    $semail = $_REQUEST['stu_email'];
    $spass = $_REQUEST['stu_pass'];
    $socc = $_REQUEST['stu_occ'];
    
   $sql = "UPDATE student SET stu_id = '$sid', stu_name = '$sname', stu_email = '$semail', stu_pass='$spass', stu_occ='$socc' WHERE stu_id = '$sid'";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-success col-sm-6 mt-2" role="alert"> Update Successful!! &nbsp<div class="spinner-border spinner-border-sm text-success" role="status"></div></div></div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-danger col-sm-6 mt-2" role="alert"> Unable to Update!....Try Again!! &nbsp<div class="spinner-border spinner-border-sm text-success" role="status"></div></div></div>';
    }
  }
  }
 ?><div class=" col-sm-9 mt-5 mb-3">
<div class="jumbotron1">
  <h3 class="text-center"><b>Update Student Details</b></h3>
  <?php
 if(isset($_REQUEST['view'])){
  $sql = "SELECT * FROM student WHERE stu_id = {$_REQUEST['id']}";
 $result = $conn->query($sql);
 $row = $result->fetch_assoc();
 }
 ?>
  <form action="" method="POST" enctype="multipart/form-data">
  <?php if(isset($msg)) {echo $msg;?> <script>setTimeout(() => {
                        window.location.href = "students.php";
                    }, 3000);</script> <?php } ?>
    <div class="form-group">
      <label for="stu_id">ID</label>
      <input type="text" class="form-control shadow-none" id="stu_id" name="stu_id" value="<?php if(isset($row['stu_id'])) {echo $row['stu_id']; }?>"readonly>
    </div>
    <div class="form-group">
      <label for="stu_name">Name</label>
      <input type="text" class="form-control shadow-none" id="stu_name" name="stu_name" value="<?php if(isset($row['stu_name'])) {echo $row['stu_name']; }?>">
    </div>

    <div class="form-group">
      <label for="stu_email">Email</label>
      <input type="text" class="form-control shadow-none" id="stu_email" name="stu_email" value="<?php if(isset($row['stu_email'])) {echo $row['stu_email']; }?>">
    </div>

    <div class="form-group">
      <label for="stu_pass">Password</label>
      <input type="text" class="form-control shadow-none" id="stu_pass" name="stu_pass" value="<?php if(isset($row['stu_pass'])) {echo $row['stu_pass']; }?>">
    </div>
    <div class="form-group">
      <label for="stu_occ">Occupation</label>
      <input type="text" class="form-control shadow-none" id="stu_occ" name="stu_occ" value="<?php if(isset($row['stu_occ'])) {echo $row['stu_occ']; }?>">
    </div>
    <div class="text-center">
      <button type="submit" class="btn searchbtnsr text-white" id="requpdate" name="requpdate">Update</button>
      <a href="students.php" class="btn btn-secondary">Close</a>
    </div>
  </form>
</div>
</div>
</div>  <!-- div Row close from header -->
</div>  <!-- div Conatiner-fluid close from header -->
<?php if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]))
    {
    echo '<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy 2021 &nbsp|&nbsp Designed by <b class="fh1"> Ankit Prasad </b> &nbsp|
       <a href="../index.php">&nbsp Home Page</a></small>
    </footer>';
    }?>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
    <script type="text/javascript" src="../js/popper.min.js"></script>
    <script type="text/javascript" src="../js/bootstrap.min.js"></script>
    <script type="text/javascript">
        let progress = document.getElementById('progressbar');
        let totalHeight = document.body.scrollHeight - window.innerHeight;
        window.onscroll = function(){
            let progressHeight = (window.pageYOffset/totalHeight)*100;
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