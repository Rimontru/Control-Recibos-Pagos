<?php
/*
query builder fluent and mysqli to manipulation db optional
*/
class Conectar {
    private $driver;
    private $host, $user, $pass, $database, $charset;
  
    public function __construct() {
        $db_cfg = require_once 'config/params_db.php';
        $this->driver=$db_cfg["driver"];
        $this->host=$db_cfg["host"];
        $this->user=$db_cfg["user"];
        $this->pass=$db_cfg["pass"];
        $this->database=$db_cfg["database"];
        $this->charset=$db_cfg["charset"];
    }


    public function cnxMySqli(){
        
        if($this->driver=="mysql" || $this->driver==null){
           try {
               $con=new mysqli($this->host, $this->user, $this->pass, $this->database);
               $con->query("SET NAMES '".$this->charset."'");
           } catch (Exception $e) {
                die( "Error al conectar la base de datos" . $e->getMessage() );
           }
            
        }
        
      return $con;
    }
  
    public function OutCnx() {
      $thread_id = $this->cnxMySqli()->thread_id;
      $this->cnxMySqli()->kill($thread_id);
      $this->cnxMySqli()->close();
      $this->host = NULL;
      $this->user = NULL;
      $this->pass = NULL;
      $this->database = NULL;
      $con = NULL;
    }
}

class ConectarH {
    private $driver;
    private $host, $user, $pass, $database, $charset;
  
    public function __construct() {
        $db_cfg = require_once '../config/params_db.php';
        $this->driver=$db_cfg["driver"];
        $this->host=$db_cfg["host"];
        $this->user=$db_cfg["user"];
        $this->pass=$db_cfg["pass"];
        $this->database=$db_cfg["database"];
        $this->charset=$db_cfg["charset"];
    }


    public function cnxMySqli(){
        
        if($this->driver=="mysql" || $this->driver==null){
           try {
               $con=new mysqli($this->host, $this->user, $this->pass, $this->database);
               $con->query("SET NAMES '".$this->charset."'");
           } catch (Exception $e) {
                die( "Error al conectar la base de datos" . $e->getMessage() );
           }
            
        }
        
      return $con;
    }
  
    public function OutCnx() {
      $thread_id = $this->cnxMySqli()->thread_id;
      $this->cnxMySqli()->kill($thread_id);
      $this->cnxMySqli()->close();
      $this->host = NULL;
      $this->user = NULL;
      $this->pass = NULL;
      $this->database = NULL;
      $con = NULL;
    }
}

/*
http://anexsoft.com/p/119/tutorial-de-fluentpdo-para-php
https://www.sitepoint.com/getting-started-fluentpdo/
*/