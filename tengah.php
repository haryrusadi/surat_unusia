<?php
require_once "config/connect.php";
//session_start();
include "fungsi.php";

//echo $_GET['mod'];
//exit();
// HOME
if($_GET['mod']=='home'){
	echo "
	<div class='selamat'>
	<h2><marquee>SELAMAT DATANG DI SISTEM INFORMASI PERSURATAN UNUSIA JAKARTA </marquee></h2> </div>";
	}

    $NewID = 0;

// INPUT MASUK
if($_GET['mod']=='inputMasuk') { ?>
	<p>Input Surat Masuk</p> 
    <form id="formID" method="post" action="index.php?mod=actInputMasuk";>
    	<table bgcolor="EAFFEA">
              <tr>
                <td>Tanggal Terima</td>
                <td></td>
               <?php $date = date("Y-m-d"); ?> 
                <td><input id="tglterima" class="text validate[required]" type="text" name="tgltrm" value="<?php echo "$date" ?>"  />(bulan-tanggal-tahun)</td>
             </tr>
             <tr>
        		<td>Asal Surat</td>
                <td></td>
                <td><input id="asal" class="text validate[required]" type="text" name="asal"  /></td>
             </tr>
             <tr>
        		<td>Nomor Surat</td>
                <td></td>
                <td><input id="no_surat" class="text validate[required]" type="text" name="no_surat"  /></td>
             </tr>
             <tr>
                <td>Tanggal pelaksanaan</td>
                <td></td>
               <?php $date = date("Y-m-d"); ?> 
                <td><input id="tglsurat" class="text validate[required]" type="text" name="tglsrt" value="<?php echo "$date" ?>"  />(bulan-tanggal-tahun)</td>
             </tr>
             <tr>
                    <td>Perihal</td>
                    <td></td>
                    <td><select name="prihal">
                        <option selected="selected" value="Biasa">Biasa</option>
                        <option value="Undangan">Undangan</option>
                        <option value="Pengantar">Pengantar</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Arsip">Arsip</option>
                    </select></td>
                </tr>
                 <tr>
                    <td>Di Tujukan</td>
                    <td></td>
                    <td><select name="di_tujukan">
                      <option selected="selected" value="Rek">Rek</option>
                        <option value="WR.I">WR.I</option>
                        <option value="WR.II">WR.II</option>
                        <option value="WR.III">WR.III</option>
                        <option value="Dir.I">Dir.I</option>
                        <option value="Dir.II">Dir.II</option>
                        <option value="Dir.III">Dir.III</option>
                        <option value="DK.FAI">DK.FAI</option>
                        <option value="DK.FTK">DK.FTK</option>
                        <option value="DK.FSH">DK.FSH</option>
                        <option value="DK.FIS">DK.FIS</option>
                        <option value="PAI">PAI</option>
                        <option value="AS">AS</option>
                        <option value="PSy">PSy</option>
                        <option value="Sos">Sos</option>
                        <option value="Psi">Psi</option>
                        <option value="Hkm">Hkm</option>
                        <option value="Akt">Akt</option>
                        <option value="PAUD">PAUD</option>
                        <option value="SI">SI</option>
                        <option value="TI">TI</option>
                        <option value="TE">TE</option>
                        <option value="TIn">TIn</option>
                        <option value="TA">TA</option>
                        <option value="PGMI">PGMI</option>
                        <option value="SKI">SKI</option>
                        <option value="ESy">ESy</option>
                        <option value="PPM">PPM</option>
                        <option value="LP3M">LP3M</option>
                        <option value="LPM">LPM</option>
                        <option value="BEM">BEM</option>
                    </select></td>
                </tr>
             <tr valign="top">
        		<td>Keterangan</td>
                <td></td>
                <td><textarea id="keterangan" cols="50px" rows="5px" name="keterangan" class="" /></textarea></td>
             </tr>
            <tr>
             	<td></td>
             	<td colspan="2"><input type="submit" name="save" class="button button1" value="Simpan" />
              </td></td>
             </tr>
         </table>
         </form>
    
    
	<?php } ?>

  <?php 
// AKSI actInputMasuk
if($_GET['mod']=='actInputMasuk'){
	if (isset($_POST['save'])){
		$tglterima = htmlentities($_POST['tgltrm'],ENT_QUOTES);
		$asal = htmlentities($_POST['asal'],ENT_QUOTES);
		$no_surat = htmlentities($_POST['no_surat'],ENT_QUOTES);
		$tglsurat 	= htmlentities($_POST['tglsrt'],ENT_QUOTES);
		$perihal = htmlentities($_POST['prihal'],ENT_QUOTES);
        $ditujukan = htmlentities($_POST['di_tujukan'],ENT_QUOTES);
		$keterangan = htmlentities($_POST['keterangan'],ENT_QUOTES);
		
		
		$sql = "INSERT INTO surat_masuk (no_surat,tglsurat,tglterima,asal,prihal,di_tujukan,keterangan)";
		$sql.= "VALUES('$no_surat','$tglsurat','$tglterima', '$asal', '$perihal', '$ditujukan', '$keterangan')" or die ('error:'.mysql_error());
		$qr = mysql_query ($sql) or die ('error:'.mysql_error());
		if($qr){
			header("location:index.php?mod=suratMasuk");
			}
		}
  }

