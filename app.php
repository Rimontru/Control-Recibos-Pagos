<?php
require_once 'config/cache.php';
require_once 'config/global_vars.php';
require_once 'core/controlador/Base.php';
require_once 'core/controlador/Frontend.php';
if( isset($_GET["controller"]) ){
    $controllerObj = cargarControlador($_GET["controller"]);
    lanzarAccion($controllerObj);
}else{
    $controllerObj = cargarControlador(CONTROLADOR_ROOT);
    lanzarAccion($controllerObj);
}