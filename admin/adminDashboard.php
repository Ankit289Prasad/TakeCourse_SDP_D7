<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Dashboard');
define('PAGE', 'dashboard');
include('./header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
$sql = "SELECT * FROM course";
$result = $conn->query($sql);
$totalcourse = $result->num_rows;

 $sql = "SELECT * FROM student";
 $result = $conn->query($sql);
 $totalstu = $result->num_rows;

 $sql = "SELECT * FROM courseorder";
 $result = $conn->query($sql);
 $totalsold = $result->num_rows;
?>
<div class="col-sm-9 col-12">
    <div class="row mx-5 text-center pcc">
        <div class="col-md-4 col-12 mt-5 tc">
            <div class="card text-white shadow mb-3">
                <div class="card-header cb ">Courses</div>
                <div class="card-body cbc">
                    <h4 class="card-title">
                        <?php echo $totalcourse; ?>
                    </h4>
                    <a class="btn text-white glow" href="courses.php">View</a>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 mt-5 tc">
            <div class="card text-white  shadow mb-3">
                <div class="card-header sb glow">Students</div>
                <div class="card-body sbc">
                    <h4 class="card-title">
                        <?php echo $totalstu; ?>
                    </h4>
                    <a class="btn text-white glow" href="students.php">View</a>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-12 mt-5 tc">
            <div class="card text-white shadow mb-3" >
                <div class="card-header db glow">Sold</div>
                <div class="card-body dbc">
                    <h4 class="card-title">
                        <?php echo $totalsold; ?>
                    </h4>
                    <a class="btn text-white glow" href="sellreport.php">View</a>
                    <div class="overlay"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="mx-5 mt-5 text-center pcc1">
        <!--Table-->
        <p class="tabh text-white p-2">Course Ordered</p>
        <?php
      $sql = "SELECT * FROM courseorder";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
  echo '<div class="d-flex justify-content-end"><div class="drag">Drag to left! &nbsp <i class="far fa-caret-square-right .d-block .d-sm-none"></i></div></div>
  <div style="overflow-x:auto !important;">
  <table class="table table-bordered">
    <thead>
    <tr class="hbg">
      <th scope="col">Order ID</th>
      <th scope="col">Course ID</th>
      <th scope="col">Student Email</th>
      <th scope="col">Order Date</th>
      <th scope="col">Amount</th>
      <th scope="col">Action</th>
    </tr>
    </thead>
    <tbody >';
    $c=0;
    while($row = $result->fetch_assoc()){
    $c=$c+1;
    echo '<tr class="';if($c%2==0)
                    echo row1;
                    else
                    echo row2;
    echo'">';
      echo '<th scope="row" class="td1">'.$row["order_id"].'</th>';
      echo '<td>'. $row["course_id"].'</td>';
      echo '<td>'.$row["stu_email"].'</td>';
      echo '<td>'.$row["order_date"].'</td>';
      echo '<td>'.$row["amount"].'</td>';
      echo '<td><form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["co_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>';
      echo '</tr>';
    }
  echo '</tbody>
  </table>
  </div>';
  } else {
    echo "0 Result";
  }
  if(isset($_REQUEST['delete'])){
    $sql = "DELETE FROM courseorder WHERE co_id = {$_REQUEST['id']}";
    if($conn->query($sql) === TRUE){
      // echo "Record Deleted Successfully";
      // below code will refresh the page after deleting the record
      echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
      } else {
        echo "Unable to Delete Data";
      }
   }
  ?>
  </div>
</div>
</div>
</div>

</div> <!-- div Row close from header -->
</div> <!-- div Conatiner-fluid close from header -->

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