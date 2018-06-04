<?php

class Conceptos extends EntidadBase {

   private $id;
   private $descripcion;

   public function __construct($adapter) {
      $table = "conceptos";
      parent::__construct($table, $adapter);
   }

   public function set_id($id){
   		$this->id = $id;
   }

   public function set_descripcion($descripcion){
   		$this->descripcion = strtolower($descripcion);
   }

    public function save(){

    $sql = "INSERT INTO conceptos VALUES (
      'NULL',
      ".$_SESSION['usuario']['id_aux'].",
      '".$this->descripcion."',
      NULL,
      NULL
    )";

    if ( $this->db()->query($sql) ) 
      $save = true;
    else 
      $save = "Falló la consulta: (".$this->db()->errno.")__".$this->db()->error;
          
  return $save;      
  }
  

  public function update(){
    
  $sql = "UPDATE conceptos SET
          descripcion = '".$this->descripcion."'
          WHERE id = ".$this->id."
          AND fk_administrativo = ".$_SESSION['usuario']['id_aux']."          
         ";

  if ( $this->db()->query($sql) ) 
    $update = true;
  else 
    $update = "Falló la consulta: (".$this->db()->errno.")__".$this->db()->error;
        
  return $update;      
  } 

   
}
