<?php
class Pagos extends EntidadBase {

   private $id;
   private $folio;
   private $monto;
   private $beca;
   private $id_alumno;
   private $id_concepto;
   private $id_ciclo;

   public function __construct($adapter) {
      $table = "pagos";
      parent::__construct($table, $adapter);
   } 
   
   public function set_id($id) {
   	$this->id = $id;
   }

   public function set_folio($folio) {
   	$this->folio = $folio;
   }

   public function set_monto($monto) {
   	$this->monto = $monto;
   }

   public function set_beca($beca) {
    $this->beca = $beca;
   }

   public function set_id_alumno($id_alumno) {
   	$this->id_alumno = $id_alumno;
   }

   public function set_id_concepto($id_concepto) {
   	$this->id_concepto = $id_concepto;
   }

   public function set_id_ciclo($id_ciclo) {
   	$this->id_ciclo = $id_ciclo;
   }

   public function save(){

    $sql = "INSERT INTO pagos VALUES (
      'NULL',
      '".$this->folio."',
      ".$this->monto.",
      ".$this->beca.",
      ".$this->id_alumno.",
      ".$this->id_concepto.",
      ".$this->id_ciclo.",
      1,
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

    $sql = "UPDATE pagos SET
            folio = '".$this->folio."',
            monto = ".$this->monto.",
			      beca = ".$this->beca.",
			      fk_concepto = ".$this->id_concepto.",
			      fk_ciclo = ".$this->id_ciclo."
            WHERE 
            id = ".$this->id          
           ;

    if ( $this->db()->query($sql) ) 
      $update = true;
    else 
      $update = "Falló la consulta: (".$this->db()->errno.")__".$this->db()->error;
          
  return $update;      
  } 

}