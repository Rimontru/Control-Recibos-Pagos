<?php 
class HelperBase extends ConectarH{
	private $db;

	public function db(){
	  return $this->cnxMySqli();
	}

	public function getAll(){
      $query=$this->db()->query("SELECT * FROM conceptos ORDER BY id DESC");

      if($query){
       if( $query->num_rows > 1 ){
           while( $row = $query->fetch_object() ) {
              $resultSet[] = $row;
           }

       }else if( $query->num_rows == 1 ){
           $row = $query->fetch_object();
               $resultSet = $row;
           
       }else
           $resultSet = false;
         
     }else
         $resultSet = false;     

   return $resultSet;
   }


   public function getAllAlumnosByGrupoAndCiclo($id_grupo, $id_ciclo){
    $query = $this->db()->query("
      SELECT
      alu.id as id_alu,
      alu.fk_ciclo, alu.fk_grupo,
      CONCAT(a_pat,' ',a_mat,' ',nombres) AS nomb_alu,
      CONCAT_WS('',grado,' ',letra,' ',turno) AS nomb_gpo,
      CONCAT(cie.mes_inicio,'-',cie.mes_fin,'-',cie.anio) AS ciclo,
      car.clave,car.nombre,pes.descripcion,
      alu.matricula, alu.sexo,alu.foto
      FROM alumnos alu
      INNER JOIN grupos gpo ON gpo.id = alu.fk_grupo
      INNER JOIN carreras car ON car.clave = gpo.fk_carrera
      INNER JOIN planes_escolares pes ON pes.id = gpo.fk_planesc
      INNER JOIN ciclos_escolares cie ON cie.id = alu.fk_ciclo
      WHERE alu.fk_grupo = $id_grupo
      AND alu.fk_ciclo = $id_ciclo
      AND alu.edo = 1
      ORDER BY alu.a_pat
      ");

     if($query){
       if( $query->num_rows > 1 ){
           while( $row = $query->fetch_object() ) {
              $resultSet[] = $row;
           }

       }else if( $query->num_rows == 1 ){
           $row = $query->fetch_object();
               $resultSet = $row;
           
       }else
           $resultSet = false;
         
     }else
         $resultSet = false;
     
  return $resultSet;
  }



  public function getPagoAlumno($id_alumno, $id_ciclo){
    $query = $this->db()->query("
      SELECT
      folio,beca,monto,fk_alumno
      FROM pagos
      WHERE fk_alumno = $id_alumno
      AND fk_ciclo = $id_ciclo
      ");

     if($query){
       if( $query->num_rows > 1 ){
           while( $row = $query->fetch_object() ) {
              $resultSet[] = $row;
           }

       }else if( $query->num_rows == 1 ){
           $row = $query->fetch_object();
               $resultSet = $row;
           
       }else
           $resultSet = false;
         
     }else
         $resultSet = false;
     
  return $resultSet;
  }



  public function getPagosAlumno($id_grupo, $id_ciclo){
    $query = $this->db()->query("
      SELECT
			CONCAT(a_pat,' ',a_mat,' ',nombres) AS nomb_alu,
			matricula,UPPER(folio) AS folio,monto,c.descripcion,
			IF(beca=1,0,beca) AS porbeca
			FROM pagos p
			INNER JOIN alumnos a ON a.id = p.fk_alumno
			INNER JOIN conceptos c ON c.id = p.fk_concepto
			WHERE p.fk_alumno IN ( SELECT id FROM alumnos WHERE fk_ciclo= $id_ciclo AND fk_grupo= $id_grupo)
			AND a.edo = 1
			ORDER BY a.a_pat
      ");

     if($query){
       if( $query->num_rows > 1 ){
           while( $row = $query->fetch_object() ) {
              $resultSet[] = $row;
           }

       }else if( $query->num_rows == 1 ){
           $row = $query->fetch_object();
               $resultSet = $row;
           
       }else
           $resultSet = false;
         
     }else
         $resultSet = false;
     
  return $resultSet;
  }




}