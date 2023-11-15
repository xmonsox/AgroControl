<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>DashBoard - Admin </title>

  <link rel="stylesheet" href="http://localhost/AgroControl/assets/dist/css/myStyles2.css">
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet"
    href="http://localhost/AgroControl/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="http://localhost/AgroControl/assets/dist/css/adminlte.min.css">
  <link rel="stylesheet"
    href="http://localhost/AgroControl/assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet"
    href="http://localhost/AgroControl/assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet"
    href="http://localhost/AgroControl/assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet"
    href="http://localhost/AgroControl/assets/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">


  <style>
    .info-icon {
      color: rgb(255, 195, 6);
      font-size: 5em;
    }

    .icono {
      color: #343a40;
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
          <a href="<?= base_url('superadmin/Dashboard/Inicio') ?>" class="nav-link">Inicio</a>
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
      <a href="<?= base_url('superadmin/Dashboard/Inicio') ?>" class="brand-link">
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
              <a href="<?= base_url('superadmin/Dashboard/Usuarios') ?>" class="nav-link active">
                <i class="fa-solid fa-users"></i>
                <p>USUARIOS</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url('superadmin/Dashboard/Proveedores') ?>" class="nav-link">
                <i class="fa-solid fa-users"></i>
                <p>PROVEEDORES</p>
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

    <?php
      if (isset($usuarioinsertado)) {
        ?>
          <script>
            Swal.fire({
              title: "REGISTRO EXITOSO",
              text: "El usuario se ha registrado correctamente",
              icon: "success"
            });
          </script>
          <meta http-equiv="refresh" content="3;url=<?= base_url('superadmin/Dashboard/Usuarios')?>">
        <?php
      }
    ?>

    <div class="content-wrapper">
      <section class="content-header">
        <div class="container-fluid">
      </section>

      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">

              <div class="card">

                <div class="card-body">
                  <div class="d-flex justify-content-start py-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop"><i class="fa-solid fa-user-plus"></i> REGISTRAR USUARIO</button>
                  </div>
                  <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr class="bg-dark">
                        <th>ID</th>
                        <th>CEDULA</th>
                        <th>NOMBRES</th>
                        <th>APELLIDOS</th>
                        <th>TELEFONO</th>
                        <th>DIRECCION</th>
                        <th>ROL</th>
                        <th>EMAIL</th>
                        <th>ESTADO</th>
                        <th>EDITAR</th>
                        <th>ELIMINAR</th>
                      </tr>
                    </thead>

                    <tbody>
                      <?php foreach ($Usuarios as $usuario): ?>
                        <tr>
                          <td><?= $usuario->id_usuario ?></td>
                          <td><?= $usuario->documento ?></td>
                          <td><?= $usuario->nombre ?></td>
                          <td><?= $usuario->apellido ?></td>
                          <td><?= $usuario->telefono ?></td>
                          <td><?= $usuario->direccion ?></td>
                          <td><?= $usuario->rol ?></td>
                          <td><?= $usuario->email ?></td>
                          <?php
                          if ($usuario->estado == "ACTIVO") {
                            ?>
                            <td class="table-success"><?= $usuario->estado ?></td>
                            <?php
                          } elseif ($usuario->estado == "INACTIVO") {
                            ?>
                            <td class="table-danger"><?= $usuario->estado ?></td>
                            <?php
                          }
                          ?>
                          <td class="text-center">
                            <a href="<?=base_url('superadmin/usuarios/UsersController/EditarUsuario/'.$usuario->id_usuario)?>"><button class="btn btn-outline-success" title="EDITAR"><i class="fa-solid fa-user-pen"></i></button></a>
                          </td>
                          <td class="text-center">
                            <button class="btn btn-outline-danger" title="ELIMINAR"  
                              onclick="Swal.fire({
                                      title: '¿Deseas eliminar este usuario?',
                                      text: 'No podras revertir este cambio!',
                                      icon: 'warning',
                                      confirmButtonColor: '#3085d6',
                                      showDenyButton: true,                                                                                                                                                                                          
                                      confirmButtonText: 'SI ELIMINAR',
                                      denyButtonText: 'NO ELIMINAR',
                                    }).then((result) => {                                                                                    
                                      if (result.isConfirmed) {
                                        Swal.fire('Eliminado Correctamente!', '', 'success');
                                        window.location.href='<?=base_url('superadmin/usuarios/UsersController/deleteUsuario/'.$usuario->id_usuario)?>';
                                      } else if (result.isDenied) {
                                        Swal.fire('No Se Realizaron Cambios', '', 'info');
                                      }
                                    });"><i class="fa-solid fa-trash-can"></i>
                            </button> 
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
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
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
    aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header bg-dark">
          <h1 class="modal-title fs-5" id="staticBackdropLabel"><i class="fa-solid fa-user-plus"></i> REGISTRAR USUARIOS</h1>
        </div>
        <form action="<?= base_url('superadmin/usuarios/UsersController/CrearUsuario') ?>" method="POST">
          <div class="modal-body">
            <div class="input-group mb-3">
              <input type="number" class="form-control" name="documento" required placeholder="NUMERO DE DOCUMENTO">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span><i class="fa-solid fa-address-card"></i></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="nombres" required placeholder="NOMBRES">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="apellidos" required placeholder="APELLIDOS">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-user"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="number" class="form-control" name="telefono" required placeholder="TELEFONO">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-phone"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="text" class="form-control" name="direccion" required placeholder="DIRECCION">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-location"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="email" class="form-control" name="email" required placeholder="EMAIL">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" name="password" required placeholder="CONTRASEÑA">
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row mb-3">
              <div class="col-md-6">
                <select class="form-control" name="rol" id="">
                  <option value="SUPERADMIN">SUPERADMIN</option>
                  <option value="ADMIN">ADMIN</option>
                  <option value="AGRICULTORES">AGRICULTORES</option>
                  <option value="JARDINEROS">JARDINEROS</option>
                  <option value="OPERADOR MAQUINARIA">OPERADOR MAQUINARIA</option>
                  <option value="GANADEROS">GANADEROS</option>
                  <option value="ASEADOR">ASEADOR</option>
                  <option value="PERSONAL MANTENIMIENTO">PERSONAL MANTENIMIENTO</option>
                </select>
              </div>
              <div class="col-md-6">
                <select class="form-control" name="estado" id="">
                  <option value="ACTIVO">ACTIVO</option>
                  <option value="INACTIVO">INACTIVO</option>
                </select>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">CANCELAR</button>
            <button type="submit" class="btn btn-outline-success">REGISTRAR</button>
          </div>
        </form>
      </div>
    </div>
  </div>


  <script src="http://localhost/AgroControl/assets/plugins/jquery/jquery.min.js"></script>
  <script
    src="http://localhost/AgroControl/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script
    src="http://localhost/AgroControl/assets/plugins/datatables/jquery.dataTables.min.js"></script>
  <script
    src="http://localhost/AgroControl/assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script
    src="http://localhost/AgroControl/assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script
    src="http://localhost/AgroControl/assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <script
    src="http://localhost/AgroControl/assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
  <script
    src="http://localhost/AgroControl/assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
  <script src="http://localhost/AgroControl/assets/plugins/jszip/jszip.min.js"></script>
  <script src="http://localhost/AgroControl/assets/plugins/pdfmake/pdfmake.min.js"></script>
  <script src="http://localhost/AgroControl/assets/plugins/pdfmake/vfs_fonts.js"></script>
  <script
    src="http://localhost/AgroControl/assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
  <script
    src="http://localhost/AgroControl/assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
  <script
    src="http://localhost/AgroControl/assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
  <script src="http://localhost/AgroControl/assets/dist/js/adminlte.min.js"></script>


  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>


</body>

</html>
