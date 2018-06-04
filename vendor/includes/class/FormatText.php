<?php
# @Date:   2018-01-03T13:59:50-06:00
# @Last modified time: 2018-02-07T12:27:12-06:00

class FormatText {

  var $salida;


  function date_today_print() {

      date_default_timezone_set("America/Mexico_City");
      $dia = (int)date("d");
      $mes = date("m");
      $year = (int)date("Y");
      $matmes = array("01" => 'Enero', "02" => 'Febrero', "03" => 'Marzo', "04" => 'Abril',
          "05" => 'Mayo', "06" => 'Junio', "07" => 'Julio', "08" => 'Agosto', "09" => 'Septiembre',
          "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre');

      return $this->salida = 
      "<b><u>TUXTLA GUTIÉRRREZ, CHIAPAS,</u></b> a los <b><u>" .$dia."</u></b> días del mes de <b><u>".strtoupper($matmes[$mes])."</u></b> del <b><u>".$year."</u></b>";
  }

  function Fecha2($Fecha) {
      date_default_timezone_set("America/Mexico_City");
      $datos = explode("-", $Fecha);
      $dia = $datos[2];
      $mes = $datos[1];
      $year = $datos[0];
      $matmes = array("01" => 'Enero', "02" => 'Febrero', "03" => 'Marzo', "04" => 'Abril',
          "05" => 'Mayo', "06" => 'Junio', "07" => 'Julio', "08" => 'Agosto', "09" => 'Septiembre',
          "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre');

      return $this->salida = $dia . " de " . $matmes[$mes] . " de " . $year;
  }


  function Fechaformato($Fecha) {
      date_default_timezone_set("America/Mexico_City");
      $datos = explode("/", $Fecha);
      $dia = $datos[0];
      $mes = $datos[1];
      $year = $datos[2];
      $matmes = array("01" => 'Enero', "02" => 'Febrero', "03" => 'Marzo', "04" => 'Abril',
          "05" => 'Mayo', "06" => 'Junio', "07" => 'Julio', "08" => 'Agosto', "09" => 'Septiembre',
          "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre');

      return $this->salida = $dia . " de " . $matmes[$mes] . " de " . $year;
  }
    
  function Fecha2Mayusculas($Fecha) {
      $datos = explode("-", $Fecha);
      $dia = $datos[2];
      $mes = $datos[1];
      $year = $datos[0];
      $matmes = array("01" => 'ENERO', "02" => 'FEBRERO', "03" => 'MARZO', "04" => 'ABRIL',
          "05" => 'MAYO', "06" => 'JUNIO', "07" => 'JULIO', "08" => 'AGOSTO', "09" => 'SEPTIEMBRE',
          "10" => 'OCTUBRE', "11" => 'NOVIEMBRE', "12" => 'DICIEMBRE');

      return $this->salida = $dia . " DE " . $matmes[$mes] . " DE " . $year;
  }

  function CortarFecha($Fecha_Hora, $Posicion, $Caracter) {
      $Fecha = explode($Caracter, $Fecha_Hora);
      return $Fecha[$Posicion];
  }

  function str_fech($curso, $anio){

    $mesLetra =
    array(
          "01" => 'Enero', "02" => 'Febrero', "03" => 'Marzo', "04" => 'Abril',
          "05" => 'Mayo', "06" => 'Junio', "07" => 'Julio', "08" => 'Agosto', "09" => 'Septiembre',
          "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre'
        );

    $fch = explode("-", $curso);

    $d = $fch[0]; 
    $m = $mesLetra[ trim($fch[1]) ];

    return  $this->salida = strtoupper($d." de ".$m." del ".$anio);
  }

  function calc_backward_ciclo($grado, $ciclo, $anio, $modalidad){

    $periodos["sem"] = array(null, "01-06", "08-12");
    $periodos["cua"] = array(null, "01-04", "05-08", "09-12");

    $grado_actual = $grado; $anio_actual = $anio; $ciclo_actual = (int)($ciclo); $entry = 0;

    $mod = strtolower($modalidad);
    #$mod = substr($modalidad, 0, 3);
    $no_per =  count( $periodos[$mod] ) - 1;

    switch ($mod) {
      case "cua":
        if ($ciclo_actual <= 1)
          $indx_periodo = 1;
        else if ($ciclo_actual > 1 && $ciclo_actual < 9)
          $indx_periodo = 2;
        else
          $indx_periodo = 3;     
        break;

      case "sem":
        if ($ciclo_actual <= 1)
          $indx_periodo = 1;
        else 
          $indx_periodo = 2;       
        break;

      default:
        $indx_periodo = false;
        break;
    }

    for ($i = $grado_actual; ($grado_actual-1) <= $i; $i--) {

    if ($no_per === 2) { 
      if ($indx_periodo > 1){ //$indx_periodo = 2
          $periodo_actual = /*i+"=>"+*/$periodos[$mod][$indx_periodo]."-".$anio_actual;        
          $indx_periodo = 1;
          $entry = 0;

      } else { //$indx_periodo = 1       
        if ($entry < 1){ //$entry = 0
          $periodo_actual = /*i+"=>"+*/$periodos[$mod][$indx_periodo]."-".$anio_actual--;
          $indx_periodo = 2;
          $entry++;
        }     
      }

    } else if($no_per === 3) {
      if ($indx_periodo > 2) { //$indx_periodo = 3
        if ($entry > 0 && $entry < 2) { //$entry = 1
          $periodo_actual = /*i+"=>"+*/$periodos[$mod][$indx_periodo]."-".$anio_actual;
          $indx_periodo = 2;
          $entry++;
        } 
      } else if ($indx_periodo > 1 && $indx_periodo < 3) { //$indx_periodo = 2
        $periodo_actual = /*i+"=>"+*/$periodos[$mod][$indx_periodo]."-".$anio_actual;
        $indx_periodo = 1;
        $entry = 0;

      } else { //$indx_periodo = 1
        if ($entry < 1) { //$entry = 0
          $periodo_actual = /*i+"=>"+*/$periodos[$mod][$indx_periodo]."-".$anio_actual--;
          $indx_periodo = 3;
          $entry++; 
        } 
      }

    } else 
      return null;
  }

  return $periodo_actual;
  }

  function LetrasCiclo($Fecha_Ciclo) {
      $datos = explode("-", $Fecha_Ciclo);
      $m1 = $datos[0];
      $m2 = $datos[1];
      $year = $datos[2];
      $mes = array("01" => 'Enero', "02" => 'Febrero', "03" => 'Marzo', "04" => 'Abril',
          "05" => 'Mayo', "06" => 'Junio', "07" => 'Julio', "08" => 'Agosto', "09" => 'Septiembre',
          "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre');

      return $this->salida = $mes[$m1]." - " .$mes[$m2]." /".$year;
  }



}
