<?php 
include("../Config/koneksi.php");
require_once("../Config/auth.php");
$grup = $_SESSION["nms"]["grup"];
 ?>


<div class="info-box">
  <span class="info-box-icon bg-green"><i class="fa  fa-power-off"></i></span>
  <div class="info-box-content">
    <?php
    //Ambil data total circuit
    $sql_circuitdis= "SELECT COUNT(*) as total FROM ip WHERE status=1 AND grup = '".$grup."'";
    $query_circuitdis = mysqli_query($con, $sql_circuitdis);
    $circuitdis = mysqli_fetch_object($query_circuitdis);
    ?>
    <span class="info-box-text">Connected</span>
    <span class="info-box-number"><?php echo $circuitdis->total; ?></span>
  </div>
  <!-- /.info-box-content -->
</div>