<?php
include("Config/koneksi.php");
function ipscan($host){
#run the external command, break output into lines
$macAddr=false;
$arp=exec('arp -a '.$host.'');
$lines=explode("\n", $arp);
#look for the output line describing our IP address
foreach($lines as $line)
{
$cols=preg_split('/\s+/', trim($line));
if ($cols[0]==$host)
{
$macAddr=$cols[1];
}
}
return $macAddr;
}

$page = $_SERVER['PHP_SELF'];
$sec = "15";


//echo "Running...\n";
//x=1;
//while(true){
//echo "Stage ";
//echo $x;
//echo "\n";

$sql = "SELECT * FROM ip";
$query = mysqli_query($con, $sql);
while($isi = mysqli_fetch_object($query)) {
$up = ipscan($isi->ip);
if($up){
// buat query update
$sql2 = "UPDATE ip SET status=1 WHERE id=".$isi->id."";
$query2 = mysqli_query($con, $sql2);
}
else{
$sql3 = "UPDATE ip SET status=0 WHERE id=".$isi->id."";
$query3 = mysqli_query($con, $sql3);
}
}

//sleep(5);
//$x++;
//}
//echo "\n\n\ndone";
?>
<html>
	<head>
		<meta http-equiv="refresh" content="<?php echo $sec?>;URL='<?php echo $page?>'">
	</head>
	<body>
		<?php
		echo "Running...";
		echo "<br>";
		echo "Watch the page reload itself in 15 second!";
		?>
	</body>
</html>