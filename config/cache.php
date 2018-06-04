<?php 
header("Expires: Tue, 01 Jul 2001 06:00:00 GMT"); 
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT"); 
header("Cache-Control: no-store, no-cache, must-revalidate"); 
header("Cache-Control: post-check=0, pre-check=0", false); 
header("Pragma: no-cache"); 
date_default_timezone_set('America/Mexico_City');

if ( isset($_COOKIE['us_PGO']) ){
	session_name($_COOKIE['us_PGO']);
	session_start();
}