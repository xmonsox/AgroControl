<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DashBoard - Admin</title>

  <link rel="stylesheet" href="http://localhost/AgroControl/assets/dist/css/myStyles2.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">  
  <link rel="stylesheet" href="http://localhost/AgroControl/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="http://localhost/AgroControl/assets/dist/css/adminlte.min.css">
  
  <style>
    .contenedor{
      width: 400px;
    }
  </style>

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
      <img src="http://localhost/AgroControl/assets/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">AgroControl</span>
    </a>

    <div class="sidebar">
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="http://localhost/AgroControl/assets/dist/img/users/avatar0.png" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
            <a href="<?=base_url('superadmin/Dashboard/MiPerfil')?>" class="d-block"><?= explode(" ", $session['nombre'])[0]." ".explode(" ", $session['apellido'])[0] ?></a>
        </div>
      </div>

      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Buscar Modulos" aria-label="Search">
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
            <a href="<?=base_url('superadmin/Dashboard/Usuarios')?>" class="nav-link">
              <i class="fa-solid fa-users"></i>
              <p>USUARIOS</p>
            </a>
          </li>
          <li class="nav-item mt-5 bg-danger">
            <a href="<?=base_url('Start/cerrarSession')?>" class="nav-link">
              <i class="fa-solid fa-right-from-bracket"></i>
              <p>CERRAR SESSION</p>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  
  
  <div class="content-wrapper">

    <div class="col-12 m-0 p-3">
      <h2 class="text-center text-dark"><b>MI PERFIL</b></h2>
    </div>

    <section class="content">

      <div class="d-flex justify-content-center">
        <div class="col-md-6">
          <div class="card card-widget widget-user shadow">
            
            <div class="widget-user-header bg-dark p-4">
              <h5 class="widget-user-desc"><?=$session['documento']?></h5>
              <h3 class="widget-user-username"><?=$session['nombre']?> <?=$session['apellido']?></h3>
            </div>

            <div class="widget-user-image mt-2">
              <img class="img-circle elevation-2" src="http://localhost/AgroControl/assets/dist/img/users/avatar0.png" alt="User Avatar">
            </div>

            <div class="card-footer">
              <div class="row">
                  <div class="col-sm-4 border-right">
                      <div class="description-block">
                          <h5 class="description-header"><?=$session['rol']?></h5>
                          <span class="description-text">ROL</span>
                      </div>
                  </div>
                  <div class="col-sm-4 border-right">
                      <div class="description-block">
                          <h5 class="description-header"><?=$session['email']?></h5>
                          <span class="description-text">EMAIL</span>
                      </div>
                  </div>
                  <div class="col-sm-4">
                      <div class="description-block">
                          <h5 class="description-header"><?=$session['estado']?></h5>
                          <span class="description-text">ESTADO</span>
                      </div>
                  </div>
              </div>
              <div class="row">
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header"><?=$session['telefono']?></h5>
                        <span class="description-text">TELEFONO</span>
                    </div>
                </div>
                <div class="col-sm-4 border-right">
                    <div class="description-block">
                        <h5 class="description-header"><?=$session['direccion']?></h5>
                        <span class="description-text">DIRECCION</span>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="description-block">
                        <h5 class="description-header"><?=$session['id_usuario']?></h5>
                        <span class="description-text">ID</span>
                    </div>
                </div>
              </div>
              <div class="row mt-4">
                <div class="col-sm-4">
                  <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" title="CAMBIAR CONTRASEÑA" data-bs-toggle="modal" data-bs-target="#staticBackdropPassword"><i class="fa-solid fa-lock"></i></button>
                  </div>
                </div>
                <div class="col-sm-4">
                  <span></span>
                </div>
                <div class="col-sm-4">
                  <div class="d-flex justify-content-center">
                    <button class="btn btn-primary" title="EDITAR PERFIL" data-bs-toggle="modal" data-bs-target="#staticBackdropPerfil"><i class="fa-solid fa-pencil"></i></button>
                  </div>
                </div>
              </div>
            </div>

          </div>
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


