<!--Requerimos el encabezado-->
<?php
// Muestra todos los errores en el script
error_reporting(E_ALL);
ini_set('display_errors', 1);
require "../plantilla/header.php"?>
<!--Requerimos el encabezado-->
<link rel="stylesheet" href="css/participantes.css">

      <!-- Contenido central -->
      <div class="main-panel">
        <div class="content-wrapper">
        <h2 class="text-center">Participantes</h2>
        <div class="table-responsive table-shadow">
                    <table class="table table-hover" id="miTabla">

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
                          <th>Acciones</th>
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
                            <tr>
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
                                <td></td> <!-- Puedes agregar acciones específicas aquí si es necesario -->
                            </tr>
                        
                            
                        <?php } ?>
                    </tbody>
                    </table>
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

