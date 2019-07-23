<?php include("../Config/koneksi.php");

if(isset($_POST['submit'])){

    // filter data yang diinputkan
    $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING);
    $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING);
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    // enkripsi password
    $telephone = filter_input(INPUT_POST, 'telephone', FILTER_SANITIZE_STRING);
    $password = password_hash($_POST["password"], PASSWORD_DEFAULT);
    //$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
    $privilege = filter_input(INPUT_POST, 'privilege', FILTER_SANITIZE_STRING);
    if($privilege == 1){
        $grup = "-";
    }
    else{
         $grup = filter_input(INPUT_POST, 'grup', FILTER_SANITIZE_STRING);
    }
   


    // menyiapkan query
    $sql = "INSERT INTO login (firstname, lastname, telephone, grup, username, password, privilege) 
            VALUES (:firstname, :lastname, :telephone, :grup, :username, :password, :privilege)";
    $stmt = $db->prepare($sql);

    echo $firstname;
    echo "\n";
    echo $lastname;
    echo "\n";
    echo $telephone;
    echo "\n";
    echo $grup;
    echo "\n";
    echo $username;
    echo "\n";
    echo $password;
    echo "\n";
    echo $privilege;

    // bind parameter ke query
    $params = array(
        ":firstname" => $firstname,
        ":lastname" => $lastname,
        ":telephone" => $telephone,
        ":grup" => $grup,
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