if($_GET['mod']=='editMasuk') { ?>
<?php 
    echo $_GET['id'];
    $no_surat = $_GET['id'];
    $sql = "select * from surat_masuk where no_surat = '$no_surat'";
    $q = mysql_query($sql) or die(mysql_error());
    $d = mysql_fetch_array($q);
?>
  <p>Input Surat Masuk</p> 
    <form id="formID" method="post" action="index.php?mod=actInputMasuk";>
      <table bgcolor="EAFFEA">
              <tr>
                <td>Tanggal Terima</td>
                <td></td>
               <?php $date = date("Y-m-d"); ?> 
                <td><input id="tglterima" class="text validate[required]" type="text" name="tgltrm" value="<?php echo $d['tglterima'] ?>"  />(bulan-tanggal-tahun)</td>
             </tr>
             <tr>
            <td>Asal Surat</td>
                <td></td>
                <td><input id="asal" class="text validate[required]" type="text" name="asal" value="<?php echo $d['asal'] ?>"  /></td>
             </tr>
             <tr>
            <td>Nomor Surat</td>
                <td></td>
                <td><input id="no_surat" class="text validate[required]" type="text" name="no_surat" value="<?php echo $d['no_surat'] ?>"  /></td>
             </tr>
             <tr>
                <td>Tanggal pelaksanaan</td>
                <td></td>
               <?php $date = date("Y-m-d"); ?> 
                <td><input id="tglsurat" class="text validate[required]" type="text" name="tglsrt" value="<?php echo $d['tglsurat'] ?>"  />(bulan-tanggal-tahun)</td>
             </tr>
             <tr>
                    <td>Perihal</td>
                    <td></td>
                    <td><select name="prihal">
                        <option selected="selected" value="Biasa">Biasa</option>
                        <option value="Undangan">Undangan</option>
                        <option value="Pengantar">Pengantar</option>
                        <option value="Rahasia">Rahasia</option>
                        <option value="Arsip">Arsip</option>
                    </select></td>
                </tr>
                 <tr>
                    <td>Di Tujukan</td>
                    <td></td>
                    <td><select name="di_tujukan">
                      <option selected="selected" value="Rek">Rek</option>
                        <option value="WR.I">WR.I</option>
                        <option value="WR.II">WR.II</option>
                        <option value="WR.III">WR.III</option>
                        <option value="Dir.I">Dir.I</option>
                        <option value="Dir.II">Dir.II</option>
                        <option value="Dir.III">Dir.III</option>
                        <option value="DK.FAI">DK.FAI</option>
                        <option value="DK.FTK">DK.FTK</option>
                        <option value="DK.FSH">DK.FSH</option>
                        <option value="DK.FIS">DK.FIS</option>
                        <option value="PAI">PAI</option>
                        <option value="AS">AS</option>
                        <option value="PSy">PSy</option>
                        <option value="Sos">Sos</option>
                        <option value="Psi">Psi</option>
                        <option value="Hkm">Hkm</option>
                        <option value="Akt">Akt</option>
                        <option value="PAUD">PAUD</option>
                        <option value="SI">SI</option>
                        <option value="TI">TI</option>
                        <option value="TE">TE</option>
                        <option value="TIn">TIn</option>
                        <option value="TA">TA</option>
                        <option value="PGMI">PGMI</option>
                        <option value="SKI">SKI</option>
                        <option value="ESy">ESy</option>
                        <option value="PPM">PPM</option>
                        <option value="LP3M">LP3M</option>
                        <option value="LPM">LPM</option>
                        <option value="BEM">BEM</option>
                    </select></td>
                </tr>
             <tr valign="top">
            <td>Keterangan</td>
                <td></td>
                <td><textarea id="keterangan" cols="50px" rows="5px" name="keterangan" class="" /></textarea></td>
             </tr>
            <tr>
              <td></td>
              <td colspan="2"><input type="submit" name="save" class="button button1" value="Simpan" />
              </td></td>
             </tr>
         </table>
         </form>


<?php } 


//AKsi Edit
if ($_GET['mod']=='editsmasuk') {
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
}



if ($_GET['mod']=='hapusMasuk') {
$no_surat = $_GET['id'];
$sql = "delete from surat_masuk where no_surat = '$no_surat'";
    $qr = mysql_query ($sql) or die ('error:'.mysql_error());
    if($qr){
      header("location:index.php?mod=suratMasuk");
      }
    else{
      echo "<script>alert('Data Tidak Dapat Dihapus');</script>";
      }
}



