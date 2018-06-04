<?php
class PagosController extends ControladorBase {
  public $conectar;
  public $adapter;
  public $Objmid;

  public function __construct() {
    parent::__construct();
    
    $this->conectar = new Conectar();
    $this->Objmid = new Middleware();
    $this->adapter = $this->conectar->cnxMySqli();
  }
   
  private function uncriptid($val){

    $prt = explode("x", $val);
    $this->val = $prt[1];

  return $this->val;
  }

  private function uncryptid($val, $pos){

    $prt = explode("x", $val);
    $this->val = $prt[$pos];

  return $this->val;
  }
/*
  public function index() {

    $this->view("consultar", 
      [
      "title" => "consultar alumno", 
      "pgo" => "Control de Pagos",
      "ctl" => "pagos",
      "acc" => "buscar",
      "prm" => ID_DEFECTO,
      "load" => 2,
      ]  
    );
  }
   
  public function buscar(){

    if ( isset($_POST['ipt_search']) AND !empty($_POST['ipt_search'])) {
       
    $find = htmlentities($_POST['ipt_search']);
    $ObjAlumno = new ModeloBase('alumnos',$this->adapter);

    if( is_bool($result = $ObjAlumno->findAlumno(trim($find))) ) $load = 0; else $load = 1;

      $this->view("consultar", 
        [
          "title" => "consultar pagos", 
          "pgo" => "Control de Pagos",
          "ctl" => "pagos",
          "acc" => "registros",
          "load" => $load,
          "datas" => $result
        ]
      );

     $this->conectar->OutCnx();

    } else 
       $this->redirect("pagos", ACCION_DEFECTO, ID_DEFECTO);
    
  }

  public function listar(){

    if ( isset($_GET["id"]) AND !empty(trim($_GET["id"])) ) {

    $catch_id =  $this->uncriptid( trim($_GET["id"]) );
       
    $find = htmlentities($catch_id);
    $ObjAlumno = new ModeloBase('alumnos',$this->adapter);

    if( is_bool($result = $ObjAlumno->findAlumnoId(trim($find))) ) $load = 0; else $load = 1;

      $this->view("consultar", 
        [
          "title" => "consultar pagos", 
          "pgo" => "Control de Pagos",
          "ctl" => "pagos",
          "acc" => "registros",
          "load" => $load,
          "datas" => $result
        ]
      );

     $this->conectar->OutCnx();

    } else 
       $this->redirect("pagos", ACCION_DEFECTO, ID_DEFECTO);
    
  }*/

  public function registros() {
    if ( isset($_GET["id"]) AND !empty(trim($_GET["id"])) ) {

      $catch_id =  $this->uncriptid( trim($_GET["id"]) );

      $find = htmlentities(trim($catch_id));
      $ObjPagos = new ModeloBase('alumnos',$this->adapter);
      $alumno = $ObjPagos->getById($catch_id);
//      var_dump($alumno);die;
        if( is_bool($result = $ObjPagos->find_registros_pagos_alumno($find)) ) 
          $load = 0;
        else 
          $load = 3;

         $this->view("consultar", 
          [
            "title" => "registros del alumno", 
            "pgo" => "Control de Pagos",
            "detalle" => $alumno,
            "ctl" => "pagos",
            "acc" => "detalles",
            "load" => $load,
            "prm" => ID_DEFECTO,
            "datas" => $result
          ]
        );

    $this->conectar->OutCnx();

    } else 
          die ("Fallo la consulta del registro...");
  }

  public function detalles() {
    if ( isset($_GET["id"]) AND !empty(trim($_GET["id"])) ) {

      $id_alu =  $this->uncryptid( htmlentities(trim($_GET["id"])), 1 );
      $id_cic =  $this->uncryptid( htmlentities(trim($_GET["id"])), 2 );

      $ObjPagos = new ModeloBase('pagos',$this->adapter);

        if( is_bool($result = $ObjPagos->find_alumno_pagos($id_alu, $id_cic)) ) 
          $load = 0;
        else 
          $load = 4;

      $ObjAlu = new ModeloBase('alumnos',$this->adapter);
      $alumno = $ObjAlu->getById($id_alu);

         $this->view("consultar", 
          [
            "title" => "detalles del registros", 
            "pgo" => "Control de Pagos",
            "detalle" => $alumno,
            "ctl" => "pagos",
            "acc" => "ver",
            "load" => $load,
            "prm" => ID_DEFECTO,
            "datas" => $result
          ]
        );

    $this->conectar->OutCnx();

    } else 
          die ("Fallo la consulta del registro...");
  }

