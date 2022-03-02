<?php
require_once "../config/connect.php";
$agdDtdd = $_GET['id'];
$sqlbagian =  mysql_query("SELECT * FROM tabel_bagian LIMIT 1");
while($data = mysql_fetch_assoc($sqlbagian)){  
$nmBag = $data['nmBag'];
if (isset($_POST['save'])){
				$sql = "INSERT INTO tabel_disp_masuk (agdDtdd,nmBag,nmPeg,isiDisp,tglDisp)";
			$sql.= "VALUES('$agdDtdd', '$nmBag', '$_POST[nmPeg]', '$_POST[isiDisp]', '$_POST[tglDisp]')" or die (mysql_error());
	
			$input = mysql_query($sql);
			if($input){
						header("location:../suratMasuk.php");
						}
					else{
			echo "Data gagal tersimpan.";
					}
				}
}
?>