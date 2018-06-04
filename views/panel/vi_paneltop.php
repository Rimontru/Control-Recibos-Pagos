<body class="hold-transition skin-green sidebar-mini">
<div class="wrapper">

  <header class="main-header">
    <a href="<?= $helper->url()?>" class="logo" style="background: #134A45;">
      <span class="logo-mini"><b>SPI</b></span>
      <span class="logo-lg"><b>SPI</b></span>
    </a>
    <nav class="navbar navbar-static-top">
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../../assets/images/photos/default/perfil.jpg" class="user-image" alt="...">
              <span class="hidden-xs"><?= strtoupper($_SESSION['usuario']['name'])?></span>
            </a>
          </li>
        </ul>
      </div>
    </nav>
  </header>