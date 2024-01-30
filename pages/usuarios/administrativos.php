<!--Requerimos el encabezado-->
<?php
// Muestra todos los errores en el script
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "../plantilla/header.php"?>
<!--Requerimos el encabezado-->
      <!-- Contenido central -->
      <div class="main-panel">
        <div class="content-wrapper">
        <h2 class="text-center">Administrativos</h2>
        <button class="btn btn-success btn-sm mb-2" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Agregar Administrativo" id="btnAddAdministrativo"><i class="mdi mdi-account-plus"></i></button>
        <div class="table-responsive table-shadow">
                    <table class="table table-hover display expandable-table" id="tableAdministrativos">

                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Cedula</th>
                          <th>Cel.</th>
                          <th>Correo</th>
                          <th>Dirección</th>
                          <th>Cargo</th>
                          <th>Rol Sistema</th>
                        </tr>
                      </thead>                      
                      <tbody>
                        <!--conect to database-->
                        <?php require "../../funciones/conexion.php";
                          
                          $conexion = new ConexionCrud('localhost', 'user_registro', 'Y,D:{`r0y3p\>-*pX8r#', 'evozap_202401');
                          $conn = $conexion->getConnection();

                          $sql = "SELECT * FROM administrativos";
                          
                          $resultado = $conn->query($sql);

                          while ($fila = $resultado->fetch_assoc()) { ?>
                            <tr style="cursor: pointer !important;">
                                <td><?php echo $fila['id'] ?></td>
                                <td class="text-uppercase"><?php echo $fila['nombre'] ?></td>
                                <td class="text-uppercase"><?php echo $fila['cedula'] ?></td>
                                <td><?php echo $fila['celular'] ?></td>
                                <td class="text-uppercase"><?php echo $fila['correo'] ?></td>
                                <td class="text-uppercase"><?php echo $fila['direccion'] ?></td>
                                <td class="text-uppercase"><?php echo $fila['correo'] ?></td>
                                <td><?php echo $fila['rol'] ?></td>
                            </tr>
                        
                            
                        <?php } ?>
                    </tbody>
                    </table>
                  </div>

      <!-- Modal muestra informacion -->
         <div class="modal fade" id="modalFichaAdministrativo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog mt-2">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title me-4">Personal Administrativo</h4>
                     <span class="p-2 btn btn-outline-dark float-rigth" id="habilitarEditar">Editar <i class="mdi mdi-pencil"></i></span>
                  </div>
                  <div class="modal-body p-0">
                     <form method="POST" action="editar-participante.php">
                        <div class="card">
                           <div class="row no-gutters">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <input type="hidden" id="idAdministrativo" name="idAdministrativo" readonly>
                                       <label class="mb-2">Nombre:</label>
                                       <input type="text" class="form-control form-control-sm no-editar text-dark transition text-uppercase" id="nombreAdministrativo" name="nombreAdministrativo" readonly>
                                    </div>
                                    <div class="col-md-6">
                                       <label class="mt-2 form-label">Cedula:</label>
                                       <input type="text" class="form-control form-control-sm no-editar text-dark transition" id="cedulaAdministrativo" name="cedulaAdministrativo" readonly>
                                    </div>

                                    <div class="col-md-6">
                                       <label class="mt-2">Celular:</label>
                                       <input type="text" class="form-control form-control-sm no-editar text-dark transition" id="celularAdministrativo" name="celularAdministrativo" readonly>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">Correo:</label>
                                       <input type="text" class="form-control form-control-sm no-editar text-dark transition text-uppercase" id="correoAdministrativo" name="correoAdministrativo" readonly>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">Dirección:</label>
                                       <input type="text" class="form-control form-control-sm no-editar text-dark transition text-uppercase" id="direccionAdministrativo" name="direccionAdministrativo" readonly>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">Cargo:</label>
                                       <input type="text" class="form-control form-control-sm no-editar text-dark transition text-uppercase" id="cargoAdministrativo" name="cargoAdministrativo" readonly>
                                    </div>

                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">Rol: (en el sistema)</label>
                                       <select class="form-select form-control form-control-sm no-editar text-dark transition" aria-label="Default select example"  id="rolAdministrativo" name="rolAdministrativo" disabled required>
                                          <option selected></option>
                                          <option value="Administrador">Administrador</option>
                                          <option value="Restringido">Restringido</option>
                                          <option value="Standar">Standar</option>
                                       </select>
                                    </div>

                                 </div>
                                 <hr>
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      <!-- Modal muestra informacion -->   

      <!-- Modal add administrativo -->
      <div class="modal fade" id="modalFichaAddAdministrativo" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog mt-2">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title me-4">Agregar personal Administrativo</h4>
                  </div>
                  <div class="modal-body p-0">
                     <form>
                        <div class="card">
                           <div class="row no-gutters">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-12">
                                       <label class="mb-2">Nombre:</label>
                                       <input type="text" class="form-control form-control-sm text-dark transition text-uppercase" id="nombreAdministrativoAdd" name="nombreAdministrativoAdd" required  minlength="10">
                                    </div>
                                    <div class="col-md-6">
                                       <label class="mt-2 form-label">Cedula:</label>
                                       <input type="text" class="form-control form-control-sm text-dark transition" id="cedulaAdministrativoAdd" name="cedulaAdministrativoAdd" required minlength="7">
                                    </div>

                                    <div class="col-md-6">
                                       <label class="mt-2">Celular:</label>
                                       <input type="tel" class="form-control form-control-sm text-dark transition" id="celularAdministrativoAdd" name="celularAdministrativoAdd" required minlength="10">
                                    </div>
                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">Correo:</label>
                                       <input type="email" class="form-control form-control-sm text-dark transition text-uppercase" id="correoAdministrativoAdd" name="correoAdministrativoAdd" required>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">Dirección:</label>
                                       <input type="text" class="form-control form-control-sm text-dark transition text-uppercase" id="direccionAdministrativoAdd" name="direccionAdministrativoAdd" required minlength="5">
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">Cargo:</label>
                                       <input type="text" class="form-control form-control-sm text-dark transition text-uppercase" id="cargoAdministrativoAdd" name="cargoAdministrativoAdd" minlength="5">
                                    </div>

                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">Rol: (en el sistema)</label>
                                       <select class="form-select form-control form-control-sm text-dark transition" aria-label="Default select example"  id="rolAdministrativoAdd" name="rolAdministrativoAdd" required>
                                          <option selected></option>
                                          <option value="Administrador">Administrador</option>
                                          <option value="Restringido">Restringido</option>
                                          <option value="Standar">Standar</option>
                                       </select>
                                    </div>

                                 </div>
                                 <hr>
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>         

      </div>
      <!-- Modal add administrativo -->

      <!-- main-panel ends -->
    </div>   
  </div>
  <!-- contenido central -->

  <?php  $conn->close(); ?>



<!--Requerimos el footer-->
<?php require "../plantilla/footer.php" ?>
<script src="js/administrativos.js"></script>
<!--Requerimos el footer-->

