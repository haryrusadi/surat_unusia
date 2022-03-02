<?php
function tgl_indo($tgl){
	
	$d = substr ($tgl,3,2);
	$m = substr ($tgl,0,2);
	$y = substr ($tgl,6,4);
	
	return $d."-".$m."-".$y;
	}
?>

