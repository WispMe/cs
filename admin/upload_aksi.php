<!-- import excel ke mysql -->
<!-- www.malasngoding.com -->

<?php 
// menghubungkan dengan koneksi
include '../Config/koneksi.php';
// menghubungkan dengan library excel reader
include "../Config/excel_reader2.php";
?>

<?php
// upload file xls
$target = basename($_FILES['filepegawai']['name']) ;
move_uploaded_file($_FILES['filepegawai']['tmp_name'], $target);

// beri permisi agar file xls dapat di baca
chmod($_FILES['filepegawai']['name'],0777);

// mengambil isi file xls
$data = new Spreadsheet_Excel_Reader($_FILES['filepegawai']['name'],false);
// menghitung jumlah baris data yang ada
$jumlah_baris = $data->rowcount($sheet_index=0);

// jumlah default data yang berhasil di import
$berhasil = 0;
for ($i=2; $i<=$jumlah_baris; $i++){

	// menangkap data dan memasukkan ke variabel sesuai dengan kolumnya masing-masing
	$grup     = $data->val($i, 3);
	$SID   = $data->val($i, 4);
	$customer  = $data->val($i, 5);
	$layanan  = $data->val($i, 6);
	$witel  = $data->val($i, 7);
	$lokasi  = $data->val($i, 8);
	$koordinat  = $data->val($i, 9);
	$ip  = $data->val($i, 10);

	if($grup != "" && $SID != "" && $customer != "" && $layanan != "" && $witel != "" && $lokasi != "" && $koordinat != "" && $ip != "" ){
		// input data ke database (table ip)
		mysqli_query($con,"INSERT into ip values('','$grup','$SID','$customer','$layanan','$witel','$lokasi','$koordinat','$ip','0')");
		$berhasil++;
	}
}

// hapus kembali file .xls yang di upload tadi
unlink($_FILES['filepegawai']['name']);

// alihkan halaman ke index.php
header("location:circuitdata.php");
?>