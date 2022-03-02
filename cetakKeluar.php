<?php
require_once "config/connect.php";
//session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> APLIKASI SURAT DTDD</title>
<meta name="Author" content="Stu Nicholls" />
<link rel="stylesheet" type="text/css" href="css/menu.css" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/ui-lightness/jquery-ui-1.8.16.custom.css" />
<link rel="stylesheet" type="text/css" href="css/validationEngine.jquery.css"/>
<link rel="stylesheet" type="text/css" href="css/paging_style.css"/>

<script src="src/jquery-1.6.js" type="text/javascript"></script>
<script src="src/jquery-ui-1.8.16.custom.min.js" type="text/javascript"></script>
<script src="src/stuHover.js" type="text/javascript"></script>
<script src="src/jquery.validationEngine.js" type="text/javascript"></script>
<script src="src/jquery.validationEngine-en.js" type="text/javascript"></script>


<script>
	$(function() {
		$( "#dateAwal" ).datepicker();
	});
	$(function() {
		$( "#dateAkhir" ).datepicker(); 
	});
</script>
</head>
<body>
<form action="action/aksiCetakKeluar.php" method="post" target="_blank">
	<table width="50%" class="tabelDetailForm">
		<tr>
                    <td width="20%">Struktur</td>
                    <td></td>
                    <td><select name="struktur" id="struktur">
                        <option selected="selected" value="">--Pilih--</option>
                        <option value="Rek-">Rek</option>
                        <option value="WR.I-">WR.I</option>
                        <option value="WR.II-">WR.II</option>
                        <option value="WR.III-">WR.III</option>
                        <option value="Dir.I-">Dir.I</option>
                        <option value="Dir.II-">Dir.II</option>
                        <option value="Dir.III-">Dir.III</option>
                        <option value="DK.FAI-">DK.FAI</option>
                        <option value="DK.FTK-">DK.FTK</option>
                        <option value="DK.FSH-">DK.FSH</option>
                        <option value="DK.FIS-">DK.FIS</option>
                        <option value="PAI-">PAI</option>
                        <option value="AS-">AS</option>
                        <option value="PSy-">PSy</option>
                        <option value="Sos-">Sos</option>
                        <option value="Psi-">Psi</option>
                        <option value="Hkm-">Hkm</option>
                        <option value="Akt-">Akt</option>
                        <option value="PAUD-">PAUD</option>
                        <option value="SI-">SI</option>
                        <option value="TI-">TI</option>
                        <option value="TE-">TE</option>
                        <option value="TIn-">TIn</option>
                        <option value="TA-">TA</option>
                        <option value="PGMI-">PGMI</option>
                        <option value="SKI-">SKI</option>
                        <option value="ESy-">ESy</option>
                        <option value="PPM-">PPM</option>
                        <option value="LP3M-">LP3M</option>
                        <option value="LPM-">LPM</option>
                        <option value="BEM-">BEM</option>
                        
                    </select></td>
                </tr>
                
                <tr>
                    <td>Substantif</td>
                    <td></td>
                    <td><select name="substantif">
                        <option value="">--Pilih--</option>
                        <option value="000">000</option>
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
                        <option value="">--Pilih--</option>
                        <option value="01">01</option>
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
                        <option value="">--Pilih--</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                    </select></td>
                </tr>
                <tr>
                    <td>Tanggal Awal</td>
                    <td></td>
                    <td><input id="dateAwal" class="text validate[required]" type="text" name="tglAwal" autocomplete="off" value=""  /></td>
                </tr>
                <tr>
                    <td>Tanggal Akhir</td>
                    <td></td>
                    <td><input id="dateAkhir" class="text validate[required]" type="text" name="tglAkhir" autocomplete="off" value=""  /></td>
                </tr>
                <tr>
                    <td></td>
                    <td></td>
                    <td><input type="submit" name="submit" class="button button1" value="CETAK"/><input type="submit" name="submit" class="button button2" value="DOWNLOAD"/></td>
                </tr>
	</table>
    
    
</form>
</body>
</html>
