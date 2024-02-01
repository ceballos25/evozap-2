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
        <h2 class="text-center">Pl's Graduados Spanda</h2>
        <div class="table-responsive table-shadow">
                    <table class="table table-hover display expandable-table" id="miTabla">

                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Cedula</th>
                          <th>Cel.</th>
                          <th>Correo</th>
                          <th>Fecha graduación</th>
                        </tr>
                      </thead>                      
                      <tbody>
                        <!--conect to database-->
                        <?php require "../../funciones/conexion.php";
                          
                          $conexion = new ConexionCrud('localhost', 'user_registro', 'Y,D:{`r0y3p\>-*pX8r#', 'evozap_202401');
                          $conn = $conexion->getConnection();

                          $sql = "SELECT graduado.id, graduado.id_registro_participante, participante.nombre, participante.cedula, participante.celular, participante.correo, graduado.fecha_graduacion_pl

                          FROM participante
                          INNER JOIN graduado ON participante.id = graduado.id_registro_participante";
                          
                          $resultado = $conn->query($sql);

                          while ($fila = $resultado->fetch_assoc()) { ?>
                            <tr>
                                <td><?php echo $fila['id'] ?></td>
                                <td><?php echo $fila['nombre'] ?></td>
                                <td><?php echo $fila['cedula'] ?></td>
                                <td><?php echo $fila['celular'] ?></td>
                                <td><?php echo $fila['correo'] ?></td>
                                <td><?php echo date('d/m/Y A', strtotime($fila['fecha_graduacion_pl'])) ?></td>
                            </tr>
                        
                            
                        <?php } ?>
                    </tbody>
                    </table>
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
<script src="js/graduado.js"></script>
<!--Requerimos el footer-->

