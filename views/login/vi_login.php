<!doctype html>
<html lang="es">
  <head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <meta name="author" content="Ing. Ricardo Elias Mondragon Trujillo">
  <title>SPI | IESCH</title>
  <link rel="icon" href="../../assets/icons/iesch_ico.ico"/>
  
  <link href="http://localhost/larva/mi-laravel/public/css/bootstrap.min.css"  rel="stylesheet">
  <link href="http://localhost/larva/mi-laravel/public/css/login.css"  rel="stylesheet"> 
</head>

<body class="text-center">

  <form class="form-signin" action="<?=$helper->auth($ctl, $acc, ID_DEFECTO)?>" method="POST">
    <input type="hidden" name="_token"> 

    <img class="mb-4" src="../../assets/images/salazar/logo_uni.png" alt="..." width="100" height="100">

    <h1 class="h3 mb-3 font-weight-normal"><?=$title?></h1>
    
    <div class="form-group">
      <label for="User" class="sr-only">Usuario</label>
      <input type="text" class="form-control" name="nick_user" placeholder="Cuenta usuario" autofocus required>
    </div>  
    <div class="form-group">
    <label for="Password" class="sr-only">Contraseña</label>
    <input type="password" class="form-control" name="pswd_user" type="password" placeholder="Contraseña" required>
    </div>

    <button class="btn btn-lg btn-secondary btn-block" type="submit">Iniciar sesión</button>
  </form>
</body>
</html>