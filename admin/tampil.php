<?php
include("../Config/koneksi.php");
$sql = mysqli_query($con,"SELECT * FROM ip");
$result = array();

while($row = mysqli_fetch_array($sql)){
	array_push($result, array('grup' => $row[1], 'sid' => $row[2], 'customer' => $row[3], 'layanan' => $row[4], 'witel' => $row[5], 'lokasi' => $row[6], 'koordinat' => $row[7], 'ip' => $row[8], 'status' => $row[9]));
}
echo json_encode(array("result" => $result));
?>
