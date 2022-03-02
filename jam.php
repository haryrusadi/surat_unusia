<?php
header("Content-Type: text/plain");
header("Cache-Control: no-cache, must-revalidates");
header("Expires: Mon, 13 May 1985 07:07:07 GMT");

date_default_timezone_set ("Asia/Jakarta");
$jam = date("D, d/m/y -- H:i:s");
echo "$jam";
?>