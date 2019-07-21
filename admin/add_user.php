<?php include("../Config/koneksi.php");

if(isset($_POST['submit'])){

    // filter data yang diinputkan
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    //$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $privilege = filter_input(INPUT_POST, 'privilege', FILTER_SANITIZE_STRING);

    echo $username;
    echo "\n";
    echo $password;
    echo "\n";
    echo $privilege;

    // menyiapkan query
    $sql = "INSERT INTO login (username, password, privilege) 
            VALUES (:username, :password, :privilege)";
    $stmt = $db->prepare($sql);

    // bind parameter ke query
    $params = array(
        ":username" => $username,
        ":password" => $password,
        ":privilege" => $privilege
    );

    // eksekusi query untuk menyimpan ke database
    $saved = $stmt->execute($params);

    // jika query simpan berhasil, maka user sudah terdaftar
    // maka alihkan ke halaman registersukses
    if($saved){
        header("Location: userdata.php");
    } 
    else{
        die("gagal...");
    }
        
}

 ?>