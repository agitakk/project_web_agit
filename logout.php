<?php
session_start();
session_destroy(); //semua perintah akan terhapus
header('location:login.php');
?>