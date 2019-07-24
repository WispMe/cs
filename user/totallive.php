<?php
include("../Config/koneksi.php");
require_once("../Config/auth.php");
$grup = $_SESSION["nms"]["grup"];
?>
<!-- small box -->
<div class="info-box">
  <span class="info-box-icon bg-aqua"><i class="fa fa-hdd-o"></i></span>
  <div class="info-box-content">
    <?php
    //Ambil data total circuit
    $sql_totalcircuit = "SELECT COUNT(*) as total FROM ip WHERE grup = '".$grup."'";
    $query_totalcircuit = mysqli_query($con, $sql_totalcircuit);
    $totalcircuit = mysqli_fetch_object($query_totalcircuit);
    ?>
    <span class="info-box-text">Total Circuit</span>
    <span class="info-box-number"><?php echo $totalcircuit->total; ?></span>
  </div>
  <!-- /.info-box-content -->
</div>