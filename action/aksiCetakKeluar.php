<?php
ob_start();
require_once "../config/connect.php";
include "../fungsi.php";

$awal = $_POST['tglAwal'];
$akhir = $_POST['tglAkhir'];
$struktur = $_POST['struktur'];
$substantif = $_POST['substantif'];
$fasilitatif = $_POST['fasilitatif'];
$wilayah = $_POST['wilayah'];
$param="";

if($struktur != ""){
	$param .= "and struktur = '$struktur'";
}
if($substantif !=""){
	$param .= " and substantif = '$substantif'";
}
if($fasilitatif !=""){
	$param .= " and fasilitatif = '$fasilitatif'";
}
if($wilayah !=""){
	$param .= " and wilayah = '$wilayah'";
}

//print_r($awal);

$tglAwal = date("Y-m-d", strtotime($awal));
//echo $tglAwal;
$tglAkhir = date("Y-m-d", strtotime($akhir));



$awal = "SELECT * FROM surat_keluar WHERE tanggal between '$tglAwal' and '$tglAkhir' ";
$sql = $awal.$param; 
//echo $sql;exit();
$result = mysql_query ($sql);
$jml = mysql_num_rows($result);

/*



require_once(“fpdf.php”);
$pdf=new FPDF();
$pdf->AddPage();
$pdf->setFont("Helvetica","",12);
mysql_connect(“localhost”,”root”,”rahasia.com”);
mysql_select_db(“nama_database_ku”);
$cmd=”select isi,judul from nama_tabel_ku”;
$exe=mysql_query($cmd);
$i=1;
while ($data=mysql_fetch_array($exe)){
$pdf->write(10,$i);
$pdf->write(10,$data["judul"]);
$pdf->ln(10);
$pdf->write(10,$data["isi"]);
$i+=1;
}
$pdf->Output();*/

//echo "Jumlah data yang ditemukan : $jml";

if($_POST['submit'] == "CETAK"){
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> APLIKASI PERSURATAN UNUSIA JAKARTA</title>
<meta name="Author" content="Stu Nicholls" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
<i>Jumlah record = <?php echo $jml; ?></i>
<?php $content = "
		<table width='100%' class='tabelDetail'>
           	<tr align='left'>
            	<th width='3%'>No Urut</th>
              <th width='15%'>No</th>
              <th width='7%'>Tanggal</th>
              <th width='15%'>Kepada</th>
              <th width='15%'>Tembusan</th>
              <th width='20%'>Perihal</th>
              <th>Keterangan</th>
            </tr>
            <tr>";
			
				while ($row = mysql_fetch_assoc($result)){
			$tgl_keluar = tgl_indo($row['tanggal']);
	
          $content .= "
		  		<td align='center'>$row[no]</td>
            	<td align='center'>$row[struktur].$row[no]./$row[substantif]./$row[fasilitatif]./$row[wilayah]</td>
                <td align='center'>$row[tanggal]</td>
                <td>$row[kepada]</td>
                <td>$row[tembusan]</td>
                <td>$row[perihal]</td>
                <td>$row[keterangan]</td>
		                                         
            </tr>";
         			} 
            $content .= "</table>";
	
	echo $content;
	// ekspor ke file pdf
	/*
	require('../pdf17/fpdf.php');
	
	$pdf= new FPDF();
	$pdf->AddPage();	
	$pdf->SetFont('Arial','B','11');
	$pdf->Cell(20,20,'content');
	$pdf->Output();
	*/
	?>
	</body>
	</html>
	<?php } else{
		require_once "../config/connect.php";
		// buat nama file unique untuk di download
		$filename = 'Surat_Keluar-'.date('YmdHis');
		// dengan perintah di bawah ini akan memunculkan dialog download di browser anda
		header("Content-type: application/x-msdownload"); 
		// perintah di bawah untuk menentukan nama file yang akan di download
		header("Content-Disposition: attachment; filename=".$filename.".xls");
		$content = "
		<table width='100%' class='tabelDetail'>
           	<tr align='left'>
            	<th width='3%'>No Urut</th>
              <th width='15%'>No</th>
              <th width='7%'>Tanggal</th>
              <th width='15%'>Kepada</th>
              <th width='15%'>Tembusan</th>
              <th width='20%'>Perihal</th>
              <th>Keterangan</th>
            </tr>
            <tr>";
			
				while ($row = mysql_fetch_assoc($result)){
			$tgl_keluar = tgl_indo($row['tanggal']);
	
          $content .= "
		  		<td align='center'>$row[no]</td>
            	<td align='center'>$row[struktur].$row[no]./$row[substantif]./$row[fasilitatif]./$row[wilayah]</td>
                <td align='center'>$row[tanggal]</td>
                <td>$row[kepada]</td>
                <td>$row[tembusan]</td>
                <td>$row[perihal]</td>
                <td>$row[keterangan]</td>
		                                         
            </tr>";
         			} 
            $content .= "</table>";
	
	echo $content;

	}
	?>