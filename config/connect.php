<?php
$server = "localhost";
$username = "root";
$password = "";
$database = "surat_unusia";

// Koneksi dan memilih database di server
mysql_connect($server, $username, $password, $database) or die("Koneksi gagal");
mysql_select_db($database) or die("Database tidak bisa dibuka");
?>