<?php
  define('TITLE', 'Payment Status');
  define('PAGE', 'paymentstatus');
  include('../dbConnection.php');
  include('./header.php'); 
  $ORDER_ID = "";
	$c=0;
	if (isset($_POST["ORDER_ID"]) && $_POST["ORDER_ID"] != "") {
		$ORDER_ID = $_POST["ORDER_ID"];
	}

?>  
   <div class="col-sm-9 text-center mb-3 bg-white" >
     <h2 class="text-center mt-4">Payment Status </h2>
     <form method="post" action="">
     <div class="form-group row justify-content-center marginps">
        <label class="offset-sm-3 mt-2 col-form-label">Order ID: </label>
        <div>
          <input class="form-control mx-3 mt-2 shadow-none" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $ORDER_ID ?>">
        </div>
        <div>
          <input class="btn shadow-none text-white mx-4 mt-2 searchbtnsr sbtn1" value="View" type="submit"	onclick="">
        </div>
      </div>
     </form>
    <div class="mt-5 text-center">
    <?php
      if (isset($_POST['ORDER_ID']))
      { 
        $sql = "SELECT order_id FROM courseorder";
        $result = $conn->query($sql);
        while($row = $result->fetch_assoc()){
          
          if($_POST["ORDER_ID"] == $row["order_id"]){ $c=1;?>
            <div class="row justify-content-center" id="section-to-print">
              <div class="col-auto">
                <h2 class="text-center">Payment Receipt</h2>
                <table class="table table-bordered mb-5">
                  <tbody>
                      <tr class="row1">
                        <td><label>Order ID</label></td>
                        <td><?php if (isset($row["order_id"])) echo $row["order_id"] ?></td>
                      </tr>
                      <tr class="row2">
                        <td><label>Status</label></td>
                        <td>Success</td>
                      </tr>
                      <tr class="row1">
                        <td></td>
                          <td><button class="btn printbtn text-white shadow-none" onclick="javascript:window.print();">Print Receipt</button></td>
                      </tr>
                    </tbody>
                  </table>      
                </div>
              </div>
      <?php
      } } } ?>
      <?php
    if($_POST){
      if($_POST['ORDER_ID']==""){
        $passmsg = '<div class="d-flex justify-content-center p-0 mb-5"><div class="alert alert-warning col-sm-6 mt-2" role="alert"> Please Enter ORDER ID! </div></div>';
      }
    else if($c==0){
      $passmsg = '<div class="d-flex justify-content-center p-0 mb-5"><div class="alert alert-danger col-sm-6 mt-2" role="alert"> ORDER ID not found! </div></div>';
    }
  if(isset($passmsg)) {echo $passmsg; } 
    }
  ?>
      
      </div>
      </div>
    </div>
    </div> 
    </div>  <!-- div Row close from header -->
</div>  <!-- div Conatiner-fluid close from header -->
<?php
if(preg_match("/(android|avantgo|blackberry|bolt|boost|cricket|docomo|fone|hiptop|mini|mobi|palm|phone|pie|tablet|up\.browser|up\.link|webos|wos)/i", $_SERVER["HTTP_USER_AGENT"]))
{
    echo '<footer class="container-fluid bg-dark text-center p-2">
        <small class="text-white">Copyright &copy 2021 &nbsp|&nbsp Designed by <b class="fh1"> Ankit Prasad </b> &nbsp|
       <a href="../index.php">&nbsp Home Page</a></small>
    </footer>';}
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
