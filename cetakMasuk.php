<?php
require_once "config/connect.php";
//session_start();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> LAPORAN SURAT </title>
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
<form action="action/aksiCetakMasuk.php" method="post" target="_blank">
	<i>format tanggal mm-dd-yyyy, contoh: tgl 10 Mei 2019 -> 05-10-2019</i><br /><br />
	dari tanggal <input id="dateAwal" class="text" type="text" name="tglAwal" value=""  />
    s.d. <input id="dateAkhir" class="text" type="text" name="tglAkhir" value=""  /><br />
    <br />
    <input type="submit" name="submit" value="CETAK"/>
    
</form>
</body>
</html>
