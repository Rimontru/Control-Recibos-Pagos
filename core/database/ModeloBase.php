<?php 
//Oculta los warning del php
error_reporting(E_ERROR);
class ModeloBase extends EntidadBase {
  private $table;

  public function __construct($table, $adapter) {
     $this->table = (string) $table;
     parent::__construct($table, $adapter);

  }

/*
  public function getAllCiclosXPlanEscolar() {
    $sql = "  
            SELECT cie.id,mes_inicio,mes_fin,anio,descripcion
            FROM ciclo_escolar cie
            INNER JOIN plan_escolar pes ON pes.id = cie.fk_plnesc
           ";
    if ( $result = $this->db()->query($sql) ){
      if ($result->num_rows == 1 ) {
        $row = $result->fetch_object();
          $resultSet=$row;

      } elseif ( $result->num_rows > 1 ) {
        while( $row = $result->fetch_object() ) {
          $resultSet[]=$row;
        }

      } else
        $resultSet = false;

    } else
      $resultSet = false;
      
  return $resultSet;
  }

  public function getCiclosXPlanEscolarById($id){
    $sql = "  
            SELECT cie.id,mes_inicio,mes_fin,anio,descripcion,fk_plnesc
            FROM ciclo_escolar cie
            INNER JOIN plan_escolar pes ON pes.id = cie.fk_plnesc
            WHERE cie.id = ".$id
          ;
    if ( $result = $this->db()->query($sql) ){
      if ($result->num_rows == 1 ) {
        $row = $result->fetch_object();
          $resultSet=$row;

      } elseif ( $result->num_rows > 1 ) {
        while( $row = $result->fetch_object() ) {
          $resultSet[]=$row;
        }

      } else
        $resultSet = false;

    } else
      $resultSet = false;
      
  return $resultSet;
  }

  public function getAllCarreras(){
    $sql = "  
            SELECT *
            FROM $this->table car            
           ";
    if ( $result = $this->db()->query($sql) ){
      if ($result->num_rows == 1 ) {
        $row = $result->fetch_object();
          $resultSet=$row;

      } elseif ( $result->num_rows > 1 ) {
        while( $row = $result->fetch_object() ) {
          $resultSet[]=$row;
        }

      } else
        $resultSet = false;

    } else
      $resultSet = false;
      
  return $resultSet;
  }

  public function getAllGruposXCarreras(){
    $sql = "  
            SELECT gpo.id_grupo,gpo.grado,gpo.salon,car.clave,pes.descripcion
            FROM $this->table gpo
            INNER JOIN carreras car ON car.id_carrera = gpo.id_carrera
            INNER JOIN plan_escolar pes ON pes.id_plnesc = gpo.id_plnesc         
           ";
    if ( $result = $this->db()->query($sql) ){
      if ($result->num_rows == 1 ) {
        $row = $result->fetch_object();
          $resultSet=$row;

      } elseif ( $result->num_rows > 1 ) {
        while( $row = $result->fetch_object() ) {
          $resultSet[]=$row;
        }

      } else
        $resultSet = false;

    } else
      $resultSet = false;
      
  return $resultSet;
  }

  public function get_id_alu_by_anio_disc($anio, $disc){
    $sql = "  
            SELECT
            CONCAT(CAR.nombre,' ',PLE.descripcion) AS desc_carrera,
            CONCAT(nombres,' ',a_pat,' ',a_mat) AS nomb_alumno,
            GPO.grado,
            ALU.matricula,
            DIS.descripcion,
            PAR.anio
            FROM participaciones PAR
            INNER JOIN alumnos ALU ON ALU.id = PAR.id_alumno
            INNER JOIN grupos GPO ON GPO.id_grupo = ALU.id_grupo
            INNER JOIN plan_escolar PLE ON PLE.id_plnesc = GPO.fk_modali
            INNER JOIN carreras CAR ON CAR.id_carrera = GPO.fk_carrera
            INNER JOIN disciplinas DIS ON DIS.id = PAR.id_disciplina
            WHERE anio = '".$anio."'
            AND id_disciplina = ".$disc." 
            ORDER BY DIS.descripcion       
           ";
    if ( $result = $this->db()->query($sql) ){
      if ($result->num_rows == 1 ) {
        $row = $result->fetch_object();
          $resultSet=$row;

      } elseif ( $result->num_rows > 1 ) {
        while( $row = $result->fetch_object() ) {
          $resultSet[]=$row;
        }

      } else
        $resultSet = false;

    } else
      $resultSet = false;
      
  return $resultSet;
  }

  */
  /*------------------------------------------*/

