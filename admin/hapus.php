<?php

include("../Config/koneksi.php");
require_once("../Config/auth.php");

// Delete product in cart
if(isset($_GET['id'])) {
$grup = "SELECT grup FROM ip WHERE id='".$_GET['id']."'";
$sql = "DELETE FROM ip WHERE id='".$_GET['id']."'";
$querygrup = mysqli_query($con, $grup);
$isi = mysqli_fetch_object($querygrup);
$query = mysqli_query($con, $sql);

if( $query ) {
// kalau berhasil alihkan ke halaman list-siswa.php

header("Location:circuitdatagrup.php?grup=".$isi->grup."");
} else {
// kalau gagal tampilkan pesan
die("Gagal menyimpan perubahan...");
}
}
?>