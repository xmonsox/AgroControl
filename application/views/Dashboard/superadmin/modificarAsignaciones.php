<?php
  $this->load->view('dashboard/superadmin/layoutsSuperAdmin/header');
?>
  <?php
    $dataSidebar['session']= $session;
    $dataSidebar['OptionSelected']='Perfil';
    
    $this->load->view('dashboard/superadmin/layoutsSuperAdmin/sidebar',$dataSidebar);
  ?>
  <?php
    if(isset($asignacionActualizada)){
      ?>
        <script>
          Swal.fire({
            title: "ASIGNACION MODIFICADA",
            text: "La asignacion fue modificada exitosamente",
            icon: "success"
          });
        </script>
      <?php
    }elseif(isset($camposvacios)){
      ?>
        <script>
          Swal.fire({
            title: "ERROR EN DATOS",
            text: "Hay campos que estan vacios",
            icon: "warning"
          });
        </script>
      <?php
    }
  ?>

  <div class="content-wrapper">

    <section class="content">
        <?php
            if(isset($asignacion)){
                ?>
                <div class="d-flex justify-content-center">
                    <div class="contenedor py-2 text-center bg-white">
                        <form method="post" action="<?php echo base_url('superadmin/asignaciones/AsignacionesController/updateAsignaciones'); ?>">
                            <h4 class="mt-5"><b>MODIFICANDO ASIGNACION</b></h4>
                            <input type="hidden" name="id_asignacion" value="<?=$asignacion->id_asignacion?>">

                            <div class="row p-3">

                                <div class="col-md-6">
                                    <select class="form-select" id="id_actividad" name="id_actividad">
                                        <option value="" disabled selected style="color: gray;">ACTIVIDAD</option>
                                        <?php foreach ($actividades as $actividad): ?>
                                            <option value="<?=$actividad->id_actividad?>"><?= $actividad->nombre_actividad ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                
                                <div class="col-md-6">
                                    <select class="form-select" name="id_usuario">
                                        <option value="" disabled selected style="color: gray;">USUARIO</option>
                                        <?php foreach ($usuarios as $usuario): ?>
                                            <option value="<?=$usuario->id_usuario?>"><?= $usuario->nombre?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                            </div>

                            <div class="row p-3">

                                <div class="col-md-6">
                                    <select class="form-select" name="id_maquinaria">
                                    <option value="" disabled selected style="color: gray;">MAQUINARIAS</option>
                                    <?php foreach ($maquinarias as $maquinaria): ?>
                                        <option value="<?=$maquinaria->id_maquinaria?>"><?= $maquinaria->nombre?></option>
                                    <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <select class="form-select" name="estado_asignacion">
                                        <option value="" disabled selected style="color: gray;">ESTADO</option>
                                        <option value="En progreso">EN PROGRESO</option>
                                        <option value="Completada">COMPLETADA</option>
                                        <option value="Pendiente">PENDIENTE</option>
                                        <option value="Suspendida">SUSPENDIDA</option>
                                        <option value="Cancelada">CANCELADA</option>
                                        <option value="Atrasada">ATRASADA</option>
                                    </select>
                                </div>

                            </div>
                        
                            
                                         
                            <div class="row p-3">
                            
                                <div class="col-md-6 mb-3">
                                    <h6><i class="fa-solid fa-calendar-days"></i><b> FECHA INICIO</b></h6>
                                    <input type="date" class="form-control" name="fecha_inicio" required value="<?= $asignacion->fecha_inicio ?>">
                                    
                                </div>

                                <div class="col-md-6 mb-3">
                                    <h6><i class="fa-solid fa-calendar-days"></i><b> FECHA FIN</b></h6>
                                    <input type="date" class="form-control"  name="fecha_finalizacion" required value="<?= $asignacion->fecha_finalizacion ?>">
                                </div>
                                
                            </div>
                            
                            <div class="container d-grid gap-2 py-3">
                                <input type="submit" class="btn btn-success" value="GUARDAR CAMBIOS">
                                <a class="btn btn-dark" href="<?=base_url('superadmin/Dashboard/Asignaciones')?>">REGRESAR A ASIGNACIONES</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }elseif(isset($asignacion)==null){
                ?>
                <div class="pt-5">
                    <h3 class="text-center py-2">EL ID NO FUE ENCONTRADO</h3>
                    <div class="d-flex justify-content-center ">
                        <img class="img img-fluid" src="http://localhost/AgroControl/assets/dist/img/search.png" alt="">
                    </div>
                </div>
                <?php
            }
        ?>
    </section>
  </div>

    <?php
        $this->load->view('dashboard/superadmin/layoutsSuperAdmin/footer');
    ?>

  <aside class="control-sidebar control-sidebar-dark">
  </aside>
</div>

<script src="http://localhost/AgroControl/assets/plugins/jquery/jquery.min.js"></script>
<script src="http://localhost/AgroControl/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="http://localhost/AgroControl/assets/dist/js/adminlte.min.js"></script>

</body>
</html>
