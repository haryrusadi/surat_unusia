<?php
ob_start();
session_start();

// cek apakah user yang mengakses halaman ini sudah melalui login atau belum
// logikanya jika user telah login dan sukses, maka SESSION level dan SESSION username ini pasti sudah ada
// jika ada user yang mencoba akses halaman ini tanpa login, maka logikanya kedua SESSION belum ada

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<bgsound src="TRACK01.MP3" loop="-1" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title> SISTEM INFORMASI PERSURATAN UNUSIA JAKARTA</title>
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
		$( "#tanggal" ).datepicker();
	});
	$(function() {
		$( "#tglterima" ).datepicker();
	});
	$(function() {
		$( "#tglsurat" ).datepicker();
	});
</script>

<!-- script validate -->
<script>
        $(document).ready(function(){
                // binds form submission and fields to the validation engine
                $("#formID").validationEngine();
								   });
				
            function checkHELLO(field, rules, i, options){
                if (field.val() != "HELLO") {
                    // this allows to use i18 for the error msgs
                    return options.allrules.validate2fields.alertText;
                }
			
            }
  </script>
  
 <script type="text/javascript">
 	$(document).ready(function(){
			//hilite input		
				/*$(':input:not([type="sumbit"])').each(function(){
							$(this).focus(function(){
								$(this).addClass('hilite');
								});
							$(this).blur(function(){
								$(this).removeClass('hilite');
								});	
					});
				
			$("tbody tr").mouseover(function(){
				$(this).addClass("over");
			});
			$("tbody tr").mouseout(function(){
				$(this).removeClass("over");
			});
			           	*/					   
	});
	

	
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
<script>
	$(document).ready(function(){
		setInterval(function(){
			$('#divjam').load('jam.php?acak='+ Math.random());					 
	 }, 1000); //refresh tiap 1 detik					   
	});
</script>
<script type="text/javascript">
var df=document.forms;
window.onload=function() {
df[0][0].focus();
}
</script>

</head>

<body>
<?php if (isset($_SESSION['level']) && isset($_SESSION['username']))
{
   // tampilkan menu.
   // menu hanya ditampilkan bila halaman ini diakses oleh user yang telah login

   //include "menu.php";

   // cek level user apakah admin atau bukan

   if ($_SESSION['level'] == "admin" || $_SESSION['level'] == "user")
   { 
	echo "<div>
		<div class='logo'><img src='images/logo_unusia.png' height='60px' /></div>
		<div class='judul'>SISTEM INFORMASI PERSURATAN <br> UNUSIA JAKARTA</div>
		<div class='clear'></div>";
	 include "menu.php";
	 echo "<div class='clear'></div>";
	 echo "<div id='divjam'></div";
	  echo "<div class='clear'></div>";
	 echo " <div id='container'>";
    	include "tengah.php";
    echo "</div>";
      
	//include "includes/footer.php";
	
	}
}
else
{
   header ("location:login.php");
}

?>
</body>
</html>
   