if($_GET['mod']=='suratMasuk'){
		?>
		<h1><b>Detail Surat Masuk</b></h1>
    	<table width="100%" class="tabelDetail">
          	<tr align="left">
                <th width="10%">Tgl Terima</th>
                <th width="10%">asal</th>
                <th width="15%">No Surat</th>
                <th width="10%">Tgl Pelaksanaan</th>
                <th width="15%">Perihal</th>
                <th width="25">Di Tujukan</th>
                <th width="20">Keterangan</th>
                <th width="15">Aksi</th> 
            </tr>
            <tbody>
            <tr>
<!--               agdDtdd,agdPli,asal,nmrSrt,hal-->
            <?php
			$dataPerPage = 10;

			if(isset($_GET['page'])){
				$noPage = $_GET['page'];
				}
			else $noPage = 1;
			$offset = ($noPage - 1) * $dataPerPage;
		
				$sql = "SELECT * FROM surat_masuk ORDER BY no_surat DESC LIMIT $offset, $dataPerPage";
				$result = mysql_query ($sql);
				$baris=1;
				while ($row = mysql_fetch_assoc($result)){
								
				$warna="#ffffff";
				if($baris % 2 ==0){
					$warna="#E1E1E1";
					}
				echo "<tr bgcolor=".$warna.">";
			?>
      <?php 

       ?>
                <td align="center"><?php echo tgl_indo($row['tglsurat']); ?></td>
                <td><?php echo "$row[asal]"; ?></td>
                <td><?php echo "$row[no_surat]"; ?></td>
                <td align="center"><?php echo tgl_indo($row['tglterima']); ?></td>
                <td><?php echo "$row[prihal]"; ?></td>
                <td><?php echo "$row[di_tujukan]"; ?></td>
                <td><?php echo "$row[keterangan]"; ?></td>
                <td> 
                  <!-- <a href="index.php?mod=editMasuk&id=<?php echo "$row[no_surat]"; ?>">edit </a> -->
                  <a href="index.php?mod=hapusMasuk&id=<?php echo "$row[no_surat]"; ?>">hapus</a>
                </td>
                <!-- <td><a href="editmasuk.php">Edit</a> | <a href="hapus.php">hapus</a></td> -->

               
            </tr>
            </tbody>
            <?php 
			$baris++;
			} ?>
            
          </table> 

	<?php
	// mencari jumlah semua data dalam tabel inputmasuk

			$query = "SELECT COUNT(*) AS jmlData FROM surat_masuk";
			$hasil = mysql_query($query);
			$data  = mysql_fetch_array($hasil);
			$jumData = $data['jmlData'];
            $showPage = 0;
			
			$jumPage = ceil($jumData / $dataPerPage);

			// menampilkan link previous
			echo "<div class='pages'>";
			if($noPage > 1){echo "<a href='".$_SERVER['PHP_SELF']."?mod=suratMasuk&&page=".($noPage-1)."'>&lt;&lt; Prev</a>";}
			for($page = 1; $page <= $jumPage; $page++)
			{
					 if ((($page >= $noPage - 1) && ($page <= $noPage + 1)) || ($page == 1) || ($page == $jumPage)) /*memunculkan link nomor halaman 1 dan juga halaman terakhir, sekaligus pula nomor-nomor halaman dalam rentang 3 halaman sebelum dan sesudah nomor halaman yang aktif. Contoh jika halaman yang aktif adalah halaman 7 dari 15 halaman, maka nanti diharapkan nomor halaman yang muncul adalah 1 4 5 6 7 8 9 10 15*/
					 {
						if (($showPage == 1) && ($page != 2))  echo "<span>...</span>"; /*memunculkan tanda ��� di antara halaman nomor 1 dengan halaman berikutnya yang tampil. Tapi perlu diingat bahwa tanda ini akan muncul bila nomor halaman yang muncul setelah 1 ialah bukan 2. Apabila setelah 1 ini muncul 2, maka tanda ini tidak muncul*/
						if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "<span>...</span>"; /*memunculkan tanda ��� sebelum nomor halaman terakhir bila halaman sebelumnya yang muncul bukan �nomor halaman terakhir � 1*/
						if ($page == $noPage) echo " <span class=current><b>".$page."</b> </span>";
						else echo " <a href='".$_SERVER['PHP_SELF']."?mod=suratMasuk&page=".$page."'>".$page."</a> ";/*menampilkan link nomor halaman. Namun link dari nomor halaman ini ditampilkan hanya pada nomor halaman yang sedang tidak aktif. Sedangkan pada nomor halaman yang sedang aktif nomor halaman hanya dicetak tebal saja*/
						$showPage = $page;
					 }
			}
			
			// menampilkan link next
			if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?mod=suratMasuk&&page=".($noPage+1)."'>Next &gt;&gt;</a>";
			
			echo "</div> ";
	}

// DETAIL MASUK
if($_GET['mod']=='detailMasuk'){?>
	<p>Detail Surat Masuk</p> 
 
        <?php
					$sql = "SELECT * FROM surat_masuk WHERE no_surat = '$_GET[id]' LIMIT 1";
					$result = mysql_query($sql);
					while($row = mysql_fetch_assoc($result)){
				?>
        	
      	  <table style="background-color:#D2FFD2;">
        	     	<td width="150px;">Nomor Surat</td>
                <td width="600px;"><?php echo"$row[no_surat]" ?></td>                
            </tr>
            <tr>
        		<td>Tanggal Terima</td>
                <td><?php echo "$row[tgltrm]"; ?></td>
             </tr>
             <tr>
        		<td>Tanggal Terima</td>
                <td><?php echo tgl_indo($row['tglTerima']); ?></td>
             </tr>
             <tr>
        		<td>Asal Surat</td>
                <td><?php echo"$row[asal]" ?></td>
             </tr>
             <tr>
        		<td>Nomor Surat</td>
                <td><?php echo"$row[nmrSrt]" ?></td>
             </tr>
             <tr>
        		<td>Tanggal Surat</td>
                <td><?php echo tgl_indo($row['tglSrt']);?> </td>
             </tr>
             <tr valign="top">
        		<td>Perihal</td>
                <td><?php echo"$row[hal]" ?></td>
             </tr>
               <tr valign="top">
        		<td>Keter</td>
                <td><?php echo"$row[ket]" ?></td>
              </tr>

            </table>
          
          <?php } 
				}

// CARI MASUK
if($_GET['mod']=='cariMasuk'){
?>
		<p>Pencarian Data Surat Masuk</p>
      Isikan parameter pencarian di sini!
    <form name="formCari" method="post" action="index.php?mod=actCariMasuk">
    		<!--<input type="button" name="Check_All" value="Pilih Semua" id="checkAll" /><br />
      	<input type="checkbox" name="chkCari[]" value="1" class="check" />Tgl Terima <br />       
        <input type="checkbox" name="chkCari[]" value="2" class="check" />Asal <br />
        <input type="checkbox" name="chkCari[]" value="3" class="check" />Di Tujukan <br />
        <input type="checkbox" name="chkCari[]" value="4" class="check" />No surat<br /><br />-->
        <input type="text" name="cari" class="text" />
     		<input type="submit" class="button button2" name="crMsk" value="Cari" />
    </form><br />
<?php }


// AKSI CARI MASUK

