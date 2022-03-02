<?php
require_once "config/connect.php";
session_start();
// buat nama file unique untuk di download
$filename = 'Surat_Masuk-'.date('YmdHis');
// dengan perintah di bawah ini akan memunculkan dialog download di browser anda
header("Content-type: application/x-msdownload");
// perintah di bawah untuk menentukan nama file yang akan di download
header("Content-Disposition: attachment; filename=".$filename.".xls")
?>

<html>
<head></head>
<body>

<h1 align="center"> LAPORAN SURAT MASUK </h1>

<table width="100%" class="tabelDetail">
          	<tr align="left">
            	<th width="3%">Tanggal Terima</th>
                <th width="5%">Asal</th>
                <th width="15%">Nomor Surat</th>                
                <th width="7%">Tanggal Surat </th>
                <th width="15%">Perihal</th>
                <th width="15%">Di Tujukan</th>
                <th>Keterangan</th>
            </tr>
            <tr>

            <?php
				$sql = "SELECT * FROM surat_masuk ORDER BY tglterima ASC";
				$result = mysql_query ($sql);
				while ($row = mysql_fetch_assoc($result)){
			?>
                <td align="center"><?php echo "$row[tglterima]"; ?></td>
                <td align="center"><?php echo "$row[asal]"; ?></td>
                <td align="center"><?php echo "$row[no_surat]"; ?></td>
                <td align="center"><?php echo "$row[tglsurat]"; ?></td>
                <td align="center"><?php echo "$row[prihal]"; ?></td>
                <td align="center"><?php echo "$row[di_tujukan]"; ?></td>
                <td align="center"><?php echo "$row[keterangan]"; ?></td>
                          
            </tr>
            <?php } ?>
            
          </table> 
</body>
</html>