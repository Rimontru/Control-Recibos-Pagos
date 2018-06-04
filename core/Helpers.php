<?php
class HelperView{
    /* --Helpers para las vistas-- */
   public function url($controlador=CONTROLADOR_DEFECTO, $accion=ACCION_DEFECTO, $params=ID_DEFECTO){
       $urlString = "../../".$controlador."/".$accion."/".$params;
       return $urlString;
   }
   
   public function auth($controlador=CONTROLADOR_ROOT, $accion=ACCION_DEFECTO, $params=ID_DEFECTO){
       $urlString = "../../".$controlador."/".$accion."/".$params;
       return $urlString;
   }

}