<?php
ob_start();
include "../config/connect.php";

if (isset($_POST['save'])){
$sql = "INSERT INTO surat_masuk (no_surat,tglsurat,tglterima,asal,prihal,di_tujukan,keterangan)";
$sql.= "VALUES('$_POST[no_surat]','$_POST[tglterima]','$_POST[tglsurat]', '$_POST[asal]', '$_POST[prihal]', '$_POST[di_tujukan]','$_POST[keterangan]')" or die ('error:'.mysql_error());
$qr = mysql_query ($sql) or die ('error:'.mysql_error());
if($qr){
	header("location:../suratMasuk.php");
	}
else{
	echo "Tidak dapat disimpan.";
	}
}
?>