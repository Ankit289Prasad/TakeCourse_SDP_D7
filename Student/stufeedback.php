<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
$stuName="Feedback";
define('PAGE', 'feedback');
include('./header.php'); 
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
}

 if(isset($_REQUEST['submitFeedbackBtn'])){
  if(($_REQUEST['f_content'] == "")){
   // msg displayed if required field missing
   $passmsg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-warning col-sm-6 " role="alert"> Fill All Fileds </div></div>';
  } else {
   $fcontent = $_REQUEST["f_content"];
   $sql = "INSERT INTO feedback (f_content, stu_id) VALUES ('$fcontent', '$stuId')";
   if($conn->query($sql) == TRUE){
   // below msg display on form submit success
   $passmsg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-success col-sm-6 " role="alert"> Submitted Successfully </div></div>';
   } else {
   // below msg display on form submit failed
   $passmsg = '<div class="d-flex text-center justify-content-center"><div class="alert alert-danger col-sm-6 " role="alert"> Unable to Submit </div></div>';
      }
    }
 }

?>
 <div class="col-sm-6 mt-5 jumbotron1 mx-4">
  <form method="POST" enctype="multipart/form-data">
  <?php if(isset($passmsg)) {echo $passmsg; } ?>
    <div class="form-group">
      <label for="stuId">Student ID</label>
      <input type="text" class="form-control shadow-none" id="stuId" name="stuId" value=" <?php if(isset($stuId)) {echo $stuId;} ?>" readonly>
    </div>
    <div class="form-group">
      <label for="f_content">Write Feedback:</label>
      <textarea class="form-control shadow-none" id="f_content" name="f_content" row=2></textarea>
    </div>
    <button type="submit" class="btn searchbtnsr text-white shadow-none" name="submitFeedbackBtn">Submit</button>
    
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