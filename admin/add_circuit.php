<?php  
require_once("../config/koneksi.php");

if(isset($_POST['submit'])){

    // filter data yang diinputkan
    $add_grup = filter_input(INPUT_POST, 'add_grup', FILTER_SANITIZE_STRING);
    $add_sid = filter_input(INPUT_POST, 'add_sid', FILTER_SANITIZE_STRING);
    $add_customer = filter_input(INPUT_POST, 'add_customer', FILTER_SANITIZE_STRING);
    $add_layanan = filter_input(INPUT_POST, 'add_layanan', FILTER_SANITIZE_STRING);
    $add_witel = filter_input(INPUT_POST, 'add_witel', FILTER_SANITIZE_STRING);
    $add_lokasi = filter_input(INPUT_POST, 'add_lokasi', FILTER_SANITIZE_STRING);
    $add_koordinat = filter_input(INPUT_POST, 'add_koordinat', FILTER_SANITIZE_STRING);
    $add_ip = filter_input(INPUT_POST, 'add_ip', FILTER_SANITIZE_STRING);

    // menyiapkan query
    $sql = "INSERT INTO ip (grup, sid, Customer, layanan, witel, lokasi, koordinat, ip) 
            VALUES (:add_grup, :add_sid, :add_customer, :add_layanan, :add_witel, :add_lokasi, :add_koordinat, :add_ip)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":add_grup" => $add_grup,
        ":add_sid" => $add_sid,
        ":add_customer" => $add_customer,
        ":add_layanan" => $add_layanan,
        ":add_witel" => $add_witel,
        ":add_lokasi" => $add_lokasi,
        ":add_koordinat" => $add_koordinat,
        ":add_ip" => $add_ip
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman registersukses
    if($saved) header("Location: circuitdata.php?success=berhasil");
    else die("Gagal");
}


?>