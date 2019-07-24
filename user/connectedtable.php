<?php
include("../Config/koneksi.php");
require_once("../Config/auth.php");
$grup = $_SESSION["nms"]["grup"];
$sql_data1 = "SELECT * FROM ip WHERE status = 1 AND grup='".$grup."'";
$query_data1 = mysqli_query($con, $sql_data1);
?>
<table id="example3" class="table table-bordered table-striped">
	<thead>
		<tr>
			<th>Grup</th>
			<th>SID</th>
			<th>Customer Name</th>
			<th>Layanan</th>
			<th>Witel</th>
			<th>Lokasi</th>
			<th>Koordinat</th>
			<th>IP</th>
			<th>Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
		while($data1 = mysqli_fetch_object($query_data1)) {
		?>
		<tr>
			<td><?php echo $data1->grup ?></td>
			<td><?php echo $data1->sid ?></td>
			<td><?php echo $data1->customer ?></td>
			<td><?php echo $data1->layanan ?></td>
			<td><?php echo $data1->witel ?></td>
			<td><?php echo $data1->lokasi ?></td>
			<td><?php echo $data1->koordinat ?></td>
			<td><?php echo $data1->ip ?></td>
			<?php
			if($data1->status==0){
			echo "<td style='color:red'>Disconnected</td>";
			}
			else{
			echo "<td style='color:green'>Connected</td>";
			}
			?>
		</tr>
		<?php } ?>
		
	</tbody>
</table>
<script>
$(function () {
$('#example3').DataTable()
$('#example4').DataTable({
'paging'      : true,
'lengthChange': false,
'searching'   : false,
'ordering'    : true,
'info'        : true,
'autoWidth'   : false
})
})
</script>