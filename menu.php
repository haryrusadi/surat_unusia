<?php
include "config/connect.php";
//session_start();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> APLIKASI SURAT DTDD</title>
<meta name="Author" content="Stu Nicholls" />

<link rel="stylesheet" type="text/css" href="css/menu.css" />
<script src="src/stuHover.js" type="text/javascript"></script>

</head>

<body>




	
<?php

 if (isset($_SESSION['level']) && isset($_SESSION['username']))
	{
			 if ($_SESSION['level'] == "admin")
				{ 
					echo "
				<ul id='nav'>
					<li class='top'><a href='index.php?mod=home' class='top_link'><span>Home</span></a></li>
					<li class='top'><a href='index.php?mod=suratMasuk' class='top_link'><span class='down'>Surat Masuk</span></a>
						<ul class='sub'>
							<li><a href='index.php?mod=inputMasuk'>Input Surat Masuk</a></li>
							<li><a href='index.php?mod=cariMasuk'>Cari Surat Masuk</a></li>
							<li><a href='excelRptMasuk.php'>Download (.xls)</a></li>
						</ul>
					</li>
					<li class='top'><a href='index.php?mod=suratKeluar' class='top_link'><span class='down'>Surat Keluar</span></a>
						<ul class='sub'>
							<li><a href=index.php?mod=inputKeluar>Input Surat Keluar</a></li>
							<li><a href=index.php?mod=cariKeluar>Cari Surat Keluar</a></li>
							<li><a href='excelRptKeluar.php'>Download (.xls)</a></li> 
						</ul>
					</li>
					<div class='user'> <i><a href='logout.php'>(logout)</a> </i> <i><a>$_SESSION[username]</a></i></div>
				</ul>
						";
				   }else {
					   echo "
				<ul id='nav'>
						<li class='top'><a href='index.php?mod=home' class='top_link'><span>Home</span></a></li>
						<li class='top'><a href='index.php?mod=suratMasuk' class='top_link'><span class='down'>Surat Masuk</span></a>
							<ul class='sub'>
								<li><a href='index.php?mod=cariMasuk'>Cari Surat Masuk</a></li>
							</ul>
						</li>
					<div class='user'> <i><a href='logout.php'>(logout)</a> </i> <i><a>$_SESSION[username]</a></i></div>
				</ul>
						";
				}
 		}
?>		

  
	


</body>
</html>
