<?php

include("../Config/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){
	
	// ambil data dari formulir
	$id = $_POST['id'];
	$sid = $_POST['sid'];
	$customer = $_POST['customer'];
	$layanan = $_POST['layanan'];
	$witel = $_POST['witel'];
	$koordinat = $_POST['koordinat'];
	$ip = $_POST['ip'];
	$grup = $_POST['grup'];
	$lokasi = $_POST['lokasi'];
	
	// buat query update
	$sql = "UPDATE ip SET grup='$grup', id='$id', ip='$ip', lokasi='$lokasi', SID='$sid', Customer='$customer', layanan='$layanan', witel='$witel', koordinat='$koordinat' WHERE id=$id";
	$query = mysqli_query($con, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: circuitdatagrup.php?grup='.$grup.'&success=0');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>