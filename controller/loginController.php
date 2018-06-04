<?php
class LoginController extends ControladorBase {
   
  public $conectar;
  public $adapter;
  private $secury;

  public function __construct() {
    parent::__construct();

    $this->conectar = new Conectar();
    $this->adapter = $this->conectar->cnxMySqli();
    $this->secury = new Middleware();

  }

  public function index() {
    //echo $this->secury->hashing('ADMIN1234123',''); die;
    $this->view("login", [
       "title" => "login", 
       "fua" => "Formato Unico Academico", 
       "ctl" => "login", 
       "acc" => "validar",
      ]
    );

  }

    
  public function validar(){
    $process = TRUE;
    //Validamos que las variables POST recibidas que esten y no esten vacias.
    if( isset($_POST['nick_user']) && isset($_POST['pswd_user']) && !empty(trim($_POST['nick_user'])) && !empty(trim($_POST['pswd_user']))) :
     //Limpiamos las variables            
     $nick_user = strtoupper(htmlentities(trim($_POST['nick_user'])));         
     $pswd_user = htmlentities(trim($_POST['pswd_user']));
     //Mandamos a traer los datos del usuario por el campo name
     $objUsuario = new ModeloBase('users',$this->adapter);
     $usuario = $objUsuario->getBy("name", $nick_user);
     $datasUser = $objUsuario->getDatasUsuario($usuario->id);
     
      //Comprobar si hay datos del usuario 
      if ( !is_bool($usuario) ){
          //Hacemos el hash de la password y el token
          $user_pwd_success = $this->secury->hashing($pswd_user, $usuario->password);
          $user_tkn_success = $this->secury->hashing($nick_user.$pswd_user, $usuario->remember_token);
          //Validamos que el hash retorne 1 para aceptar el usuario
          if ( $user_pwd_success==1 && $user_tkn_success==1 && $datasUser->edo==8) {
              session_name( $nick_user ); 
              session_start();
              $_SESSION['usuario']['nick']= $nick_user;
              $_SESSION['usuario']['name']= $datasUser->nombre;
              $_SESSION['usuario']['id_aux']= $datasUser->id_administrativo;
              setcookie ("us_PGO", $_SESSION['usuario']['nick'], 0, "/"," ",0);
          } else
            $process = FALSE;
      } else
        $process = FALSE; 

      //Validamos que el proceso verdadero
      if ($process)
        $this->redirect(CONTROLADOR_DEFECTO, ACCION_DEFECTO, ID_DEFECTO);
      else
        $this->redirect(CONTROLADOR_ROOT, ACCION_DEFECTO, ID_DEFECTO);

    else :
      $this->redirect(CONTROLADOR_ROOT, ACCION_DEFECTO, ID_DEFECTO);
    endif;

  }



  
}