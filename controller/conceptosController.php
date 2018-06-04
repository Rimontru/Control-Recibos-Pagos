<?php
class ConceptosController extends ControladorBase {
  public $conectar;
  public $adapter;
  public $Objmid;
  private $val;

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
   
  public function index() {    

    $ObjConceptos = new Conceptos($this->adapter);
    $result = $ObjConceptos->getBy('fk_administrativo',$_SESSION['usuario']['id_aux']);

    $this->view("conceptos", 
      [
        "title" => "conceptos", 
        "pgo" => "Control de Pagos",
        "ctl" => "conceptos",
        "acc" => "ver",
        "prm" => $result
      ]
    );


  }

  public function crear() {
    if ( isset($_POST['dos']) AND !empty(trim($_POST['dos'])) ) {
      if ( isset($_POST['rndUnk']) AND trim($_POST['rndUnk']) == $_SESSION['uniqe'] ) :

        $concepto = new Conceptos($this->adapter);
        $concepto->set_descripcion(trim(htmlentities($_POST['dos'])));
        unset($_SESSION['uniqe']);

          if ( $concepto->save() )
            $this->redirect("conceptos",ACCION_DEFECTO,ID_DEFECTO);
          else
            die($concepto->save());

        else:
          $this->redirect("conceptos",ACCION_DEFECTO,ID_DEFECTO);
      endif;

    } else {
      $_SESSION['uniqe'] = uniqid();
      $this->view("crear", 
        [
          "title" => "crear concepto", 
          "pgo" => "Control de Pagos",
          "ctl" => "conceptos",
          "acc" => "crear",
          "prm" => ID_DEFECTO,
          "notify" => false,
          "rndUnk" => $_SESSION['uniqe']
        ]
      );
    }

    $this->conectar->OutCnx();
  }

  public function ver() {
    if ( isset($_GET["id"]) AND !empty(trim($_GET["id"])) ) {

    $catch_id =  $this->uncriptid( trim($_GET["id"]) );

    $Objconceptos = new Conceptos($this->adapter);
    $result = $Objconceptos->getById( $catch_id );

    if ( !is_bool($result) ){

      $this->view("editar", 
        [
          "title" => "editar concepto", 
          "pgo" => "Control de Pagos",
          "ctl" => "conceptos",
          "acc" => "editar",
          "prm" => $result,
          "notify" => false
        ]
      );

    } else
      die("No se pudo realizar la consulta...");

    }

  }

  public function editar() {
    if ( isset($_GET["id"]) AND !empty(trim($_GET["id"])) ) {

      $catch_id =  $this->uncriptid( trim($_GET["id"]) );

      $concepto = new Conceptos($this->adapter);

      $concepto->set_id($catch_id);
      $concepto->set_descripcion(trim(htmlentities($_POST['dos'])));

        if ( $concepto->update() ) {
          $this->index();
          $this->conectar->OutCnx();
        } else
            echo $concepto->update();

    } else 
        echo "Fallo la modificación del registro.";


  }

  public function eliminar(){
    if ( isset($_GET["id"]) AND !empty(trim($_GET["id"])) ) {
     
      $catch_id =  $this->uncriptid( trim($_GET["id"]) );
      
      $concepto = new Conceptos($this->adapter);

      if( $concepto->deleteById($catch_id) ) {
        $this->redirect("conceptos", ACCION_DEFECTO, ID_DEFECTO);
        $this->conectar->OutCnx();        
      }else 
        echo "No sé pudo eliminar el registro.";
      
    }
  }


   
}