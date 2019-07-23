<?php 
include("../Config/koneksi.php");
 ?>


<div class="info-box">
  <span class="info-box-icon bg-red"><i class="fa  fa-power-off"></i></span>
  <div class="info-box-content">
    <?php
    //Ambil data total circuit
    $sql_circuitdis= "SELECT COUNT(*) as total FROM ip WHERE status=0";
    $query_circuitdis = mysqli_query($con, $sql_circuitdis);
    $circuitdis = mysqli_fetch_object($query_circuitdis);
    ?>
    <span class="info-box-text">Disconnected</span>
    <span class="info-box-number"><?php echo $circuitdis->total; ?></span>
  </div>
  <!-- /.info-box-content -->
</div>