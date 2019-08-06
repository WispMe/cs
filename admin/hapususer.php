<?php

include("../Config/koneksi.php");
require_once("../Config/auth.php");

// Delete product in cart
if(isset($_GET['id'])) {
$sql = "DELETE FROM login WHERE id='".$_GET['id']."'";
$query = mysqli_query($con, $sql);

if( $query ) {
// kalau berhasil alihkan ke halaman list-siswa.php

header("Location:userdata.php?success=2");
} else {
// kalau gagal tampilkan pesan
die("Gagal menyimpan perubahan...");
}
}
?>