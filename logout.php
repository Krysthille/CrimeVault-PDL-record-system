<?php
$_SESSION = [];
session_start();
session_destroy();
header('location:http://localhost/CrimeVault/login.php/');
exit();

?>