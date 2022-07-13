<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Courses');
define('PAGE', 'courses');
include('./header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
 ?>

<div class="col-sm-9 text-center mt-3">
    <!--Table-->
    <p class="tabh text-white p-2">List of Courses</p>
    <?php
      $sql = "SELECT * FROM course";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
       echo '<div class="d-flex justify-content-end"><div class="drag">Drag to left! &nbsp <i class="far fa-caret-square-right .d-block .d-sm-none"></i></div></div>
       <div style="overflow-x:auto !important;">
       <table class="table table-bordered">
       <thead>
        <tr class="hbg">
         <th scope="col">Course ID</th>
         <th scope="col">Name</th>
         <th scope="col">Author</th>
         <th scope="col">Action</th>
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
          echo '<th scope="row">'.$row["course_id"].'</th>';
          echo '<td>'. $row["course_name"].'</td>';
          echo '<td>'.$row["course_author"].'</td>';
          echo '<td><form action="editcourse.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["course_id"] .'><button type="submit" class="btn btn-info smm smm1" name="view" value="View"><i class="fas fa-pen"></i></button></form>  
          <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["course_id"] .'><button type="submit" class="btn btn-secondary smm" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
         </tr>';
        }

        echo '</tbody>
        </table>
        </div>';
      } else {
        echo "0 Result";
      }
      if(isset($_REQUEST['delete'])){
       $sql = "DELETE FROM course WHERE course_id = {$_REQUEST['id']}";
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
</div> <!-- div Row close from header -->
<div><a class="btn btn-danger box" href="./addCourse.php"><i class="fas fa-plus fa-1x"></i></a></div>
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