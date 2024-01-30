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
        <h2 class="text-center">Participantes</h2>
        <div class="table-responsive table-shadow">
                    <table class="table table-hover display expandable-table" id="miTabla">

                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Cedula</th>
                          <th>Tipo Doc.</th>
                          <th>Cel.</th>
                          <th>Correo</th>
                          <th>Objetivos</th>
                          <th>Trataiento Psicológico</th>
                          <th>Detalles tratamiento</th>
                          <th>Cedula Refe.</th>
                          <th>Entrenamiento</th>
                          <th>Inicio Entrenamiento</th>
                          <th>Fin Entrenamiento</th>
                          <th>Fecha Registro</th>
                        </tr>
                      </thead>                      
                      <tbody>
                        <!--conect to database-->
                        <?php require "../../funciones/conexion.php";
                          
                          $conexion = new ConexionCrud('localhost', 'user_registro', 'Y,D:{`r0y3p\>-*pX8r#', 'evozap_202401');
                          $conn = $conexion->getConnection();

                          $sql = "SELECT * FROM participante";
                          
                          $resultado = $conn->query($sql);

                          while ($fila = $resultado->fetch_assoc()) { ?>
                            <tr style="cursor:pointer;">
                                <td><?php echo $fila['id'] ?></td>
                                <td><?php echo $fila['nombre'] ?></td>
                                <td><?php echo $fila['cedula'] ?></td>
                                <td><?php echo $fila['tipo_documento'] ?></td>
                                <td><?php echo $fila['celular'] ?></td>
                                <td><?php echo $fila['correo'] ?></td>
                                <td><?php echo $fila['objetivos'] ?></td>
                                <td><?php echo $fila['tratamiento_psicologico'] ?></td>
                                <td><?php echo $fila['detalle_tratamiento_psicologico'] ?></td>
                                <td><?php echo $fila['cedula_referenciado'] ?></td>
                                <td><?php echo $fila['nombre_entrenamiento'] ?></td>
                                <td><?php echo $fila['fecha_inicio_entrenamiento'] ?></td>
                                <td><?php echo $fila['fecha_fin_entrenamineto'] ?></td>
                                <td><?php echo date('d/m/Y h:i A', strtotime($fila['fecha_registro'])) ?></td>
                            </tr>
                        
                            
                        <?php } ?>
                    </tbody>
                    </table>
                  </div>

              </div>
               <!-- Modal muestra informacion -->
               <div class="modal fade" id="modalFichaParticipante" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog mt-2">
               <div class="modal-content">
                  <div class="modal-header">
                     <h4 class="modal-title me-4">Información Personal</h4>
                  </div>
                  <div class="modal-body p-0">
                     <form>
                        <div class="card">
                           <div class="row no-gutters">
                              <div class="card-body">
                                 <div class="row">
                                    <div class="col-md-7">
                                       <input type="hidden" id="idParticipante" name="idParticipante" readonly>
                                       <label class="mb-2">Nombre:</label>
                                       <input type="text" class="form-control form-control-sm no-editar text-dark transition" id="nombreParticipante" name="nombreParticipante" readonly>
                                    </div>
                                    <div class="col-md-5">
                                       <label class="mb-2 form-label">Cedula:</label>
                                       <input type="text" class="form-control form-control-sm no-editar text-dark transition" id="cedulaParticipante" name="cedulaParticipante" readonly>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                       <label class="mb-2">Tipo Doc:</label>
                                       <select class="form-select form-control form-control-sm no-editar text-dark transition" aria-label="Default select example"  id="tipoDocumentoParticipante" name="tipoDocumentoParticipante" disabled required>
                                          <option selected></option>
                                          <option value="C.C">C.C</option>
                                          <option value="C.E">C.E</option>
                                          <option value="PASAPORTE">PASAPORTE</option>
                                       </select>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                       <label class="mb-2">Celular:</label>
                                       <input type="text" class="form-control form-control-sm no-editar text-dark transition" id="celularParticipante" name="celularParticipante" readonly>
                                    </div>
                                 </div>
                                 <div class="row">
                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">Correo:</label>
                                       <input type="text" class="form-control form-control-sm no-editar text-dark transition" id="correoParticipante" name="correoParticipante" readonly>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">Objetivos:</label>
                                       <textarea class="form-control form-control-sm no-editar text-dark transition" name="objetivosParticipante" id="objetivosParticipante" readonly></textarea>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">¿tratamiento Psicológico?:</label>
                                       <input type="text" class="form-control form-control-sm no-editar text-dark transition" id="tratamientoParticipante" name="tratamientoParticipante" readonly>
                                    </div>
                                    <div class="col-md-6 pt-2">
                                       <label class="pt-2 mb-2">Detalles Tratamiento:</label>
                                       <textarea class="form-control form-control-sm no-editar text-dark transition" name="detalleTratamientoParticipante" id="detalleTratamientoParticipante" readonly></textarea>
                                    </div>
                                 </div>
                                 <hr>
                                 <h4 class="mb-2" id="exampleModalLabel">Referido Por</h4>
                                 <div class="row">
                                    <div class="col-md-6">
                                       <label class="pt-2 mb-2">Nombre:</label>
                                       <input type="text" class="form-control form-control-sm editar" id="" name="" value="Andres Felipe Mondragon" readonly>
                                    </div>
                                    <div class="col-md-6">
                                       <label class="pt-2 mb-2">Cedula:</label>
                                       <input type="text" class="form-control form-control-sm editar" id="" name="" value="1007581003" readonly>
                                    </div>
                                    <div class="col-md-6">
                                       <label class="pt-2 mb-2">Celular:</label>
                                       <input type="text" class="form-control form-control-sm editar" id="" name="" value="324 589 4268" readonly>
                                    </div>
                                    <div class="col-md-6">
                                       <label class="pt-2 mb-2">PL:</label>
                                       <input type="text" class="form-control form-control-sm editar" id="" name="" value="PL40" readonly>
                                    </div>
                                    <div class="col-md-12">
                                       <label class="pt-2 mb-2">Fecha y hora de Registro:</label>
                                       <input type="text" class="form-control form-control-sm editar" id="fechaHoraRegistro" name="fechaHoraRegistro" readonly>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  </div>
                  </form>
               </div>
            </div>
         </div>
      
      <!-- main-panel ends -->
    </div>   
  </div>
  <!-- contenido central -->

  <?php  $conn->close(); ?>



<!--Requerimos el footer-->
<?php require "../plantilla/footer.php" ?>
<script src="js/participantes.js"></script>
<!--Requerimos el footer-->