<!-- Modal -->
<div class="modal fade" id="staticBackdropPassword" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">CAMBIAR CONTRASEÑA</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <form action="<?=base_url('superadmin/usuarios/UsersController/cambiarPassword/' . $session['id_usuario'])?>" method="POST">
        <div class="modal-body">
          <div class="d-flex justify-content-center mb-4">
            <div class="contenedor py-2 text-center bg-white">
                <div class="p-3">
                  <h5><i class="fa-solid fa-lock"></i> INGRESE CONTRASEÑA ACTUAL</h5>
                  <input class="form-control" type="text" name="CurrentPassword" required>
                </div>
                <hr>
                <div class="p-3">
                  <h5>NUEVA CONTRASEÑA</h5>
                  <input class="form-control" type="password" name="nuevaPassword" required>
                </div>
                
                <div class="p-3">
                  <h5>CONFIRMAR CONTRASEÑA</h5>
                  <input class="form-control" type="password" name="confirmarPassword" required>
                </div>
            </div>
          </div>
  
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">CERRAR</button>
          <button type="submit" class="btn btn-outline-success">CAMBIAR CONTRASEÑA</button>
        </div>
      </form>

    </div>
  </div>
</div>

<div class="modal fade" id="staticBackdropPerfil" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="staticBackdropLabel">EDITAR PERFIL</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="<?=base_url('superadmin/usuarios/UsersController/ActualizarMiPerfil')?>" method="POST">
        <div class="modal-body">

          <div class="d-flex justify-content-center mb-4">
            <div class="contenedor py-2 text-center bg-white">
              <input type="hidden" name="id" value="<?=$session['id_usuario']?>">

              <div class="p-3">
                <h5><i class="fa-solid fa-address-card"></i> CEDULA</h5>
                <input class="form-control" type="number" name="cedula" value="<?=$session['documento']?>" required>
              </div>

              <div class="p-3">
                <h5><i class="fa-solid fa-user"></i> NOMBRES</h5>
                <input class="form-control" type="text" name="nombre" value="<?=$session['nombre']?>" required>
              </div>
              
              <div class="p-3">
                <h5><i class="fa-solid fa-user"></i> APELLIDOS</h5>
                <input class="form-control" type="text" name="apellido" value="<?=$session['apellido']?>" required>
              </div>

              <div class="p-3">
                <h5><i class="fa-solid fa-phone"></i> TELEFONO</h5>
                <input class="form-control" type="number" name="telefono" value="<?=$session['telefono']?>" required>
              </div>

              <div class="p-3">
                <h5><i class="fa-solid fa-location"></i> DIRECCION</h5>
                <input class="form-control" type="text" name="direccion" value="<?=$session['direccion']?>" required>
              </div>

              <div class="p-3">
                <h5><i class="fa-solid fa-envelope"></i> EMAIL</h5>
                <input class="form-control" type="email" name="email" value="<?=$session['email']?>" required>
              </div>
  
              <div class="row p-3">
                <h5><i class="fa-solid fa-plus"></i> PERMISOS</h5>
                <div class="col-md-6">
                  <select class="form-control" name="rol">
                      <?php
                        if ($session['rol']=="SUPERADMIN"){
                          ?>
                            <option value="<?=$session['rol']?>"><?=$session['rol']?></option>
                            <option value="ADMIN">ADMIN</option>
                            <option value="AGRICULTORES">AGRICULTORES</option>
                            <option value="JARDINEROS">JARDINEROS</option>
                            <option value="OPERADOR MAQUINARIA">OPERADOR MAQUINARIA</option>
                            <option value="GANADEROS">GANADEROS</option>
                            <option value="ASEADOR">ASEADOR</option>
                            <option value="PERSONAL MANTENIMIENTO">PERSONAL MANTENIMIENTO</option>
                          <?php
                        }
                      ?>
                  </select> 
                </div>
                <div class="col-md-6">
                  <select class="form-control" name="estado">
                      <?php
                        if ($session['estado']=="ACTIVO"){
                          ?>
                            <option value="<?=$session['estado']?>"><?=$session['estado']?></option>
                            <option value="INACTIVO">INACTIVO</option>
                          <?php
                        }
                      ?>
                  </select>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">CERRAR</button>
          <button type="submit" class="btn btn-outline-success">ACTUALIZAR DATOS</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="http://localhost/AgroControl/assets/plugins/jquery/jquery.min.js"></script>
<script src="http://localhost/AgroControl/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost/AgroControl/assets/dist/js/adminlte.min.js"></script>

</body>
</html>
