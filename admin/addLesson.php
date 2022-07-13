<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Add Lesson');
define('PAGE', 'lessons');
include('./header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
 if(isset($_REQUEST['lessonSubmitBtn'])){
  // Checking for Empty Fields
  if(($_REQUEST['lesson_name'] == "") || ($_REQUEST['lesson_desc'] == "") || ($_REQUEST['course_id'] == "") || ($_REQUEST['course_name'] == "")){
   // msg displayed if required field missing
   $msg = '<div class="d-flex justify-content-center"><div class="alert alert-warning col-sm-6 mt-2 text-center" role="alert"> Fill All Fileds..Try Again!! &nbsp<div class="spinner-border spinner-border-sm text-warning"></div> </div></div>';
  } else {
   // Assigning User Values to Variable
   $lesson_name = $_REQUEST['lesson_name'];
   $lesson_desc = $_REQUEST['lesson_desc'];
   $course_id = $_REQUEST['course_id'];
   $course_name = $_REQUEST['course_name'];
   $lesson_link = $_FILES['lesson_link']['name']; 
   $lesson_link_temp = $_FILES['lesson_link']['tmp_name'];
   $link_folder = '../lessonvid/'.$lesson_link; 
   move_uploaded_file($lesson_link_temp, $link_folder);
    $sql = "INSERT INTO lesson (lesson_name, lesson_desc, lesson_link, course_id, course_name) VALUES ('$lesson_name', '$lesson_desc','$link_folder', '$course_id', '$course_name')";
    if($conn->query($sql) == TRUE){
     // below msg display on form submit success
     $msg = '<div class="d-flex justify-content-center"><div class="alert alert-success col-sm-6 mt-2 text-center" role="alert"> Lesson Added Successfully! &nbsp<div class="spinner-border spinner-border-sm text-success"></div> </div></div>';
    } else {
     // below msg display on form submit failed
     $msg = '<div class="d-flex justify-content-center"><div class="alert alert-danger col-sm-6 mt-2 text-center" role="alert"> Unable to Add...Try Again! &nbsp<div class="spinner-border spinner-border-sm text-danger"></div> </div></div>';
    }
  }
  }
 ?>
<div class="col-sm-6 mt-5  mx-3 jumbotron1">
  <h3 class="text-center"><b>Add New Lesson</b></h3>
  <form action="" method="POST" enctype="multipart/form-data">
  <?php if(isset($msg)) {echo $msg;?> <script>setTimeout(() => {
                        window.location.href = "lessons.php";
                    }, 3000);</script> <?php } ?>
    <div class="form-group">
      <label for="course_id">Course ID</label>
      <input type="text" class="form-control shadow-none" id="course_id" name="course_id" value ="<?php if(isset($_SESSION['course_id'])){echo $_SESSION['course_id'];} ?>" readonly>
    </div> 
    <div class="form-group">
      <label for="course_name">Course Name</label>
      <input type="text" class="form-control shadow-none" id="course_name" name="course_name" value ="<?php if(isset($_SESSION['course_name'])){echo $_SESSION['course_name'];} ?>" readonly>
    </div>
    <div class="form-group">
      <label for="lesson_name">Lesson Name</label>
      <input type="text" class="form-control shadow-none" id="lesson_name" name="lesson_name">
    </div>
    <div class="form-group">
      <label for="lesson_desc">Lesson Description</label>
      <textarea class="form-control shadow-none" id="lesson_desc" name="lesson_desc" row=2></textarea>
    </div>
    <div class="form-group">
      <label for="lesson_link">Lesson Video Link</label>
      <input type="file" class="form-control-file shadow-none" id="lesson_link" name="lesson_link">
    </div>
    <div class="text-center">
      <button type="submit" class="btn searchbtnsr shadow-none text-white" id="lessonSubmitBtn" name="lessonSubmitBtn">Submit</button>
      <a href="lessons.php" class="btn btn-secondary shadow-none">Close</a>
    </div>
  </form>
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
</div>  <!-- div Conatiner-fluid close from header -->

<?php
include('./footer.php'); 
?>