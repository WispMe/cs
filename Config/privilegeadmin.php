<?php 

if($_SESSION["nms"]["privilege"] !=1){
    header("location: ../user/dashboard.php");
    }

 ?>