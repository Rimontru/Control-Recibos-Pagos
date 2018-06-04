<?php
if ( isset($_GET['id_ciclo']) AND isset($_GET['id_grupo']) ) :
  

require_once "../core/database/Conectar.php";
require_once "../core/database/HelperBase.php";
require_once "../vendor/includes/class/FormatText.php";

$ObjQuery = new HelperBase();
$ObjFmTxt = new FormatText();

$timeo_start = microtime(true);
ini_set("memory_limit","280824M");
ini_set('max_execution_time', 400);
ob_start();


$filename = 'reportepagos.xls';
header('Content-Type: application/vnd.ms-excel');
header('Content-Disposition: attachment; filename='.$filename);

echo
'<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">

body {font-family: "Arial, Helvetica", sans-serif;}
.text  { font-size:12px;}
.text2 {font-size:11px;text-align:justify;}
.titulos {font-size:15px;}
.bg {background-color:#E9E9E9;}

.e3 {border-width: 1px;border-bottom: solid rgb(36, 92, 77);}
.e4 {border-width: 5px;border-top: solid rgb(36, 92, 77); margin-top:2px;}

.tbl1 {border-top:solid 1px black;border-right:solid 1px black;border-left:solid 1px black;}
.td {border-bottom:solid 1px black;}
.td1 {border-right:solid 1px black;}';

echo '
<table cellpadding="0" cellspacing="0" border="0" width="805" align="center" class="text2 tbl1">
  <tr>
    <td class="bg td td1"><center><b>MATRICULA</center></td>
    <td class="bg td td1"><center><b>NOMBRE</center></td>
    <td class="bg td td1"><center><b>CONCEPTO</center></td>
    <td class="bg td td1"><center><b>FOLIO</center></td>
    <td class="bg td td1"><center><b>BECA %</center></td>
    <td class="bg td td1"><center><b>MONTO</center></td>
  </tr>
';

$result_datas = $ObjQuery->getPagosAlumno($_GET['id_grupo'],$_GET['id_ciclo']);
if ( !is_bool($result_datas) && !is_null($result_datas) ) {
  foreach ($result_datas AS $dataPago) {
    echo '
      <tr>
        <td class="bg td td1"><center>'.$dataPago->matricula.'</center></td>
        <td class="bg td td1"><center>'.$dataPago->nomb_alu.'</center></td>
        <td class="bg td td1"><center>'.$dataPago->descripcion.'</center></td>
        <td class="bg td td1"><center>'.$dataPago->folio.'</center></td>
        <td class="bg td td1"><center>'.$dataPago->porbeca.' %</center></td>
        <td class="bg td td1"><center>$'.number_format($dataPago->monto,2).'</center></td>
      </tr>
    ';
  }
} else 
  die("No hay datos para mostrar");
else : 
  die("No se recibieron parametros del servidor...");

endif;