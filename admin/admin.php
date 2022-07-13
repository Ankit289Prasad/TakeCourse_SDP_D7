<?php 
include('../dbConnection.php');
if(!isset($_SESSION)){ 
  session_start(); 
}
// setting header type to json, We'll be outputting a Json data
header('Content-type: application/json');

//Admin id is there or not
if(isset($_POST['adminemail']) && isset($_POST['checkemail'])){
  $adminemail = $_POST['adminemail'];
  $sql = "SELECT admin_email FROM admin WHERE admin_email='".$adminemail."'";
  $result = $conn->query($sql);
  $row = $result->num_rows;
  echo json_encode($row);
  }

 // Admin Login Verification
 if(!isset($_SESSION['is_admin_login'])){
   if(isset($_POST['checkLogemail']) && isset($_POST['adminLogEmail']) && isset($_POST['adminLogPass'])){
     $adminLogEmail = $_POST['adminLogEmail'];
     $adminLogPass = $_POST['adminLogPass'];
     $sql = "SELECT admin_email, admin_pass FROM admin WHERE admin_email='".$adminLogEmail."' AND admin_pass='".$adminLogPass."'";
     $result = $conn->query($sql);
     $row = $result->num_rows;
     
     if($row === 1){
       $_SESSION['is_admin_login'] = true;
       $_SESSION['adminLogEmail'] = $adminLogEmail;
       echo json_encode($row);
     } else if($row === 0) {
       echo json_encode($row);
     }
   }
 }

?>