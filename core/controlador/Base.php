<?php
class ControladorBase{
   
  public function __construct() {
    
    /*Incluir todos las acciones a la DB*/
    foreach( glob("core/database/*.php") AS $datas){
        require_once $datas;
    }

    /*Incluir todos los modelos*/
    foreach( glob("model/*.php") AS $models){
        require_once $models;
    }
    
    require_once "core/secury/middleware.php";
    require_once "vendor/includes/class/FormatText.php";
  }    

  /*Plugins y funcionalidades*/
  public function view($vista, $datos){

    foreach( $datos AS $id_assoc => $valor ) {
        ${$id_assoc} = $valor; 
    }

    $folder = $_GET["controller"];
    
    require_once 'core/Helpers.php';
    $helper = new HelperView();
    $secury = new Middleware();
    
    if ( isset($_COOKIE['us_PGO']) ){

       include_once './views/resources/links.html';

       if( $vista != "login" ){
          require_once 'views/panel/vi_paneltop.php';      
          require_once 'views/sidebar/vi_dashboard.php'; 
       }
       
       require_once 'views/'.$folder.'/vi_'.$vista.'.php';
       
       include_once './views/resources/scripts.html';
    } else   
       require_once 'views/login/vi_login.php';
    
  }
   
  public function redirect($controlador=CONTROLADOR_DEFECTO, $accion=ACCION_DEFECTO, $params=ID_DEFECTO){
    header("Location: ../../".$controlador."/".$accion."/".$params);
  }

}

 