<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Feedback');
define('PAGE', 'feedback');
include('./header.php'); 
include('../dbConnection.php');

 if(isset($_SESSION['is_admin_login'])){
  $adminEmail = $_SESSION['adminLogEmail'];
 } else {
  echo "<script> location.href='../index.php'; </script>";
 }
?>
<div class="col-sm-9 mt-5 text-center">
    <!--Table-->
    <p class="text-white p-2 tabh">List of Feedbacks</p>
    <?php
      $sql = "SELECT * FROM feedback";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        echo '<div class="d-flex justify-content-end"><div class="drag">Drag to left! &nbsp <i class="far fa-caret-square-right .d-block .d-sm-none"></i></div></div>
        <div style="overflow-x:auto !important;">
        <table class="table table-bordered">
          <thead>
          <tr class="hbg">
         <th scope="col">Feedback ID</th>
         <th scope="col">Content</th>
         <th scope="col">Student ID</th>
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
          echo '<th scope="row">'.$row["f_id"].'</th>';
          echo '<td>'. $row["f_content"].'</td>';
          echo '<td>'.$row["stu_id"].'</td>';
          echo '<td><form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["f_id"] .'><button type="submit" class="btn btn-secondary" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
         </tr>';
        }

        echo '</tbody>
        </table>
        </div>';
      } else {
        echo "0 Result";
      }
      if(isset($_REQUEST['delete'])){
       $sql = "DELETE FROM feedback WHERE f_id = {$_REQUEST['id']}";
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
</div> <!-- div Conatiner-fluid close from header -->
<?php
include('./footer.php'); 
?>