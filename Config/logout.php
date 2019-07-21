<?php

session_start();
//session_unset("user");
$_SESSION = array();

session_destroy();
header("Location: ../index.php");
exit;
?>
