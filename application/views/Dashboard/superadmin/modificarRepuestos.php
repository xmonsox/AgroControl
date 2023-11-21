<?php
  $this->load->view('dashboard/superadmin/layoutsSuperAdmin/header');
?>
  <?php
    $dataSidebar['session']=$session;
    $dataSidebar['OptionSelected']='Perfil';
    
    $this->load->view('dashboard/superadmin/layoutsSuperAdmin/sidebar',$dataSidebar);
  ?>
  <?php
    if(isset($datorepetido)){
      ?>
        <script>
          Swal.fire({
            title: "NO SE ACTUALIZO",
            text: "Datos de repuesto repetidos",
            icon: "warning"
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
            if(isset($repuesto)){
                ?>
                <div class="d-flex justify-content-center">
                    <div class="contenedor py-2 text-center bg-white">
                        <form method="post" action="<?php echo base_url('superadmin/repuestos/RepuestosController/actualizarDates'); ?>">
                            <input type="hidden" name="id_repuesto" value="<?=$repuesto->id_repuesto?>">
                            <div class="p-3">
                                <h5><i class="fa-solid fa-barcode"></i> CODIGO</h5>
                                <input class="form-control" type="number" name="codigo" value="<?=$repuesto->codigo?>" required>
                            </div>

                            <div class="row p-3">
                                <div class="col-md-6">
                                    <h5><i class="fa-solid fa-toolbox"></i> NOMBRE</h5>
                                    <input class="form-control" type="text" name="nombre" value="<?=$repuesto->nombre?>" required>
                                </div>
                                <div class="col-md-6">
                                    <h5><i class="fa-solid fa-list"></i> TIPO REPUESTO</h5>
                                    <select class="form-select" name="tipo_repuesto" id="">
                                        <option value="" selected style="color: gray;">Seleccione..</option>
                                        <option value="Motor">Motor</option>
                                        <option value="Transmision">Transmision</option>
                                        <option value="Suspension">Suspension</option>
                                        <option value="Frenos">Frenos</option>
                                        <option value="Electricos">Electricos</option>
                                        <option value="Carroceria">Transmision</option>
                                        <option value="Neumaticos">Neumaticos</option>
                                        <option value="Herramientas/Taller">Herramientas/Taller</option>
                                    </select>
                                </div>
                            </div>

                            <div class="row p-3">
                                <div class="col-md-6">
                                    <h5><i class="fa-solid fa-arrow-up-wide-short"></i> CANTIDAD</h5>
                                    <input class="form-control" type="number" name="cantidad" value="<?= $repuesto->cantidad ?>" required>
                                </div>
                                <div class="col-md-6">
                                    <h5><i class="fa-solid fa-dollar-sign"></i> PRECIO COMPRA</h5>
                                    <input class="form-control" type="number" name="precio_compra" value="<?=$repuesto->precio_compra ?>" required>
                                </div>
                            </div>
                        
                            <div class="p-3">
                                <h5><i class="fa-solid fa-circle-info"></i> DESCRIPCION</h5>
                                <textarea name="descripcion" class="form-control" cols="100%" rows="8" required><?=$repuesto->descripcion ?></textarea>
                            </div>
                                         
                            <div class="row p-3">
                                <div class="col-md-6">
                                    <select class="form-select" id="id_proveedor" name="id_proveedor">
                                        <option value="..." selected style="color: gray;">PROVEEDOR</option>
                                        <?php foreach ($proveedores as $proveedor): ?>
                                            <option value="<?=$proveedor->id_proveedor?>"><?=$proveedor->nombre?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select class="form-control" name="estado">
                                        <?php if ($repuesto): ?>
                                            <?php if ($repuesto->estado == "DISPONIBLE"): ?>
                                                <option value="<?=$repuesto->estado?>"><?=$repuesto->estado?></option>
                                                <option value="NO DISPONIBLE">NO DISPONIBLE</option>
                                                <option value="PEDIDO">PEDIDO</option>
                                            <?php elseif ($repuesto->estado == "NO DISPONIBLE"): ?>
                                                <option value="<?=$repuesto->estado?>"><?=$repuesto->estado?></option>
                                                <option value="DISPONIBLE">DISPONIBLE</option>
                                                <option value="PEDIDO">PEDIDO</option>
                                            <?php elseif ($repuesto->estado == "PEDIDO"): ?>
                                                <option value="<?=$repuesto->estado?>"><?=$repuesto->estado?></option>
                                                <option value="DISPONIBLE">DISPONIBLE</option>
                                                <option value="NO DISPONIBLE">NO DISPONIBLE</option>
                                            <?php endif; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>
                            
                            <div class="container d-grid gap-2 py-3">
                                <input type="submit" class="btn btn-success" value="GUARDAR CAMBIOS">
                                <a class="btn btn-dark" href="<?=base_url('superadmin/Dashboard/Repuestos')?>">REGRESAR A REPUESTOS</a>
                            </div>
                        </form>
                    </div>
                </div>
                <?php
            }elseif(isset($repuesto)==null){
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
