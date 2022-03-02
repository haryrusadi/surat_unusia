<?php
ob_start();
require_once "../config/connect.php";
include "../fungsi.php";

$awal = $_POST['tglAwal'];
$akhir = $_POST['tglAkhir'];

//print_r($awal);

$tglAwal = str_replace ("/","-",$awal);
//echo $tglAwal;
$tglAkhir = str_replace ("/","-",$akhir);
$sql = "SELECT * FROM surat_masuk WHERE tglTerima between '$awal' and '$akhir'"; 
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
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> LAPORAN SURAT MASUK UNUSIA</title>
<meta name="Author" content="Stu Nicholls" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
</head>
<body>
<i>Jumlah record = <?php echo $jml; ?></i>
<?php $content = "
		<table width='100%' class='tabelDetail'>
          	<tr align='left'>
                    <th width='15%'>Tgl Terima</th>
                    <th width='8%'>Asal</th>
                    <th width='10%'>No Surat</th>
                    <th width='15%'>Tgl Surat</th>
                    <th width='15%'>Perihal</th>
                    <th width='15%'>Di Tujukan</th>
                    <th>Keterangan</th>            
            </tr>
            <tr>";
			
				while ($row = mysql_fetch_assoc($result)){
			     $tglTerima = tgl_indo($row['tglterima']);
			     $tglSurat	= tgl_indo($row['tglsurat']);
          $content .= "
                    <td align='center'>$tglTerima</td>
                    <td align='center'>$row[asal]</td>
                    <td align='center'>$row[no_surat]</td>
                    <td align='center'>$tglSurat</td>
                    <td align='center'>$row[prihal]</td>
                    <td align='center'>$row[di_tujukan]</td>
                    <td align='center'>$row[keterangan]</td>
                             
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
                <th width='15%'>tglTerima</th>
              <th width='8%'>Asal</th>
              <th width='10%'>No Surat</th>
              <th width='15%'>Tgl Surat</th>
              <th width='15%'>Perihal</th>
              <th width='20%'>DiTujukan</th>
              <th>Keterangan</th>
            </tr>
            <tr>";
	?>

</body>
</html>