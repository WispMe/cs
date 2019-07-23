<?php

include("../Config/koneksi.php");

// cek apakah tombol daftar sudah diklik atau blum?
if(isset($_POST['submit'])){
	
	// ambil data dari formulir
	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$username = $_POST['username'];
	$telephone = $_POST['telephone'];
	$privilege = $_POST['privilege'];
	
	if($privilege == 1){
        $grup = "-";
    }
    else{
         $grup = $_POST['grup'];
    }
   
	
	// buat query update
	$sql = "UPDATE login SET firstname='$firstname', lastname='$lastname', username='$username', telephone='$telephone', privilege='$privilege', grup='$grup' WHERE id=$id";
	$query = mysqli_query($con, $sql);
	
	// apakah query update berhasil?
	if( $query ) {
		// kalau berhasil alihkan ke halaman list-siswa.php
		header('Location: userdata.php');
	} else {
		// kalau gagal tampilkan pesan
		die("Gagal menyimpan perubahan...");
	}
	
	
} else {
	die("Akses dilarang...");
}

?>