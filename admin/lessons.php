<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Lessons');
define('PAGE', 'lessons');
$c=0;
include('./header.php'); 
include('../dbConnection.php');

  if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
 ?>

<div class="col-sm-9 text-center">
  <form action="" class="spc mt-3 form-inline d-print-none">
    <div class="form-group mr-3">
      <label for="checkid" class="font-weight-bold">Enter Course ID: </label>
      <input type="text" class="form-control ml-5 shadow-none spci" id="checkid" name="checkid" onkeypress="isInputNumber(event)">
    </div>
    <button type="submit" class="btn shadow-none searchbtnsr text-white ml-3">Search</button>
  </form>
  <?php
  $sql = "SELECT course_id FROM course";
  $result = $conn->query($sql);
  while($row = $result->fetch_assoc()){
    if(isset($_REQUEST['checkid']) && $_REQUEST['checkid'] == $row['course_id']){
      $sql = "SELECT * FROM course WHERE course_id = {$_REQUEST['checkid']}";
      $result = $conn->query($sql);
      $row = $result->fetch_assoc();
      if(($row['course_id']) == $_REQUEST['checkid']){ 
        $_SESSION['course_id'] = $row['course_id'];
        $_SESSION['course_name'] = $row['course_name'];
        
        ?>
        <div class="mt-5 text-center"><p class="tabh text-white p-2">Course ID : <?php if(isset($row['course_id'])) {echo $row['course_id']; } ?> Course Name: <?php if(isset($row['course_name'])) {echo $row['course_name']; } ?></p></div>
        <?php
          $sql = "SELECT * FROM lesson WHERE course_id = {$_REQUEST['checkid']}";
          $result = $conn->query($sql);
          if($result->num_rows > 0){
            echo '<div class="d-flex justify-content-end"><div class="drag">Drag to left! &nbsp <i class="far fa-caret-square-right .d-block .d-sm-none"></i></div></div>
            <div style="overflow-x:auto !important;">';}
          echo '<table class="table table-bordered">
            <thead>
              <tr class="hbg">
              <th scope="col">Lesson ID</th>
              <th scope="col">Lesson Name</th>
              <th scope="col">Lesson Link</th>
              <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>';
            $c=0;
              while($row = $result->fetch_assoc()){
                $c=$c+1;
                $p=0;
                echo '<tr class="';if($c%2==0)
                    echo row1;
                    else
                    echo row2;
                echo'">';
                echo '<th scope="row">'.$row["lesson_id"].'</th>';
                echo '<td>'. $row["lesson_name"].'</td>';
                echo '<td>'.$row["lesson_link"].'</td>';
                echo '<td><form action="editlesson.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["lesson_id"] .'><button type="submit" class="btn btn-info cmm cmm1 shadow-none" name="view" value="View"><i class="fas fa-pen"></i></button></form>  
                <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["lesson_id"] .'><button type="submit" class="btn btn-secondary cmm shadow-none" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
              </tr>';
              }
              echo '</tbody>
             </table>
             </div>';
        } else {
          echo '<div class="alert alert-dark mt-4" role="alert">
          Course Not Found ! </div>';
        }
        if(isset($_REQUEST['delete'])){
         $sql = "DELETE FROM lesson WHERE lesson_id = {$_REQUEST['id']}";
         if($conn->query($sql) === TRUE){
           // echo "Record Deleted Successfully";
           // below code will refresh the page after deleting the record
           echo '<meta http-equiv="refresh" content= "0;URL=?deleted" />';
           } else {
             echo "Unable to Delete Data";
           } 
     } 
   } 
  }?>
  
</div>
<!-- Only Number for input fields -->
<script>
  function isInputNumber(evt) {
    var ch = String.fromCharCode(evt.which);
    if (!(/[0-9]/.test(ch))) {
      evt.preventDefault();
    }
  }
</script>
 </div>  <!-- div Row close from header -->
 <?php if(isset($_SESSION['course_id'])){
   echo '<div><a class="btn btn-danger box" href="./addLesson.php"><i class="fas fa-plus"></i></a></div>';
   } ?>
 
</div>  <!-- div Conatiner-fluid close from header -->
<!-- Jquery and Boostrap JavaScript -->
<?php
    if($c>=4 && preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]))
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