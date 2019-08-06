<?php
include("../Config/koneksi.php");
require_once("../Config/auth.php");
$grup = $_SESSION["nms"]["grup"];
$sql_data = "SELECT * FROM ip";
$query_data = mysqli_query($con, $sql_data);
?>
<table id="example1" class="table table-bordered table-striped">
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
		while($data = mysqli_fetch_object($query_data)) {
		?>
		<tr>
			<td><?php echo $data->grup ?></td>
			<td><?php echo $data->sid ?></td>
			<td><?php echo $data->customer ?></td>
			<td><?php echo $data->layanan ?></td>
			<td><?php echo $data->witel ?></td>
			<td><?php echo $data->lokasi ?></td>
			<td><?php echo $data->koordinat ?></td>
			<td><?php echo $data->ip ?></td>
			<?php
			if($data->status==0){
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
$('#example1').DataTable()
$('#example2').DataTable({
'paging'      : true,
'lengthChange': false,
'searching'   : false,
'ordering'    : true,
'info'        : true,
'autoWidth'   : false
})
})
</script>