if($_GET['mod']=='actCariMasuk'){
	
echo "<table width=100% class='tabelDetail'>
<tr align='left'>
					<th width='15%'>Tgl Terima</th>
					<th width='8%'>Asal</th>
					<th width='10%'>No Surat</th>
					<th width='15%'>Tgl Surat</th>
					<th width='15%'>Perihal</th>
					<th width='15%'>Di Tujukan</th>
					<th>Keterangan</th> 
                    </tr>";



$kata = trim($_POST['cari']);
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM surat_masuk WHERE " ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "tglterima LIKE '%$pisah_kata[$i]%' OR asal LIKE '%$pisah_kata[$i]%' OR no_surat LIKE '%$pisah_kata[$i]%' OR tglsurat LIKE '%$pisah_kata[$i]%' OR prihal LIKE '%$pisah_kata[$i]%' OR di_tujukan LIKE '%$pisah_kata[$i]%' OR keterangan LIKE '%$pisah_kata[$i]%'";
					if ($i < $jml_kata ){
						$cari .= " OR ";
					}
    		}
  $cari .= " ORDER BY no_surat DESC ";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

	if ($ketemu > 0){?>
    	   
		<?php 
		$baris=1;
		 while($data=mysql_fetch_array($hasil)){
			 $tglTerima = tgl_indo($data['tglterima']);
             $tglSurat = tgl_indo($data['tglsurat']);
			$warna="#ffffff";
			if($baris % 2 ==0){
				$warna="#e1e1e1";
				echo "<tr bgcolor=".$warna.">";
				}
			echo "
				
				
			   
					<td align='center'>$tglTerima</td>
                    <td>$data[asal]</td>
                    <td>$data[no_surat]</td>
					<td align='center'>$tglSurat</td>
					<td>$data[prihal]</td>
					<td>$data[di_tujukan]</td>
					<td>$data[keterangan]</td>;
				   
				</tr>";

		 $baris++; }?>        
		 </table>
	  <?php }
	  else{
			echo "<p>Tidak ditemukan dengan parameter \"<b>$kata</b>\"</p>";
	  }
	  
}

