<?php
if(!isset($_SESSION)){ 
  session_start(); 
}
define('TITLE', 'Students');
define('PAGE', 'students');
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
    <p class="text-white p-2 tabh">List of Students</p>
    <?php
      $sql = "SELECT * FROM student";
      $result = $conn->query($sql);
      if($result->num_rows > 0){
        echo '<div class="d-flex justify-content-end"><div class="drag">Drag to left! &nbsp <i class="far fa-caret-square-right .d-block .d-sm-none"></i></div></div>
  <div style="overflow-x:auto !important;">';
       echo '<table class="table table-bordered">
       <thead>
        <tr class="hbg">
         <th scope="col">Student ID</th>
         <th scope="col">Name</th>
         <th scope="col">Email</th>
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
          echo '<th scope="row">'.$row["stu_id"].'</th>';
          echo '<td>'. $row["stu_name"].'</td>';
          echo '<td>'.$row["stu_email"].'</td>';
          echo '<td><form action="editstudent.php" method="POST" class="d-inline"> <input type="hidden" name="id" value='. $row["stu_id"] .'><button type="submit" class="btn btn-info cmm cmm1" name="view" value="View"><i class="fas fa-pen"></i></button></form>  
          <form action="" method="POST" class="d-inline"><input type="hidden" name="id" value='. $row["stu_id"] .'><button type="submit" class="btn btn-secondary cmm" name="delete" value="Delete"><i class="far fa-trash-alt"></i></button></form></td>
         </tr>';
        }

        echo '</tbody>
        </table>
        </div>';
      } else {
        echo "0 Result";
      }
      if(isset($_REQUEST['delete'])){
       $sql = "DELETE FROM student WHERE stu_id = {$_REQUEST['id']}";
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
 </div>  <!-- div Row close from header -->
 <div><a class="btn btn-danger box" href="addnewstudent.php"><i class="fas fa-plus"></i></a></div>
</div>  <!-- div Conatiner-fluid close from header -->
<?php
include('./footer.php'); 
?>