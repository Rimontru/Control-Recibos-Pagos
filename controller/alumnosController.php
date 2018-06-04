<?php
class AlumnosController extends ControladorBase {
  public $conectar;
  public $adapter;
  public $secure;
  private $val;


  public function __construct() {
    parent::__construct();
    
    $this->conectar = new Conectar();
    $this->secure   = new Middleware();
    $this->adapter  = $this->conectar->cnxMySqli();
  }


  private function uncrypt($val, $pos){

    $prt = explode("x", $val);
    $this->val = $prt[$pos];

  return $this->val;
  }

  
  public function index(){
    $this->view("consultar", 
     [
      "title" => "consultar", 
      "pgo"   => "Control de pagos",
      "ctl"   => "alumnos",
      "acc"   => "buscar",
      "prm" => ID_DEFECTO,
      "load" => 2                 
     ]  
    );
  }


  public function buscar(){

    if ( isset($_POST['ipt_search']) AND !empty(trim($_POST['ipt_search'])) ) {
       
    $find = htmlentities($_POST['ipt_search']);
    $ObjAlumno = new ModeloBase('',$this->adapter);

    if( is_bool($result = $ObjAlumno->findAlumno(trim($find))) ) $load = 0; else $load = 1;

      $this->view("consultar", [
                  "title" => "consultar", 
                  "pgo"   => "Control de pagos",
                  "ctl" => "alumnos",
                  "acc" => "ver",
                  "load" => $load,
                  "prm" => ID_DEFECTO,
                  "datas" => $result
                 ]
      );

    $this->conectar->OutCnx();
    } else 
       $this->redirect("alumnos", "index", ID_DEFECTO);
    
    
  }
  

  public function ver(){

    if ( isset($_GET["id"]) AND !empty(trim($_GET["id"])) ) {

      $catch_id =  $this->uncrypt( trim($_GET["id"]), 1 );


      $ObjQuery = new ModeloBase('ciclos_escolares', $this->adapter);
      $listGroup = $ObjQuery->getAllGruposXCarrerasXModalidad();
      $listCiclos = $ObjQuery->getAll();
      $ciclos = null; 
      $grupos = null;
      $mesLetra = array("01" => 'Enero', "02" => 'Febrero', "03" => 'Marzo', "04" => 'Abril',
          "05" => 'Mayo', "06" => 'Junio', "07" => 'Julio', "08" => 'Agosto', "09" => 'Septiembre',
          "10" => 'Octubre', "11" => 'Noviembre', "12" => 'Diciembre');

      if ( !is_bool($listGroup) AND !is_bool($listCiclos)) {

        foreach($listGroup AS $rowG){
          $grupos .= "<option value='$rowG->id_grupo'>$rowG->desc_gpo</option>";
        }
        foreach($listCiclos AS $rowC){
          $desc = trim($mesLetra[$rowC->mes_inicio]." / ".$mesLetra[$rowC->mes_fin]." ".$rowC->anio);
          $ciclos .= "<option value='$rowC->id'>$desc</option>";
        }
      }

      $ObjAlumno = new ModeloBase('alumnos',$this->adapter);
      $result = $ObjAlumno->getById($catch_id );

      $this->view("inscripcion", 
        [
          "title" => "Datos del alumno", 
          "pgo"   => "Control de pagos",
          "ctl" => "alumnos",
          "acc" => "editar",
          "prm" => $result,
          "grupos"=> $grupos,
          "ciclos"=> $ciclos
       ]
      );

    }
  }




  public function search(){

    if ( isset($_POST['ipt_search']) AND !empty(trim($_POST['ipt_search'])) ) {
       
    $find = htmlentities($_POST['ipt_search']);
    $ObjQuery = new ModeloBase('',$this->adapter);

    if( is_bool($result = $ObjQuery->get_grupo_carrera( trim($find) )) ) 
      $load = 0; 
    else 
      $load = 8;

      $this->view("search", [
                  "title" => "consultar", 
                  "pgo"   => "Control de Pagos",
                  "ctl" => "alumnos",
                  "acc" => "show",
                  "load" => $load,
                  "prm" => ID_DEFECTO,
                  "datas" => $result
                 ]
      );

    $this->conectar->OutCnx();

    } else {
       $this->view("search", [
                  "title" => "consultar", 
                  "pgo"   => "Control de Pagos",
                  "ctl" => "alumnos",
                  "acc" => "search",
                  "load" => 2,
                 ]
      );
    }
       
    
    
  }
  

  public function show(){

    if ( isset($_GET["id"]) AND !empty(trim($_GET["id"])) ) {

      $catch_id =  $this->uncrypt( trim($_GET["id"]), 1 );

      $ObjQuery = new ModeloBase('alumnos', $this->adapter);
      $listAlu = $ObjQuery->getBy('fk_grupo', $catch_id );

      if ($listAlu != "NULL" AND !is_bool($listAlu))
        $load = 9; 
      else 
        $load = 0;

      $this->view("search", 
        [
          "title" => "Mostrar grupo", 
          "pgo"   => "Control de Pagos",
          "ctl" => "alumnos",
          "acc" => "listar",
          "load" => $load,
          "datas"=> $listAlu
       ]
      );

    }
  }

}