// INPUT KELUAR
if($_GET['mod']=='inputKeluar'){?>
	<h2>Input Surat Keluar</h2> 
    <form id="formID" method="post" action="index.php?mod=actInputKeluar";>
        <table bgcolor="EAFFEA">
                <tr>
                    <td>Struktur</td>
                    <td></td>
                    <td><select name="struktur">
                        <option selected="selected" value="Rek">Rek</option>
                        <option value="WR.I">WR.I</option>
                        <option value="WR.II">WR.II</option>
                        <option value="WR.III">WR.III</option>
                        <option value="Dir.I">Dir.I</option>
                        <option value="Dir.II">Dir.II</option>
                        <option value="Dir.III">Dir.III</option>
                        <option value="DK.FAI">DK.FAI</option>
                        <option value="DK.FTK">DK.FTK</option>
                        <option value="DK.FSH">DK.FSH</option>
                        <option value="DK.FIS">DK.FIS</option>
                        <option value="PAI">PAI</option>
                        <option value="AS">AS</option>
                        <option value="PSy">PSy</option>
                        <option value="Sos">Sos</option>
                        <option value="Psi">Psi</option>
                        <option value="Hkm">Hkm</option>
                        <option value="Akt">Akt</option>
                        <option value="PAUD">PAUD</option>
                        <option value="SI">SI</option>
                        <option value="TI">TI</option>
                        <option value="TE">TE</option>
                        <option value="TIn">TIn</option>
                        <option value="TA">TA</option>
                        <option value="PGMI">PGMI</option>
                        <option value="SKI">SKI</option>
                        <option value="ESy">ESy</option>
                        <option value="PPM">PPM</option>
                        <option value="LP3M">LP3M</option>
                        <option value="LPM">LPM</option>
                        <option value="BEM">BEM</option>
                        
                    </select></td>
                </tr>

                <tr>
                    <td>Substantif</td>
                    <td></td>
                    <td><select name="substantif">
                        <option selected="selected" value="000">000</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                        <option value="400">400</option>
                        <option value="500">500</option>
                        <option value="600">600</option>
                    </select></td>
                </tr>

                <tr>
                    <td>Fasilitatif</td>
                    <td></td>
                    <td><select name="fasilitatif">
                        <option selected="selected" value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select></td>
                </tr>

                <tr>
                    <td>Wilayah</td>
                    <td></td>
                    <td><select name="wilayah">
                        <option selected="selected" value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                    </select></td>
                </tr>

      		<tr>
						<td>No</td>
            <td></td>
       <?php
					$sql = "SELECT no FROM surat_keluar ORDER BY no DESC LIMIT 1";
					$result = mysql_query($sql);
					if(mysql_num_rows($result) > 0 ){
                        while($row = mysql_fetch_row($result)){
                            $NewID = $row[0] + 1;
                        }
                    }else{
                        $NewID = 1;
                    }
					
				?>
                      
                   <td><input id="no_urut" class="text validate[required]"  type="text" name="no_urut" value="<?php echo $NewID; ?>"/></td>        
            </tr>

            <tr>
							<td>Tanggal</td>
                <td></td>
               <?php $date = date("Y-m-d"); ?> 
                <td><input id="tanggal" class="text validate[required]" type="text" name="tgl" value="<?php echo "$date" ?>"  />(bulan-tanggal-tahun)</td>
             </tr>
             <tr>
        		<td>Kepada</td>
                <td></td>
                <td><input id="kpd" class="text validate[required]" type="text" name="kpd"  /></td>
             </tr>
             <tr valign="top">
        		<td>Tembusan</td>
                <td></td>
                <td><textarea id="tembusan" cols="50px" rows="1px" class="text" name="tembusan" /></textarea></td>
             </tr>
             <tr>
        		<tr>
        		<td>Perihal</td>
                <td></td>
                <td><input id="hal" class="text validate[required]" type="text" name="hal"  /></td>
             </tr>
             <tr>
        		<td>Keterangan</td>
                    <td></td>
                    <td><select name="keterangan">
                        <option selected="selected" value="Ket. Aktif Mahasiswa">Ket. Aktif Mahasiswa</option>
                        <option value="Rekomendasi Mahasiswa">Rekomendasi Mahasiswa</option>
                        <option value="Tugas Mahasiswa">Tugas Mahasiswa</option>
                        <option value="Batas Akhir Pengulangan Mahasiswa">Batas Akhir Pengulangan Mahasiswa</option>
                        <option value="Ket. Pindah Kuliah">Ket. Pindah Kuliah</option>
                        <option value="Ket. Lulus">Ket. Lulus</option>
                        <option value="Izin KKN Ke Perusahaan">Izin KKN Ke Perusahaan</option>
                        <option value="Izin PPL">Izin PPL</option>
                        <option value="Izin Observasi">Izin Observasi</option>
                        <option value="Izin Penelitian">Izin Penelitian</option>
                        <option value="Pemberitahuan Hari Libur Nasional">Pemberitahuan Hari Libur Nasional</option>
                        <option value="Permohonan Pindah Jurusan">Permohonan Pindah Jurusan</option>
                        <option value="Izin Kegiatan">Izin Kegiatan</option>
                        <option value="Izin Magang">Izin Magang</option>
                        <option value="Pegantar Pindah Kuliah Internal">Pegantar Pindah Kuliah Internal</option>
                        <option value="Balasan Cuti Mahasiswa">Balasan Cuti Mahasiswa</option>
                        <option value="Rekomendasi Tugas Akhir">Rekomendasi Tugas Akhir</option>
                        <option value="Izin Sosialisasi">Izin Sosialisasi</option>
                        <option value="Ket. Selesai Penelitan ">Ket. Selesai Penelitan </option>
                        <option value="Pemberitahuan Pindah Prodi">Pemberitahuan Pindah Prodi</option>
                        <option value="Ket. Bebas Biaya">Ket. Bebas Biaya</option>
                        <option value="Penangguhan pembayaran">Penangguhan pembayaran</option>
                        <option value="Tagihan Mahasiswa">Tagihan Mahasiswa</option>
                        <option value="Ket. Mendapatkan Beasiswa">Ket. Mendapatkan Beasiswa</option>
                        <option value="Ket. Pembimbing">Ket. Pembimbing</option>
                        <option value="Edaran Uas">Edaran Uas</option>
                        <option value="Edaran Herregistrasi Mahasiswa">Edaran Herregistrasi Mahasiswa</option>
                        <option value="ket. Proses Skripsi">ket. Proses Skripsi</option>
                        <option value="Tugas Dosen">Tugas Dosen</option>
                        <option value="Rekomendasi Dosen">Rekomendasi Dosen</option>
                        <option value="Pemberitahuan UAS">Pemberitahuan UAS</option>
                        <option value="Pemberitahuan Pengumpulan Nilai">Pemberitahuan Pengumpulan Nilai</option>
                        <option value="Lolos Butuh Dosen">Lolos Butuh Dosen</option>
                        <option value="Pernyataan Pengunduran Diri Dosen">Pernyataan Pengunduran Diri Dosen</option>
                        <option value="Balasan Cuti Dosen">Balasan Cuti Dosen</option>
                        <option value="Permohonan Sambutan">Permohonan Sambutan</option>
                        <option value="Perubahan Nama Dosen DIKTI">Perubahan Nama Dosen DIKTI</option>
                        <option value="Undangan">Undangan</option>
                        <option value="Izin Kunjungan">Izin Kunjungan</option>
                        <option value="Ket. Mengajar Kopertasi">Ket. Mengajar Kopertasi</option>
                        <option value="Pemberitahuan absen DPK">Pemberitahuan absen DPK</option>
                    </select></td>
             </tr>
            <tr>
             	<td></td>
             	<td colspan="2"><input type="submit" class="button button1" name="save" value="Simpan" /></td></td>
             </tr>
         </table>
         </form>
     
<?php }
// AKSI INPUT KELUAR
if($_GET['mod']=='actInputKeluar'){
		if (isset($_POST['save'])){
	
		$no = htmlentities($_POST['no_urut'],ENT_QUOTES);
        $struktur = htmlentities($_POST['struktur'],ENT_QUOTES);
        $substantif     = htmlentities($_POST['substantif'],ENT_QUOTES);
        $fasilitatif   = htmlentities(strtoupper($_POST['fasilitatif']),ENT_QUOTES);
        $wilayah = htmlentities($_POST['wilayah'],ENT_QUOTES);
        $tanggal = htmlentities($_POST['tgl'],ENT_QUOTES);
        $kepada    = htmlentities(strtoupper($_POST['kpd']),ENT_QUOTES);
        $tembusan    = htmlentities(strtoupper($_POST['tembusan']),ENT_QUOTES);
        $perihal    = htmlentities(strtoupper($_POST['hal']),ENT_QUOTES);
        $keterangan    = htmlentities($_POST['keterangan'],ENT_QUOTES);
        $creator = $_SESSION['username'];
        $waktu = getdate();
        $tahun = $waktu['year'];
        $bulan = date("m");

        //print_r($_POST);exit();
			
			
		$sql = "INSERT INTO surat_keluar (no,tahun,bulan,struktur,substantif,fasilitatif,wilayah,tanggal,kepada,tembusan,perihal,keterangan,creator) ";
		$sql.= "VALUES('$no','$tahun','$bulan','$struktur','$substantif','$fasilitatif', '$wilayah', '$tanggal', '$kepada', '$tembusan','$perihal','$keterangan','$creator')" or die ('error:'.mysql_error());
		$qr = mysql_query ($sql) or die ('error:'.mysql_error());
		if($qr){
			header("location:index.php?mod=suratKeluar");
			}else{
                echo "<script>alert('Data Gagal Disimpan')</script>";
                header("location:index.php?mod=suratKeluar");
            }
		}
	}