  public function getDatasUsuario($id){
    $query = $this->db()->query("
      SELECT
      ams.id as id_administrativo,
      fk_cuenta,name,password,nombre,usr.edo
      FROM users usr
      INNER JOIN administrativos ams ON ams.id = usr.fk_cuenta
      WHERE usr.edo = 8
      AND usr.id = ".$id."
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

  public function findAlumno($find){
    $query = $this->db()->query("
      SELECT *,
      alu.id AS id_alu,
      CONCAT_WS( ' ', TRIM(a_pat) , TRIM(a_mat), TRIM(nombres) ) AS NombreCompleto
      FROM alumnos alu
      INNER JOIN grupos gpo ON gpo.id = alu.fk_grupo
      WHERE matricula
      LIKE '%$find%'
      OR  CONCAT_WS( ' ', TRIM(a_pat) , TRIM(a_mat) )  LIKE '%$find%'
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


  public function getAllGruposXCarrerasXModalidad(){
    $sql = "  
            SELECT
            gpo.id as id_grupo,
            CONCAT(gpo.grado,' / ',car.clave,' / ',psc.id) AS desc_gpo
            FROM grupos gpo
            INNER JOIN carreras car ON car.clave = gpo.fk_carrera
            INNER JOIN planes_escolares psc ON psc.id = gpo.fk_planesc
            ORDER BY id_grupo
           ";
    if ( $result = $this->db()->query($sql) ){
      if ($result->num_rows == 1 ) {
        $row = $result->fetch_object();
          $resultSet=$row;

      } elseif ( $result->num_rows > 1 ) {
        while( $row = $result->fetch_object() ) {
          $resultSet[]=$row;
        }

      } else
        $resultSet = false;

    } else
      $resultSet = false;
      
  return $resultSet;
  }


  public function findAlumnoId($id){
    $query = $this->db()->query("
      SELECT *,
      alu.id AS id_alu,
      CONCAT_WS( ' ', TRIM(a_pat) , TRIM(a_mat), TRIM(nombres) ) AS NombreCompleto
      FROM alumnos alu
      INNER JOIN grupos gpo ON gpo.id = alu.fk_grupo
      WHERE alu.id =".$id."
      "
    );

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


  public function find_registros_pagos_alumno($alumno){
    $query = $this->db()->query("
      SELECT *,
      pag.id AS id_pag,alu.id AS id_alu,cpt.id AS id_cpt,cie.id AS id_cie,
      COUNT(pag.id) AS totalRecibos,
      SUM(pag.monto) AS montoRecibos
      FROM pagos pag
      INNER JOIN alumnos alu ON alu.id = pag.fk_alumno
      INNER JOIN conceptos cpt ON cpt.id = pag.fk_concepto
      INNER JOIN ciclos_escolares cie ON cie.id = pag.fk_ciclo
      WHERE alu.id = ".$alumno."
      GROUP BY pag.fk_ciclo
      ORDER BY pag.fk_ciclo ASC
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


  public function find_alumno_pagos($alumno, $ciclo){
    $query = $this->db()->query("
    SELECT *,
    pag.id AS id_pag,alu.id AS id_alu,cpt.id AS id_cpt,cie.id AS id_cie
    FROM pagos pag
    INNER JOIN alumnos alu ON alu.id = pag.fk_alumno
    INNER JOIN conceptos cpt ON cpt.id = pag.fk_concepto
    INNER JOIN ciclos_escolares cie ON cie.id = pag.fk_ciclo
    WHERE pag.fk_alumno = ".$alumno."
    AND pag.fk_ciclo = ".$ciclo 
    );

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

  public function get_grupo_carrera($find_car){
    $sql = "  
      SELECT
      car.id as id_carrera,
      car.nombre AS nomb_car,
      gpo.id as id_grupo, grado,
      ple.descripcion AS modalidad
      FROM carreras CAR
      INNER JOIN grupos gpo ON gpo.fk_carrera = car.clave
      INNER JOIN planes_escolares ple ON ple.id = gpo.fk_planesc
      WHERE CONCAT_WS(TRIM(car.nombre),' ',TRIM(ple.descripcion)) LIKE '%".$find_car."%'       
    ";
    if ( $result = $this->db()->query($sql) ){
      if ($result->num_rows == 1 ) {
        $row = $result->fetch_object();
          $resultSet=$row;

      } elseif ( $result->num_rows > 1 ) {
        while( $row = $result->fetch_object() ) {
          $resultSet[]=$row;
        }

      } else
        $resultSet = false;

    } else
      $resultSet = false;
      
  return $resultSet;
  }


  public function getAllCarrerasByAdministrativo($id_administrativo){
    $query = $this->db()->query("
      SELECT
      car.id as id_car,
      pes.id as id_mod,
      car.clave,car.nombre,pes.descripcion
      FROM secciones sec
      INNER JOIN carreras car ON car.id = sec.fk_carrera
      INNER JOIN grupos gpo ON gpo.fk_carrera = car.clave
      INNER JOIN planes_escolares pes ON pes.id = gpo.fk_planesc
      WHERE sec.fk_administrativo = ".$id_administrativo."
      AND car.edo = 1
      GROUP BY CONCAT(car.id,pes.id)
      ORDER BY gpo.created_at DESC
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



  public function getAllGruposByCarreras($id_carrera, $id_modalidad){
    $query = $this->db()->query("
      SELECT
      gpo.id as id_grupo,
      CONCAT_WS('',grado,' ',letra,' ',turno) AS nomb_grupo,
      gpo.salon,car.nombre,pes.descripcion
      FROM grupos gpo
      INNER JOIN carreras car ON car.clave = gpo.fk_carrera
      INNER JOIN planes_escolares pes ON pes.id = gpo.fk_planesc
      WHERE car.id = ".$id_carrera."
      AND gpo.fk_planesc = '".$id_modalidad."'
      AND gpo.edo = 1
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



  public function getAllAlumnosBygrupo($id_grupo){
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


}