  public function crear() {

    if ( isset($_POST['dos']) AND !empty(trim($_POST['dos'])) ) {
        if ( isset($_POST['rndUnk']) AND trim($_POST['rndUnk']) == $_SESSION['uniqe'] ) :

           $catch_id =  $this->uncriptid( trim($_GET["id"]) );

          $pagos = new Pagos($this->adapter);

          $pagos->set_folio(trim(htmlentities($_POST['dos'])));
          $pagos->set_monto(trim(htmlentities($_POST['tres'])));
          $pagos->set_beca(trim(htmlentities($_POST['siete'])));
          $pagos->set_id_alumno(trim(htmlentities($catch_id)));
          $pagos->set_id_concepto(trim(htmlentities($_POST['cinco'])));
          $pagos->set_id_ciclo(trim(htmlentities($_POST['seis'])));
          unset($_SESSION['uniqe']);

          if ( is_bool($pagos->save()) ) {
            $this->redirect("grupos",ACCION_DEFECTO,ID_DEFECTO);
            $this->conectar->OutCnx();
          } else
              die("Error en el guardado de pagos.  =>".$pagos->save() );

        else:
          $this->redirect("grupos",ACCION_DEFECTO,ID_DEFECTO);
        endif;

    } else {

        $_SESSION['uniqe'] = uniqid();
      if ( isset($_GET["id"]) AND !empty(trim($_GET["id"])) ) {

        $ObjConceptos = new Conceptos($this->adapter);
        $conceptos = $ObjConceptos->getAll();

        $ObjCiclos = new ModeloBase('ciclos_escolares',$this->adapter);
        $ciclos = $ObjCiclos->getAll();

         $mesLetra = array("01" => 'Enero', "02" => 'Febrero', "03" => 'Marzo', "04" => 'Abril',
          "05" => 'Mayo', "06" => 'Junio', "07" => 'Julio', "08" => 'Agosto', "09" => 'Septiembre',
          "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre');
         
          if( !is_bool($conceptos) && !is_bool($ciclos)) {
            $cie=null;$cpt=null;
            foreach($ciclos AS $rowC){
              $desc = trim($mesLetra[$rowC->mes_inicio]." / ".$mesLetra[$rowC->mes_fin]." ".$rowC->anio);
              $cie .= "<option value='$rowC->id'>$desc</option>";
            }
            
            foreach($conceptos AS $rowO){
              $cpt .= "<option value='$rowO->id'>".ucwords($rowO->descripcion)."</option>";
            }
            $id_alu =  $this->uncryptid( trim($_GET["id"]),1 );
            $ObjAlu = new ModeloBase('alumnos',$this->adapter);
            $alumno = $ObjAlu->getById($id_alu);

            $this->view("crear", 
              [
                "title" => "crear pagos", 
                "pgo" => "Control de Pagos",
                "detalle" => $alumno,
                "ctl" => "pagos",
                "acc" => "crear",
                "cpt" => $cpt,
                "cie" => $cie,
                "alu" => $_GET["id"],
                "rndUnk" => $_SESSION['uniqe']
              ]
            );    

          } else 
              die("No se pudo conpletar la acción por falta de complementos...");

      } else {
        die("No se recibio alumno...");
      }
    }

  }

  public function ver() {

    if ( isset($_GET["id"]) AND !empty(trim($_GET["id"])) ) {

      $catch_id =  $this->uncryptid( trim($_GET["id"]), 1 );

      $ObjConceptos = new Conceptos($this->adapter);
      $conceptos = $ObjConceptos->getAll();

      $ObjCiclos = new ModeloBase('ciclos_escolares',$this->adapter);
      $ciclos = $ObjCiclos->getAll();

      $mesLetra = array("01" => 'Enero', "02" => 'Febrero', "03" => 'Marzo', "04" => 'Abril',
          "05" => 'Mayo', "06" => 'Junio', "07" => 'Julio', "08" => 'Agosto', "09" => 'Septiembre',
          "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre');

      $ObjPagos = new Pagos($this->adapter);
      $pago = $ObjPagos->getById($catch_id);

        if( !is_bool($conceptos) && !is_bool($ciclos) && !is_bool($pago)) {

            $cie=null;$cpt=null;
            foreach($ciclos AS $rowC){
              $desc = trim($mesLetra[$rowC->mes_inicio]." / ".$mesLetra[$rowC->mes_fin]." ".$rowC->anio);
              $cie .= "<option value='$rowC->id'>$desc</option>";
            }

            foreach($conceptos AS $rowO){
              $cpt .= "<option value='$rowO->id'>".ucwords($rowO->descripcion)."</option>";
            }

            $this->view("editar", 
              [
                "title" => "editar pagos", 
                "pgo" => "Control de Pagos",
                "ctl" => "pagos",
                "acc" => "editar",
                "cpt" => $cpt,
                "cie" => $cie,
                "pag" => $pago,
                "id_pag" => $_GET["id"]
              ]
            );    

        } else 
            die("Error al consultar el pago del alumno...");

    } else 
        die("Error al obtener el registro de pago del alumno...");

  }

  public function editar() {

    if ( isset($_GET['id']) AND !empty(trim($_GET["id"])) ) {

    $catch_id =  $this->uncryptid( trim($_GET["id"]), 1 );

    $pagos = new Pagos($this->adapter);

    $pagos->set_id(trim(htmlentities($catch_id)));
    $pagos->set_folio(trim(htmlentities($_POST['dos'])));
    $pagos->set_monto(trim(htmlentities($_POST['tres'])));
    $pagos->set_beca(trim(htmlentities($_POST['siete'])));
    $pagos->set_id_concepto(trim(htmlentities($_POST['cinco'])));
    $pagos->set_id_ciclo(trim(htmlentities($_POST['seis'])));

      if ( is_bool( $pagos->update() ) ) {
        $this->redirect("grupos",ACCION_DEFECTO,ID_DEFECTO);
        $this->conectar->OutCnx();

      } else
          die("Error en la modificación del pago.  =>".$pagos->update() );

    } else
        die("No se recibio registro...");

  }

  public function eliminar(){
    if ( isset($_GET["id"]) AND !empty(trim($_GET["id"])) ) {

      $catch_id =  $this->uncryptid( trim($_GET["id"]), 1 );

      $pago = new Pagos($this->adapter);

      if( $pago->deleteById($catch_id) ) {
        $this->redirect("grupos", ACCION_DEFECTO, ID_DEFECTO);
        $this->conectar->OutCnx();        
      }else 
        die("No sé pudo eliminar el registro...");
      
    }
  }

   
} /*END CLASS*/