if($_GET['mod']=='editKeluar') { ?>
<?php 
    echo $_GET['id'];
    $no = $_GET['id'];
    $sql = "select * from surat_keluar where no = '$no'";
    $q = mysql_query($sql) or die(mysql_error());
    $d = mysql_fetch_array($q);
?>

  <p>Input Surat Keluar</p> 
    <form id="formID" method="post" action="index.php?mod=actInputKeluar";>
        <table bgcolor="EAFFEA">
                <tr>
                    <td>Struktur</td>
                    <td></td>
                    <td><select name="struktur">
                        <option selected="selected" value="Rek">Rek</option>
                        <option value="WR.I">WR.I</option>
                        <option value="WR.II">WR.II</option>
                        <option value="WR.III">WR.III</option>
                        <option value="Dir.I">Dir.I</option>
                        <option value="Dir.II">Dir.II</option>
                        <option value="Dir.III">Dir.III</option>
                        <option value="DK.FAI">DK.FAI</option>
                        <option value="DK.FTK">DK.FTK</option>
                        <option value="DK.FSH">DK.FSH</option>
                        <option value="DK.FIS">DK.FIS</option>
                        <option value="PAI">PAI</option>
                        <option value="AS">AS</option>
                        <option value="PSy">PSy</option>
                        <option value="Sos">Sos</option>
                        <option value="Psi">Psi</option>
                        <option value="Hkm">Hkm</option>
                        <option value="Akt">Akt</option>
                        <option value="PAUD">PAUD</option>
                        <option value="SI">SI</option>
                        <option value="TI">TI</option>
                        <option value="TE">TE</option>
                        <option value="TIn">TIn</option>
                        <option value="TA">TA</option>
                        <option value="PGMI">PGMI</option>
                        <option value="SKI">SKI</option>
                        <option value="ESy">ESy</option>
                        <option value="PPM">PPM</option>
                        <option value="LP3M">LP3M</option>
                        <option value="LPM">LPM</option>
                        <option value="BEM">BEM</option>
                        
                    </select></td>
                </tr>

                <tr>
                    <td>Substantif</td>
                    <td></td>
                    <td><select name="substantif">
                        <option selected="selected" value="000">000</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="300">300</option>
                        <option value="400">400</option>
                        <option value="500">500</option>
                        <option value="600">600</option>
                    </select></td>
                </tr>

                <tr>
                    <td>Fasilitatif</td>
                    <td></td>
                    <td><select name="fasilitatif">
                        <option selected="selected" value="01">01</option>
                        <option value="02">02</option>
                        <option value="03">03</option>
                        <option value="04">04</option>
                        <option value="05">05</option>
                        <option value="06">06</option>
                        <option value="07">07</option>
                        <option value="08">08</option>
                        <option value="09">09</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                    </select></td>
                </tr>

                <tr>
                    <td>Wilayah</td>
                    <td></td>
                    <td><select name="wilayah">
                        <option selected="selected" value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                    </select></td>
                </tr>

          <tr>
            <td>No</td>
            <td></td>                   
          <td><input id="no_urut" class="text validate[required]"  type="text" name="no_urut" value="<?php echo $d['no'] ?>"/>
          </td>        
            </tr>

            <tr>
              <td>Tanggal</td>
                <td></td>
               <?php $date = date("Y-m-d"); ?> 
                <td><input id="tanggal" class="text validate[required]" type="text" name="tgl" value="<?php echo "$date" ?>"  />(bulan-tanggal-tahun)</td>
             </tr>
             <tr>
            <td>Kepada</td>
                <td></td>
                <td><input id="kpd" class="text validate[required]" type="text" name="kpd" value="<?php echo $d['kepada'] ?>"  /></td>
             </tr>
             <tr valign="top">
            <td>Tembusan</td>
                <td></td>
                <td><textarea id="tembusan" cols="50px" rows="1px" class="text" name="tembusan" value="<?php echo $d['tembusan'] ?>" /></textarea></td>
             </tr>
             <tr>
            <tr>
            <td>Perihal</td>
                <td></td>
                <td><input id="hal" class="text validate[required]" type="text" name="hal" value="<?php echo $d['perihal'] ?>"  /></td>
             </tr>
             <tr>
            <td>Keterangan</td>
                    <td></td>
                    <td><select name="keterangan">
                        <option selected="selected" value="Ket. Aktif Mahasiswa">Ket. Aktif Mahasiswa</option>
                        <option value="Rekomendasi Mahasiswa">Rekomendasi Mahasiswa</option>
                        <option value="Tugas Mahasiswa">Tugas Mahasiswa</option>
                        <option value="Batas Akhir Pengulangan Mahasiswa">Batas Akhir Pengulangan Mahasiswa</option>
                        <option value="Ket. Pindah Kuliah">Ket. Pindah Kuliah</option>
                        <option value="Ket. Lulus">Ket. Lulus</option>
                        <option value="Izin KKN Ke Perusahaan">Izin KKN Ke Perusahaan</option>
                        <option value="Izin PPL">Izin PPL</option>
                        <option value="Izin Observasi">Izin Observasi</option>
                        <option value="Izin Penelitian">Izin Penelitian</option>
                        <option value="Pemberitahuan Hari Libur Nasional">Pemberitahuan Hari Libur Nasional</option>
                        <option value="Permohonan Pindah Jurusan">Permohonan Pindah Jurusan</option>
                        <option value="Izin Kegiatan">Izin Kegiatan</option>
                        <option value="Izin Magang">Izin Magang</option>
                        <option value="Pegantar Pindah Kuliah Internal">Pegantar Pindah Kuliah Internal</option>
                        <option value="Balasan Cuti Mahasiswa">Balasan Cuti Mahasiswa</option>
                        <option value="Rekomendasi Tugas Akhir">Rekomendasi Tugas Akhir</option>
                        <option value="Izin Sosialisasi">Izin Sosialisasi</option>
                        <option value="Ket. Selesai Penelitan ">Ket. Selesai Penelitan </option>
                        <option value="Pemberitahuan Pindah Prodi">Pemberitahuan Pindah Prodi</option>
                        <option value="Ket. Bebas Biaya">Ket. Bebas Biaya</option>
                        <option value="Penangguhan pembayaran">Penangguhan pembayaran</option>
                        <option value="Tagihan Mahasiswa">Tagihan Mahasiswa</option>
                        <option value="Ket. Mendapatkan Beasiswa">Ket. Mendapatkan Beasiswa</option>
                        <option value="Ket. Pembimbing">Ket. Pembimbing</option>
                        <option value="Edaran Uas">Edaran Uas</option>
                        <option value="Edaran Herregistrasi Mahasiswa">Edaran Herregistrasi Mahasiswa</option>
                        <option value="ket. Proses Skripsi">ket. Proses Skripsi</option>
                        <option value="Tugas Dosen">Tugas Dosen</option>
                        <option value="Rekomendasi Dosen">Rekomendasi Dosen</option>
                        <option value="Pemberitahuan UAS">Pemberitahuan UAS</option>
                        <option value="Pemberitahuan Pengumpulan Nilai">Pemberitahuan Pengumpulan Nilai</option>
                        <option value="Lolos Butuh Dosen">Lolos Butuh Dosen</option>
                        <option value="Pernyataan Pengunduran Diri Dosen">Pernyataan Pengunduran Diri Dosen</option>
                        <option value="Balasan Cuti Dosen">Balasan Cuti Dosen</option>
                        <option value="Permohonan Sambutan">Permohonan Sambutan</option>
                        <option value="Perubahan Nama Dosen DIKTI">Perubahan Nama Dosen DIKTI</option>
                        <option value="Undangan">Undangan</option>
                        <option value="Izin Kunjungan">Izin Kunjungan</option>
                        <option value="Ket. Mengajar Kopertasi">Ket. Mengajar Kopertasi</option>
                        <option value="Pemberitahuan absen DPK">Pemberitahuan absen DPK</option>
                    </select></td>
             </tr>
            <tr>
              <td></td>
              <td colspan="2"><input type="submit" class="button button1" name="save" value="Simpan" /></td></td>
             </tr>
         </table>
         </form>


<?php } 


