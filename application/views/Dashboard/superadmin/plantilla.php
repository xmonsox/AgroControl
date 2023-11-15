<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DashBoard - Admin</title>

  <link rel="stylesheet" href="http://localhost/PhpSebas27/DashBoardCodeIgniter/assets/dist/css/myStyles2.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">  
  <link rel="stylesheet" href="http://localhost/PhpSebas27/DashBoardCodeIgniter/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="http://localhost/PhpSebas27/DashBoardCodeIgniter/assets/dist/css/adminlte.min.css">
  
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  
  <nav class="main-header navbar navbar-expand navbar-dark navbar-light">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="<?=base_url('superadmin/Dashboard/Inicio')?>" class="nav-link">Inicio</a>
      </li>
    </ul>

    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
    </ul>
  </nav>

  <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <a href="<?=base_url('superadmin/Dashboard/Inicio')?>" class="brand-link">
        <img src="http://localhost/AgroControl/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo"
          class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">AgroControl</span>
      </a>

      <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="http://localhost/AgroControl/assets/dist/img/users/avatar0.png"
              class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="<?= base_url('superadmin/Dashboard/MiPerfil') ?>" class="d-block">
              <?= explode(" ", $session['nombre'])[0] . " " . explode(" ", $session['apellido'])[0] ?>
            </a>
          </div>
        </div>

        <div class="form-inline">
          <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Buscar Modulos"
              aria-label="Search">
            <div class="input-group-append">
              <button class="btn btn-sidebar">
                <i class="fas fa-search fa-fw"></i>
              </button>
            </div>
          </div>
        </div>

        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <li class="nav-item">
              <a href="<?= base_url('superadmin/Dashboard/Usuarios') ?>" class="nav-link">
                <i class="fa-solid fa-users"></i>
                <p>USUARIOS</p>
              </a>
            </li>

            <li class="nav-item mt-5 bg-danger">
              <a href="<?= base_url('Start/cerrarSession') ?>" class="nav-link">
                <i class="fa-solid fa-right-from-bracket"></i>
                <p>CERRAR SESSION</p>
              </a>
            </li>
          </ul>
        </nav>
      </div>
    </aside>

    <div class="content-wrapper">
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Inicio Dashboard</h1>
          </div>
        </div>
      </div>
    </section>

    <section class="content">
      <div class="card">
        <div class="card-header">
          <?php
            $numero_aleatorio = mt_rand(1, 10);

            if ($numero_aleatorio == 1){
              ?><h3 class="card-title">Bienvenido a Nuestra Página Principal</h3><?php
            }elseif($numero_aleatorio == 2){
              ?><h3 class="card-title">Inicio: Tu Puerta de Entrada</h3><?php
            }elseif($numero_aleatorio == 3){
              ?><h3 class="card-title">Explora Nuestro Mundo desde Aquí</h3><?php
            }elseif($numero_aleatorio == 4){
              ?><h3 class="card-title">Comienza Tu Viaje Aquí</h3><?php
            }elseif($numero_aleatorio == 5){
              ?><h3 class="card-title">Página de Inicio: Tu Lugar de Partida</h3><?php
            }elseif($numero_aleatorio == 6){
              ?><h3 class="card-title">¡Hola! Estás en Nuestro Inicio</h3><?php
            }elseif($numero_aleatorio == 7){
              ?><h3 class="card-title">Bienvenido al Punto de Partida</h3><?php
            }elseif($numero_aleatorio == 8){
              ?><h3 class="card-title">Donde Todo Comienza: Página de Inicio</h3><?php
            }elseif($numero_aleatorio == 9){
              ?><h3 class="card-title">Inicio: Descubre Nuestro Contenido</h3><?php
            }elseif($numero_aleatorio == 10){
              ?><h3 class="card-title">En Casa: Nuestra Página de Inicio</h3><?php
            }
          ?>
          <div class="card-tools">
            <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
              <i class="fas fa-minus"></i>
            </button>
            <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
              <i class="fas fa-times"></i>
            </button>
          </div>
        </div>
        <div class="card-body">
          <p>¡Excelente noticia! Te informamos que has iniciado sesión satisfactoriamente en nuestro programa. Ahora tienes acceso a una serie de funciones que te permitirán gestionar la información que tengas disponible.</p>
          <p>Estamos aquí para ayudarte en cada paso del proceso. Si tienes alguna pregunta o necesitas asistencia adicional, no dudes en ponerte en contacto con nuestro equipo de soporte. ¡Gracias por confiar en nosotros!</p>
        </div>
        <div class="card-footer">
          ADMINISTRADOR
        </div>
      </div>
      <div class="d-flex justify-content-center mt-5">
        <div class="loader">
          <div class="loader-square"></div>
          <div class="loader-square"></div>
          <div class="loader-square"></div>
          <div class="loader-square"></div>
          <div class="loader-square"></div>
          <div class="loader-square"></div>
          <div class="loader-square"></div>
        </div>
      </div>
    </section>
  </div>

  <footer class="main-footer bg-dark">
    <div class="float-right d-none d-sm-block">
      <b>Exotic Soft</b>
    </div>
    <strong>Copyright &copy; 2023</strong>
  </footer>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="http://localhost/PhpSebas27/DashBoardCodeIgniter/assets/plugins/jquery/jquery.min.js"></script>
<script src="http://localhost/PhpSebas27/DashBoardCodeIgniter/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost/PhpSebas27/DashBoardCodeIgniter/assets/dist/js/adminlte.min.js"></script>

</body>
</html>
