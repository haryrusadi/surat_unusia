<?php
require_once "config/connect.php";
session_start();
// buat nama file unique untuk di download
$filename = 'Surat_Keluar-'.date('YmdHis');
// dengan perintah di bawah ini akan memunculkan dialog download di browser anda
header("Content-type: application/x-msdownload");
// perintah di bawah untuk menentukan nama file yang akan di download
header("Content-Disposition: attachment; filename=".$filename.".xls")
?>

<html>
<head></head>
<body>
<h1 align="center"> LAPORAN SURAT KELUAR UNUSIA</h1>
<table width="100%" class="tabelDetail" border="1">
          	<tr align="left">
            	<th width="3%">No Urut</th>
              <th width="15%">No</th>
              <th width="7%">Tanggal (<i>mm-dd-yyyy</i>)</th>
              <th width="15%">Kepada</th>
              <th width="15%">Tembusan</th>
              <th width="20%">Perihal</th>
              <th>Keterangan</th>
            </tr>
            <tr>
			<?php
				$sql = "SELECT * FROM surat_keluar ORDER BY no ASC ";
        //echo $sql;exit();
				$result = mysql_query ($sql);
				while ($row = mysql_fetch_assoc($result)){
				?>	
                
                <td align="center"><?php echo "$row[no]"; ?></td>
            	<td align="center"><?php echo "$row[struktur].$row[no]./$row[substantif]./$row[fasilitatif]./$row[wilayah]"; ?></td>
                <td align="center"><?php echo "$row[tanggal]"; ?></td>
                <td align="center"><?php echo "$row[kepada]"; ?></td>
                <td align="center"><?php echo "$row[tembusan]"; ?></td>
                <td align="center"><?php echo "$row[perihal]"; ?></td>
                <td align="center"><?php echo "$row[keterangan]"; ?></td>
                              
            </tr>
            <?php 
						} ?>
            
          </table>
</body>
</html>