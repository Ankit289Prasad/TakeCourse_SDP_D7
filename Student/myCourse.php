<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
$stuName="My Course";
define('PAGE', 'mycourse');
include('./header.php'); 
include_once('../dbConnection.php');

 if(isset($_SESSION['is_login'])){
  $stuLogEmail = $_SESSION['stuLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
?>

 <div class="container mt-5 mb-5">
  <div class="row">
   <div class="jumbotron1 mx-4">
    <h3 class="text-center"><b>All Course</b></h3>
    <?php 
   if(isset($stuLogEmail)){
    $sql = "SELECT co.order_id, c.course_id, c.course_name, c.course_duration, c.course_desc, c.course_img, c.course_author, c.course_original_price, c.course_price FROM courseorder AS co JOIN course AS c ON c.course_id = co.course_id WHERE co.stu_email = '$stuLogEmail'";
    $result = $conn->query($sql);
    $c=0;
    if($result->num_rows > 0) {
     while($row = $result->fetch_assoc()){ $c=$c+1?>
      <div class="cardbgg mb-5">
        <h5 class="card-header text-white"><?php echo $row['course_name']; ?></h5>
          <div class="row">
          
              <div class="col-sm-3 mx-2">
                <img src="<?php echo $row['course_img']; ?>" class="card-img-top
                mt-4" alt="pic">
              </div>
              <div class="col-sm-6 mb-3">
                <div class="card-body">
                  <p class="card-title"><?php echo $row['course_desc']; ?></p>
                  <small class="card-text">Duration: <?php echo $row['course_duration']; ?></small><br />
                  <small class="card-text">Instructor: <?php echo $row['course_author']; ?></small><br/>
                  <p class="card-text d-inline">Price: <small><del>&#8377 <?php echo $row['course_original_price'] ?> </del></small> <span class="font-weight-bolder">&#8377 <?php echo $row['course_price']?> <span></p>
                  <a href="watchcourse.php?course_id=<?php echo $row['course_id'] ?>" class="btn searchbtnsr text-white mt-5 float-right">Watch Course</a>
                </div>
              </div>
          
          </div>
          
      </div> 
    <?php
     }
    }
   }
  
    ?>
    <hr/>
   </div>
  </div>
 </div>

 </div> <!-- Close Row Div from header file -->
  </div>
 <?php if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]))
    {
    echo '<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy 2022 &nbsp|&nbsp Designed by <b class="fh1"> Group D7 </b> &nbsp|
       <a href="../index.php">&nbsp Home Page</a></small>
    </footer>';
    }else if($c>2){
      echo '<footer class="container-fluid bg-dark text-center p-2 zix">
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