//AKsi Edit
if ($_GET['mod']=='editskeluar') {
if (isset($_POST['save'])){
$sql = "UPDATE input_keluar SET no='$_POST[no]',
                              jenis_surat='$_POST[js]',
                              tgl_keluar='$_POST[tk]', 
                              tujuan='$_POST[tjn]',
                              tembusan='$_POST[tembs]',
                              hal='$_POST[hal]',
                              ket='$_POST[ket]'
                        WHERE no='$_POST[no]'";
    $qr = mysql_query ($sql) or die ('error:'.mysql_error());
    if($qr){
      header("location:../suratKeluar.php");
      }
    else{
      echo "Tidak dapat diupdate.";
      }
}
else if(isset($_POST['cancel'])){
  header("location:../suratKeluar.php");
  }
}



if ($_GET['mod']=='hapusKeluar') {
$no = $_GET['id'];
$sql = "delete from surat_keluar where no = '$no'";
    $qr = mysql_query ($sql) or die ('error:'.mysql_error());
    if($qr){
      header("location:index.php?mod=suratKeluar");
      }
    else{
      echo "<script>alert('Data Tidak Dapat Dihapus');</script>";
      }
}

// LIHAT SURAT KELUAR 

if($_GET['mod']=='suratKeluar'){?>
		<h1><b>Detail Surat Keluar</b></h1>
    	<table width="100%" class="tabelDetail">
          	<tr align="left">
            	<th width="3%">No Urut</th>
              <th width="15%">No Surat</th>
              <th width="7%">Tanggal</th>
              <th width="15%">Kepada</th>
              <th width="15%">Tembusan</th>
              <th width="20%">Perihal</th>
              <th>Keterangan</th>
              <th>Aksi</th>
            </tr>
            <tr>
<!--             agdDtdd,agdPli,asal,nmrSrt,hal-->
            <?php
			$dataPerPage = 8;

			if(isset($_GET['page'])){
				$noPage = $_GET['page'];
				}
			else $noPage = 1;
			$offset = ($noPage - 1) * $dataPerPage;
		
				$sql = "SELECT * FROM surat_keluar ORDER BY no DESC LIMIT $offset, $dataPerPage";
				$result = mysql_query ($sql);
				$baris=1;
				while ($row = mysql_fetch_assoc($result)){
				$warna="#ffffff";
				if($baris % 2 == 0){
					$warna="#E1E1E1";
					}
				echo "<tr bgcolor=".$warna.">";
				
				?>	
                
                <td align="center"><?php echo "$row[no]"; ?></td>
            	<td align="center"><?php echo "$row[struktur].$row[no]./$row[substantif]./$row[fasilitatif]./$row[wilayah]"; ?></td>
                <td align="center"><?php echo tgl_indo($row['tanggal']); ?></td>
                <td align="center"><?php echo "$row[kepada]"; ?></td>
                <td align="center"><?php echo "$row[tembusan]"; ?></td>
                <td align="center"><?php echo "$row[perihal]"; ?></td>
                <td align="center"><?php echo "$row[keterangan]"; ?></td>
                <td> 
                  <!-- <a href="index.php?mod=editKeluar&id=<?php echo "$row[no]"; ?>">edit </a> -->
                  <a href="index.php?mod=hapusKeluar&id=<?php echo "$row[no]"; ?>">hapus</a> 
                </td>
                              
            </tr>
            <?php 
			$baris++;
						} ?>
            
          </table> 

	<?php	
	// mencari jumlah semua data dalam tabel inputmasuk

			$query = "SELECT COUNT(*) AS jmlData FROM surat_keluar";
			$hasil = mysql_query($query);
			$data  = mysql_fetch_array($hasil);
			$jumData = $data['jmlData'];
			$showPage = 0;
			$jumPage = ceil($jumData / $dataPerPage);

			// menampilkan link previous
			echo "<div class=pages>";
			if($noPage > 1){echo "<a href='".$_SERVER['PHP_SELF']."?mod=suratKeluar&&page=".($noPage-1)."'>&lt;&lt; Prev</a>";}
			for($page = 1; $page <= $jumPage; $page++)
			{
					 if ((($page >= $noPage - 1) && ($page <= $noPage + 1)) || ($page == 1) || ($page == $jumPage)) /*memunculkan link nomor halaman 1 dan juga halaman terakhir, sekaligus pula nomor-nomor halaman dalam rentang 3 halaman sebelum dan sesudah nomor halaman yang aktif. Contoh jika halaman yang aktif adalah halaman 7 dari 15 halaman, maka nanti diharapkan nomor halaman yang muncul adalah 1 4 5 6 7 8 9 10 15*/
					 {
						if (($showPage == 1) && ($page != 2))  echo "<span>...</span>"; /*memunculkan tanda ��� di antara halaman nomor 1 dengan halaman berikutnya yang tampil. Tapi perlu diingat bahwa tanda ini akan muncul bila nomor halaman yang muncul setelah 1 ialah bukan 2. Apabila setelah 1 ini muncul 2, maka tanda ini tidak muncul*/
						if (($showPage != ($jumPage - 1)) && ($page == $jumPage))  echo "<span>...</span>"; /*memunculkan tanda ��� sebelum nomor halaman terakhir bila halaman sebelumnya yang muncul bukan �nomor halaman terakhir � 1*/
						if ($page == $noPage) echo " <span class=current><b>".$page."</b> </span>";
						else echo " <a href='".$_SERVER['PHP_SELF']."?mod=suratKeluar&page=".$page."'>".$page."</a> ";/*menampilkan link nomor halaman. Namun link dari nomor halaman ini ditampilkan hanya pada nomor halaman yang sedang tidak aktif. Sedangkan pada nomor halaman yang sedang aktif nomor halaman hanya dicetak tebal saja*/
						$showPage = $page;
					 }
			}
			
			// menampilkan link next
			if ($noPage < $jumPage) echo "<a href='".$_SERVER['PHP_SELF']."?mod=suratKeluar&&page=".($noPage+1)."'>Next &gt;&gt;</a>";
			
			echo "</div> ";
	
	}
