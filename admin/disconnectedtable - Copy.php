<?php
include("../Config/koneksi.php");
$sql_data = "SELECT * FROM ip";
$result = array();
$query_data = mysqli_query($con, $sql_data);
while($row = mysqli_fetch_array($query_data)){
	array_push($result, array(
		'grup' => $row[1],
		'sid' => $row[2],
		'customer' => $row[3],
		'layanan' => $row[4],
		'witel' => $row[5],
		'lokasi' => $row[6],
		'koordinat' => $row[7],
		'ip' => $row[8],
		'status' => $row[9]
	));
}
echo json_encode(array("result" => $result));
?>

<!--script>
$(function () {
$('#example1').DataTable()
})
</script-->