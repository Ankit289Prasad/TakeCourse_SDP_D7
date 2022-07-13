<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Sell Report');
define('PAGE', 'sellreport');
$c=0;
include('./header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
?>

<div class="col-sm-9 mt-5 text-center">
    <form action="" method="POST" class="d-print-none">
        <div class="form-row">
            <div class="form-group col-md-2">
                <input type="date" class="form-control shadow-none" id="startdate" name="startdate">
            </div> <span class="tdate mx-3 mb-3"> to </span>
            <div class="form-group col-md-2">
                <input type="date" class="form-control shadow-none" id="enddate" name="enddate">
            </div>
            <div class="form-group">
                <input type="submit" class="mx-2 btn text-white searchbtnsr" name="searchsubmit" value="Search">
            </div>
        </div>
    </form>
    <?php
    if(isset($_REQUEST['searchsubmit'])){
        $startdate = $_REQUEST['startdate'];
        $enddate = $_REQUEST['enddate'];
        // $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '2018-10-11' AND '2018-10-13'";
        $sql = "SELECT * FROM courseorder WHERE order_date BETWEEN '$startdate' AND '$enddate'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
        echo '<div id="section-to-print">
      <p class="tabh text-white p-2 mt-4">Details</p>
      <div class="d-flex justify-content-end"><div class="drag">Drag to left! &nbsp <i class="far fa-caret-square-right .d-block .d-sm-none"></i></div></div>
  <div style="overflow-x:auto !important;">
      <table class="table table-bordered">
        <thead>
          <tr class="hbg">
            <th scope="col">Order ID</th>
            <th scope="col">Course ID</th>
            <th scope="col">Student Email</th>
            <th scope="col">Payment Status</th>
            <th scope="col">order Date</th>
            <th scope="col">Amount</th>
          </tr>
        </thead>
        <tbody>';
        $c=0;
       while($row = $result->fetch_assoc()){
         $c=$c+1;
         echo '<tr class="';if($c%2==0)
             echo row1;
             else
             echo row2;
         echo'">';
         echo '<th scope="row">'.$row["order_id"].'</th>
            <td>'.$row["course_id"].'</td>
            <td>'.$row["stu_email"].'</td>
            <td>'.$row["status"].'</td>
            <td>'.$row["order_date"].'</td>
            <td>'.$row["amount"].'</td>
          </tr>';
        }
        echo '<tr>
        <td><form class="d-print-none"><input class="btn printbtn text-white" type="submit" value="Print" onClick="javascript:window.print();"></form></td>
      </tr></tbody>
      </table>
      </div>
      </div>';
      } else {
        echo "<div class='alert alert-warning col-sm-6 mt-2' role='alert'> No Records Found ! </div>";
      }
    }
      ?>
</div>
</div>
</div>


</div> <!-- div Row close from header -->
</div> <!-- div Conatiner-fluid close from header -->
<?php
    if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]))
    {
    echo '<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy 2021 &nbsp|&nbsp Designed by <b class="fh1"> Ankit Prasad </b> &nbsp|
       <a href="../index.php">&nbsp Home Page</a></small>
    </footer>';
    }
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