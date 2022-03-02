<?php
// memulai session
ob_start();
session_start();
include "config/connect.php";

$username = addslashes($_POST['user']);
$password = md5(addslashes($_POST['pass']));

// query untuk mendapatkan record dari username
$query = "SELECT * FROM user WHERE username = '$username'";
$hasil = mysql_query($query);
$data = mysql_fetch_array($hasil);

// cek kesesuaian password
if ($password == $data['password'])
{
    echo "<h1>Login Sukses</h1>";

    // menyimpan username dan level ke dalam session
    $_SESSION['level'] = $data['level'];
    $_SESSION['username'] = $data['username'];

    header("location:index.php?mod=home");
}
else echo "<h1>Login gagal</h1> <a href='login.php'>Ulangi lagi</a>";
	
?>
