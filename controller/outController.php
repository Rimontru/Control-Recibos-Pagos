<?php
class OutController extends ControladorBase {
   public $conectar;
   public $adapter;
   private $secury;
	
   public function __construct() {
       parent::__construct();

       $this->conectar = new Conectar();
       $this->secury = new Middleware();
   }
   
   public function unsetlog() {
      
      session_name($this->secury->randing(10));
    
      session_start();
            
      session_unset();
      
      session_destroy();

      $parametros_cookies = session_get_cookie_params(); 
      setcookie('us_PGO', $this->secury->randing(10),1,$parametros_cookies["path"]);

      unset($_SESSION['usuario']);

      $this->redirect("login", ACCION_DEFECTO, ID_DEFECTO);
   }
   
}