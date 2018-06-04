<?php
class GruposController extends ControladorBase {
  public $conectar;
  public $adapter;
  public $secure;
  private $val;
  private $txt;


  public function __construct() {
    parent::__construct();
    
    $this->conectar = new Conectar();
    $this->secure   = new Middleware();
    $this->txt      = new FormatText();
    $this->adapter  = $this->conectar->cnxMySqli();
  }


  private function uncrypt($val, $pos){

    $prt = explode("x", $val);
    $this->val = $prt[$pos];

  return $this->val;
  }


  
  public function index(){
    //echo $this->secure->hashing('ADMIN1234123','');
    $ObjClass = new ModeloBase('', $this->adapter);
    $ObjDatas = $ObjClass->getAllCarrerasByAdministrativo($_SESSION['usuario']['id_aux']);

    if (!is_bool($ObjDatas))
      $datas = $ObjDatas;
    else
      $datas = NULL;  
    

    $this->view("carreras", 
     [
      "title" => "Mis carreras", 
      "pgo"   => "Control de pagos",
      "ctl"   => "grupos",
      "acc"   => "vergrupos",
      "datas" => $datas,
     ]  
    );
  }



  public function vergrupos(){

    if ( isset($_GET['id']) && !empty(trim($_GET['id'])) ) :
      //Cachamos el id de la carrera
      $id_carrera = $this->uncrypt($_GET['id'],1);
      $id_modalidad = $this->uncrypt($_GET['id'],2);
      //Consultamos los grupos activos en la carrera
      $ObjGrupos = new ModeloBase('', $this->adapter);
      $ObjDatas = $ObjGrupos->getAllGruposByCarreras($id_carrera, $id_modalidad);
     
      //Determinamos y validamos los registros para extraer el nombre
      if ( !is_bool($ObjDatas) ) {
        $datas = $ObjDatas;
        if (count($ObjDatas) == 1)
          $nom_car =  $ObjDatas->nombre.' '.$ObjDatas->descripcion;
        else
          $nom_car =  $ObjDatas[0]->nombre.' '.$ObjDatas[0]->descripcion;

        //Mostramos la vista con los datos
          $this->view("grupos", [
            "title" => "Mis Grupos", 
            "pgo"   => "Control de pagos",
            "ctl"   => "grupos",
            "acc"   => "veralumnos",
            "carrera"   => $nom_car,
            "datas" => $datas,
          ]); 

      } else {
        $this->view("grupos", [
          "title" => "Mis Grupos", 
          "pgo"   => "Control de pagos",
          "ctl"   => "grupos",
          "acc"   => "veralumnos",
          "carrera"   => NULL,
          "datas" => NULL,
        ]);  
      }


    else :
      $this->redirect('grupos', ACCION_DEFECTO, ID_DEFECTO);
    endif;
  }


  public function veralumnos(){
    if ( isset($_GET['id']) && !empty(trim($_GET['id'])) ) :
      //Cachamos el id de grupo y lo desencriptamos
      $id_grupo = $this->uncrypt($_GET['id'],1);

      $ObjAlumnos = new ModeloBase('', $this->adapter);
      $ObjDatas = $ObjAlumnos->getAllAlumnosBygrupo($id_grupo);

      if ( !is_bool($ObjDatas) ) {
        $datas = $ObjDatas;
        if (count($ObjDatas) == 1)
          $nom_gpo =  $ObjDatas->nombre.' '.$ObjDatas->descripcion.' ('.$ObjDatas->nomb_gpo.' del ciclo '.$this->txt->LetrasCiclo($ObjDatas->ciclo.')');
        else
          $nom_gpo =  $ObjDatas[0]->nombre.' '.$ObjDatas[0]->descripcion.' ('.$ObjDatas[0]->nomb_gpo.' del ciclo '.$this->txt->LetrasCiclo($ObjDatas[0]->ciclo.')');
         //Mostramos la vista con los datos
          $this->view("alumnos", [
            "title" => "Alumnos por grupo", 
            "pgo"   => "Control de pagos",
            "ctl"   => "",
            "acc"   => "",
            "detalle"   => $nom_gpo,
            "datas" => $datas,
          ]); 

      } else {
        $this->view("alumnos", [
          "title" => "Alumnos por grupo", 
          "pgo"   => "Control de pagos",
          "ctl"   => "",
          "acc"   => "",
          "detalle"   => NULL,
          "datas" => NULL,
        ]);  
      }


    else :
      $this->redirect('grupos', ACCION_DEFECTO, ID_DEFECTO);
    endif;


  }




}
