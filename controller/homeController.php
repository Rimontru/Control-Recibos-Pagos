<?php
class HomeController extends ControladorBase {
   public $conectar;
   public $adapter;
	
   public function __construct() {
       parent::__construct();

       $this->conectar = new Conectar();
       $this->adapter = $this->conectar->cnxMySqli();
   }
   
   public function index() {
      //Cargamos la vista with valores         
   $this->view("home", [
                        "title" => "home", 
                        "pgo" => "Control de Pagos",
                        "ctl" => "home",
                        "acc" => "inicio"
                       ]
               );
   }
   
}