<?php 
include('./dbConnection.php');
session_start();
if(!isset($_SESSION['stuLogEmail'])) {
 echo "<script> location.href='loginorsignup.php'; </script>";
} else { 
 date_default_timezone_set('Asia/Kolkata');
 $date = date('Y-m-d h:i:sa');
 if(isset($_POST['ORDER_ID']) && isset($_POST['TXN_AMOUNT'])){
  $order_id = $_POST['ORDER_ID'];
  $stu_email = $_SESSION['stuLogEmail'];
  $course_id = $_SESSION['course_id'];
  $status = "Success";
  $respmsg = "Done";
  $amount = $_POST['TXN_AMOUNT'];
  $date = $date;
  $sql = "INSERT INTO courseorder(order_id, stu_email, course_id, status, respmsg, amount, order_date) VALUES ('$order_id', '$stu_email', '$course_id', '$status', '$respmsg', '$amount', '$date')";
   if($conn->query($sql) == TRUE){
    echo '<!DOCTYPE html>
    <html lang="en">
    
    <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, minimum-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Redirecting!! </title>
    <link rel="icon" href="./icon.ico" type="image/x-icon">
    <link rel="stylesheet" href="./css/bootstrap.min.css">
    <link rel="stylesheet" href="./css/all.min.css">
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    
     <!-- Custom CSS -->
     <link rel="stylesheet" href="./css/stustyl12.css">
    
    </head><div class="h-100 row align-items-center">
 <div class="col text-center mx-5">
 <h3 class="mb-3 fw-bolder alert alert-success mx-5">Successful!</h3>
 <img src="./image/loading.gif" style="height:20%; width:40%;"><p class="fw-bold fs-4 text-success">Redirecting to My Profile....</p>'; 
 echo "<script> setTimeout(() => {
    window.location.href = './Student/myCourse.php';
  }, 3500); </script>
 </div>
</div><br/>";
   };
 } else {
 echo '<!DOCTYPE html>
 <html lang="en">
 
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, minimum-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Redirecting!! </title>
 <link rel="icon" href="./icon.ico" type="image/x-icon">
 <link rel="stylesheet" href="./css/bootstrap.min.css">
 <link rel="stylesheet" href="./css/all.min.css">
  <link rel="preconnect" href="https://fonts.gstatic.com">
 <link rel="preconnect" href="https://fonts.gstatic.com">
 <link href="https://fonts.googleapis.com/css2?family=Marck+Script&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Pattaya&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
 
  <!-- Custom CSS -->
  <link rel="stylesheet" href="./css/stustyl12.css">
 
 </head><div class="h-100 row align-items-center">
 <div class="col alert alert-danger text-center text-bolder mx-5">
   SORRY!! No Transaction Found or Transaction Failed!! &nbsp<div class="spinner-border spinner-border-sm text-danger"></div>';
   echo "<script> setTimeout(() => {
    window.location.href = './index.php';
  }, 3500); </script>
 </div>
</div><br/>";
 }
}
?>