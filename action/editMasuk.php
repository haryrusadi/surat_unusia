<?php
ob_start();
include "../config/connect.php";

if (isset($_POST['save'])){
$sql = "UPDATE inputmasuk SET agdDtdd='$_POST[agd]',
															agdPli='$_POST[agdPli]',
															tglTerima='$_POST[tt]', 
															asal='$_POST[asal]',
															nmrSrt='$_POST[nmrSrt]',
															tglSrt='$_POST[tglSrt]',
															hal='$_POST[hal]',
															ket='$_POST[ket]'
												WHERE agdDtdd='$_POST[agd]'";
		$qr = mysql_query ($sql) or die ('error:'.mysql_error());
		if($qr){
			header("location:../suratMasuk.php");
			}
		else{
			echo "Tidak dapat diupdate.";
			}
}
else if(isset($_POST['cancel'])){
	header("location:../suratMasuk.php");
	}

?>