// CARI KELUAR
if($_GET['mod']=='cariKeluar'){
?>
		<p>Pencarian Data Surat Keluar</p>
      Isikan parameter pencarian di sini!
    <form name="formCari" method="post" action="index.php?mod=actCariKeluar">
    		<!--<input type="button" name="Check_All" value="Pilih Semua" id="checkAll" /><br />
      	<input type="checkbox" name="chkCari[]" value="1" class="check" />No <br />       
        <input type="checkbox" name="chkCari[]" value="2" class="check" />Struktur <br />
        <input type="checkbox" name="chkCari[]" value="3" class="check" />Substantif <br />
        <input type="checkbox" name="chkCari[]" value="4" class="check" />Fasilitatif<br /><br />-->
        <input type="text" name="cari" class="text" />
     		<input type="submit" class="button button2" name="crKeluar" value="Cari" />
    </form><br />
<?php }


// AKSI CARI KELUAR

if($_GET['mod']=='actCariKeluar'){
echo "<table width=100% class='tabelDetail'>
<tr align='left'>
					<th width=3%>No Urut</th>
					<th width=15%>No Surat </th>
					<th width=7%>Tanggal </th>
					<th width=15%>Kepada</th>
					<th width=15%>Tembusan</th>
					<th width=20%>Perihal</th>
					<th>Keterangan</th>
				</tr>
";
$kata = trim($_POST['cari']);
  // mencegah XSS
  $kata = htmlentities(htmlspecialchars($kata), ENT_QUOTES);

  // pisahkan kata per kalimat lalu hitung jumlah kata
  $pisah_kata = explode(" ",$kata);
  $jml_katakan = (integer)count($pisah_kata);
  $jml_kata = $jml_katakan-1;

  $cari = "SELECT * FROM surat_keluar WHERE " ;
    for ($i=0; $i<=$jml_kata; $i++){
      $cari .= "no LIKE '%$pisah_kata[$i]%' OR struktur LIKE '%$pisah_kata[$i]%' OR fasilitatif LIKE '%$pisah_kata[$i]%' OR substantif LIKE '%$pisah_kata[$i]%' OR perihal LIKE '%$pisah_kata[$i]%' OR kepada LIKE '%$pisah_kata[$i]%' OR keterangan LIKE '%$pisah_kata[$i]%'";
					if ($i < $jml_kata ){
						$cari .= " OR ";
					}
    		}
  $cari .= " ORDER BY no DESC ";
  $hasil  = mysql_query($cari);
  $ketemu = mysql_num_rows($hasil);

	if ($ketemu > 0){?>
    	
		<?php 
		 while($data=mysql_fetch_array($hasil)){
			$tgl_keluar = tgl_indo($data['tanggal']);
			echo "
				
				<tr>
			   	<td>$data[no]</td>
                <td> $data[struktur].$data[no]./$data[substantif]./$data[fasilitatif]./$data[wilayah] </td>
					<td align=center>$tgl_keluar</td>
					<td>$data[kepada]</td>
					<td>$data[tembusan]</td>
					<td>$data[perihal]</td>
					<td>$data[keterangan]</td>
					
				</tr>
				 		
			 ";
		  }?>        
		 </table>
	  <?php }
	  else{
			echo "<p>Tidak ditemukan dengan parameter \"<b>$kata</b>\"</p>";
	  }
}

if($_GET['mod']=='cetakMasuk'){
	include "cetakMasuk.php";
	}
	
if($_GET['mod']=='cetakKeluar'){
	include "cetakKeluar.php";
	}
	
?>

