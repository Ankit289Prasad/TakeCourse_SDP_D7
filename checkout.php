<?php 
include('./dbConnection.php');
session_start();
 if(!isset($_SESSION['stuLogEmail'])) {
  echo "<script> location.href='loginorsignup.php'; </script>";
 }
  else{
  $c=0;
  $stuEmail = $_SESSION['stuLogEmail'];
  $course_id = $_SESSION['course_id'];
  $sql= "SELECT * from courseorder where stu_email='$stuEmail' and course_id=$course_id"; 
  $result=$conn->query($sql);
  if($result->num_rows > 0){
    $c=1;
    $mg='<div class="d-flex text-center justify-content-center"><div class="alert alert-success col-md-9 " role="alert"> You already bought this course!! &nbsp<div class="spinner-border spinner-border-sm text-success"></div> </div></div>';
  }
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="icon" href="icon.ico" type="image/x-icon">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" type="text/css" href="css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    
    <!-- Custom Style CSS -->
    <?php include './css/style.php'; ?>
    
   <title>Checkout</title>
  </head>
  <body>
  <div class="container mt-5 mb-5">
    <div class="row mx-4">
    <div class="col-sm-6 offset-sm-3 jumbotron1">
    <?php if(isset($mg)) {echo $mg;?> <script>setTimeout(() => {
                        window.location.href = "./Student/myCourse.php";
                    }, 4000);</script> <?php } ?>
    <h3 class="mb-5 text-center coth">Welcome to Take Course Payment Page</h3>
    <form method="post" action="./paymentdone.php">
      <div class="form-group row">
       <label for="ORDER_ID" class="col-sm-4 col-form-label">Order ID</label>
       <div class="col-sm-8">
         <input id="ORDER_ID" class="form-control shadow-none" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off"
          value="<?php echo  "ORDS" . rand(10000,99999999)?>" readonly>
       </div>
      </div>
      <div class="form-group row">
       <label for="CUST_ID" class="col-sm-4 col-form-label">Student Email</label>
       <div class="col-sm-8">
         <input id="CUST_ID" class="form-control shadow-none" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?php if(isset($stuEmail)){echo $stuEmail; }?>" readonly>
       </div>
      </div>
      <div class="form-group row">
       <label for="TXN_AMOUNT" class="col-sm-4 col-form-label">Amount</label>
       <div class="col-sm-8">
        <input title="TXN_AMOUNT" class="form-control shadow-none" tabindex="10"
          type="text" name="TXN_AMOUNT" value="<?php if(isset($_POST['id'])){echo $_POST['id']; }?>" readonly>
       </div>
      </div>
      
      <div class="text-center">
      <?php 
      if($c==1){
       echo '<input value="Check out" type="submit"	class="btn searchbtnsr text-white" disabled onclick="">';}
       else{
        echo '<input value="Check out" type="submit"	class="btn searchbtnsr text-white" onclick="">';
       }?>
       <a href="./courses.php" class="btn btn-secondary">Cancel</a>
      </div>
     </form>
     <small class="form-text text-muted">Note: Complete Payment by Clicking Checkout Button</small>
     </div>
    </div>
  </div>

    <!-- Jquery and Boostrap JavaScript -->
    <script type="text/javascript" src="js/jquery.min.js"></script>
    <script type="text/javascript" src="js/popper.min.js"></script>
    <script type="text/javascript" src="js/bootstrap.min.js"></script>

    <!-- Font Awesome JS -->
    <script type="text/javascript" src="js/all.min.js"></script>

    <!-- Custom JavaScript -->
    <script type="text/javascript" src="js/custom.js"></script>

  </body>
  </html>
 <?php } ?>

