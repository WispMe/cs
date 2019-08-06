<?php include("../Config/koneksi.php");

if(isset($_POST['submit'])){

    $id = $_POST['id'];
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    //$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);


    // menyiapkan query
    $sql = "UPDATE login SET password=:password WHERE id=$id";
    $stmt = $db->prepare($sql);

    echo $password;


    // bind parameter ke query
    $params = array(
        ":password" => $password
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman registersukses
    if($saved){

        header("Location: edituser.php?id=".$id."&success=1");
    } 
    else{
        die("gagal...");
    }
        
}

 ?>