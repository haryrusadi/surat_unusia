<?php
ob_start();
include "../config/connect.php";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> APLIKASI SURAT DTDD</title>
<meta name="Author" content="Stu Nicholls" />

<link rel="stylesheet" type="text/css" href="../css/menu.css" />
<link rel="stylesheet" type="text/css" href="../css/style.css" />
<script src="../src/jquery-1.4.4.min.js" type="text/javascript" ></script>
<script src="../src/stuHover.js" type="text/javascript"></script>
<script type="text/javascript">
	$(function () {
		$('#checkAll').toggle(function () {
			$('.check').attr('checked', 'checked');
				$(this).val('Hilangkan semua');
			},
			
		function() {
			$('.check').removeAttr('checked');
				$(this).val('Pilih semua');
			})
	})

</script>

</head>

<body>
	<div id="header"> <?php include "../menu.php"; ?> </div>
    <div id="container">
    	<p>Pencarian Data Surat Masuk</p>
      Isikan parameter pencarian di sini!
    <form name="formCari" method="post" action="$_SERVER['PHP_SELF']">
    		<!--<input type="button" name="Check_All" value="Pilih Semua" id="checkAll" /><br />
      	<input type="checkbox" name="chkCari[]" value="1" class="check" />No DTDD <br />       
        <input type="checkbox" name="chkCari[]" value="2" class="check" />Agenda PLI <br />
        <input type="checkbox" name="chkCari[]" value="3" class="check" />Asal Surat <br />
        <input type="checkbox" name="chkCari[]" value="4" class="check" />Perihal<br /><br />-->
        <input type="text" name="cari" class="text" />
     		<input type="submit" name="crMsk" value="Cari" />
    </form><br />
       
<?php
$kata = trim($_POST['cari']);
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM surat_masuk WHERE " ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "agdDtdd LIKE '%$pisah_kata[$i]%' OR agdPli LIKE '%$pisah_kata[$i]%' OR asal LIKE '%$pisah_kata[$i]%'";
      if ($i < $jml_kata ){
        $cari .= " OR ";
      }
    }
  $cari .= " ORDER BY agdDtdd ";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

if ($ketemu > 0){
     while($data=mysql_fetch_array($hasil)){
		echo "<table width=100% class='tabelDetail'>
          	<tr align='left'>
            	<th width=5%>No</th>
                <th width=7%>Agd.PLI</th>
                <th>Asal</th>
                <th width=20%>No Surat</th>
                <th>Perihal</th>
                <th width=10%>Options</th>
            </tr>
            <tr>
           
            	<td>$data[agdDtdd]</td>
                <td>$data[agdPli]</td>
                <td>$data[asal]</td>
                <td>$data[nmrSrt]</td>
                <td>$data[hal]</td>
                <td align=center><a href=edit.php?id=$data[agdDtdd]>Edit</a> |
                <a href=detailMasuk.php?id=$data[agdDtdd]>Detail</a></td>
               
            </tr>
            <?php } ?>
            
          </table>";
      }        
    }                                                          
  else{
    echo "<p>Tidak ditemukan dengan kata <b>$kata</b></p>";
  }


?>