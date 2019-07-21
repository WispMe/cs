<?php 

require_once("koneksi.php");

if(isset($_POST['login'])){
$username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$sql = "SELECT * FROM login WHERE username=:username";
$stmt = $db->prepare($sql);

// bind parameter ke query
$params = array(
":username" => $username
);
$stmt->execute($params);
$user = $stmt->fetch(PDO::FETCH_ASSOC);
// jika user terdaftar
if($user){
        // verifikasi password
        if(password_verify($password, $user["password"])){
            if ($user["privilege"] == 0) {
                // buat Session
                session_start();
                $_SESSION["nms"] = $user;
                // login sukses, alihkan ke halaman timeline
                header("Location: ../user/dashboard.php");
            }
            elseif ($user["privilege"] == 1) {
                session_start();
                $_SESSION["nms"] = $user;
                // login sukses, alihkan ke halaman timeline
                header("Location: ../admin/dashboard.php");
            }
        }
    }
}