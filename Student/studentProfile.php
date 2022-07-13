<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('PAGE', 'profile');
include_once('../dbConnection.php');
if(isset($_SESSION['is_login'])){
  $stuEmail = $_SESSION['stuLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }

$sql = "SELECT * FROM student WHERE stu_email='$stuEmail'";
 $result = $conn->query($sql);
 if($result->num_rows == 1){
 $row = $result->fetch_assoc();
 $stuId = $row["stu_id"];
 $stuName = $row["stu_name"];
 $stuOcc = $row["stu_occ"];
 $stuImg = $row["stu_img"];
include('./header.php'); 

}

 if(isset($_REQUEST['updateStuNameBtn'])){
  if(($_REQUEST['stuName'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-warning col-sm-6 ml-5 mt-2" role="alert"> Fill All Fileds! </div></div>';
  } else {
   $stuName = $_REQUEST["stuName"];
   $stuOcc = $_REQUEST["stuOcc"];
   $stu_image = $_FILES['stuImg']['name']; 
   $stu_image_temp = $_FILES['stuImg']['tmp_name'];
   $img_folder = '../image/stu/'. $stu_image; 
   move_uploaded_file($stu_image_temp, $img_folder);
   $sql = "UPDATE student SET stu_name = '$stuName', stu_occ = '$stuOcc', stu_img = '$img_folder' WHERE stu_email = '$stuEmail'";
   if($conn->query($sql) == TRUE){
   // below msg display on form submit success
   $passmsg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-success col-sm-6 mt-2" role="alert"> Updated Successfully! </div></div>';
   } else {
   // below msg display on form submit failed
   $passmsg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-danger col-sm-6 mt-2" role="alert"> Unable to Update! </div></div>';
      }
    }
 }

?>
<?php if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]))
 {echo '<div class="col-sm-6 mt-3 mb-3 mx-3 jumbotron1">';}
 else{ echo '<div class="col-sm-6 mt-2 mb-5 mx-3 jumbotron1">';}?>
 <?php if(isset($passmsg)) {echo $passmsg; } ?>
  <form  method="POST" enctype="multipart/form-data">
    <div class="form-group">
      <label for="stuId">Student ID</label>
      <input type="text" class="form-control shadow-none" id="stuId" name="stuId" value=" <?php if(isset($stuId)) {echo $stuId;} ?>" readonly>
    </div>
    <div class="form-group">
      <label for="stuEmail">Email</label>
      <input type="email" class="form-control shadow-none" id="stuEmail" value=" <?php echo $stuEmail ?>" readonly>
    </div>
    <div class="form-group">
      <label for="stuName">Name</label>
      <input type="text" class="form-control shadow-none" id="stuName" name="stuName" value=" <?php if(isset($stuName)) {echo trim($stuName);} ?>">
    </div>
    <div class="form-group">
      <!-- Student doesnt mean school student it also means learner -->
      <label for="stuOcc">Occupation</label>
      <input type="text" class="form-control shadow-none" id="stuOcc" name="stuOcc" value=" <?php if(isset($stuOcc)) {echo trim($stuOcc);} ?>">
    </div>
    <div class="form-group">
      <label for="stuImg">Upload Image (Less than 2 mb)</label>
      <input type="file" class="form-control-file shadow-none" id="stuImg" name="stuImg">
    </div>
    <button type="submit" class="btn searchbtnsr text-white shadow-none" name="updateStuNameBtn">Update</button>
    
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