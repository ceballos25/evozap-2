<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Entrenamiento</title>
      <!-- CSS utilizamos jquery en su ultima version y boostrap5 para mostrar el modal -->
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>            
      <script src="https://kit.fontawesome.com/cf96aaa9b2.js" crossorigin="anonymous"></script>
</head>
<body>
            <!-- Modal -->
            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="myModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Se ha Registrado correctamente <img src="img/confirmacion.gif" alt="img_confirmacion" width="10%"></h5>
                </div>
                <div class="modal-body d-flex">
                    Se ha registrado correctamente, le enviamos un correo electrónico de confirmación, por favor esté atento(a) en los próximos días.
                </div>
                <div class="modal-footer">
                    <a href="../index.php" type="button" style="background:#4b49ac; color:#fff;" class="btn">De acuerdo</a>
                </div>
                </div>
            </div>
            </div>

            <!-- Modal Error-->
            <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header text-center">
                    <h5 class="modal-title" id="exampleModalLabel">Error</h5>
                </div>
                <div class="modal-body d-flex">
                    Lo siento algo salió mal, por favor comuníquese con nuestras líneas de atención: 3123 123 123
                </div>
                <div class="modal-footer">
                    <a href="../index.php" type="button" style="background:#4b49ac; color:#fff;" class="btn">volver a intentar</a>
                </div>
                </div>
            </div>
            </div>            
<?php
// Función para sanitizar datos
function sanitizeInput($input) {
    return htmlspecialchars(trim($input), ENT_QUOTES, 'UTF-8');
}

// Verificar si se han enviado datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir variables POST y sanitizarlas
    $nombre = isset($_POST["nombre"]) ? sanitizeInput($_POST["nombre"]) : "";
    $cedula = isset($_POST["cedula"]) ? sanitizeInput($_POST["cedula"]) : "";
    $tipo_documento = isset($_POST["tipo_documento"]) ? sanitizeInput($_POST["tipo_documento"]) : "";
    $celular = isset($_POST["celular"]) ? sanitizeInput($_POST["celular"]) : "";
    $correo = isset($_POST["correo"]) ? sanitizeInput($_POST["correo"]) : "";
    $objetivos = isset($_POST["objetivos"]) ? sanitizeInput($_POST["objetivos"]) : "";
    $tratamientos = isset($_POST["tratamientos"]) ? sanitizeInput($_POST["tratamientos"]) : "";
    $detalle_tratamiento = isset($_POST["detalle_tratamiento"]) ? sanitizeInput($_POST["detalle_tratamiento"]) : "";
    $cedula_referido = isset($_POST["cedula_referido"]) ? sanitizeInput($_POST["cedula_referido"]) : "";
    $checkAcuerdo = isset($_POST["checkAcuerdo"]) ? $_POST["checkAcuerdo"] : "";
    $nombreEntrenamiento = isset($_POST["nombre_entrenamiento"]) ? $_POST["nombre_entrenamiento"] : "";
    $fechaInicioEntrenamiento = isset($_POST["fechaInicio"]) ? $_POST["fechaInicio"] : "";
    $fechaFinEntrenamiento = isset($_POST["fechaFin"]) ? $_POST["fechaFin"] : "";
    $estado_matricula = "Pendiente";

    // Validar datos (ejemplo simple)
    if (empty($nombre) ||
        empty($cedula) ||
        empty($tipo_documento) ||
        empty($celular) ||
        empty($correo) ||
        empty($objetivos) ||
        empty($tratamientos) ||
        empty($cedula_referido)
    ) {
        // Alguna variable está vacía, redirigir o mostrar mensaje
        echo '<p>Lo siento, debes completar todos los campos.</p>';
    } else {
        // Validar correo electrónico
        if (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
            echo '<p>Correo electrónico no válido.</p>';
        } else {

            
            //requerimos la conexion
            require 'conexion.php';
            // Crea una instancia de la clase de conexión
            $conexion = new Conexion('localhost', 'user_registro', 'Y,D:{`r0y3p\>-*pX8r#', 'evozap_202401');
            $conn = $conexion->getConnection();

            // Ejemplo de consulta
            $sql = "INSERT INTO participante
            (id,
             nombre,
             cedula,
             tipo_documento,
             celular, correo,
             objetivos,
             tratamiento_psicologico,
             detalle_tratamiento_psicologico,
             cedula_referenciado,
             nombre_entrenamiento,
             fecha_inicio_entrenamiento,
             fecha_fin_entrenamineto,
             acepta_habeas_data,
             estado_matricula,
             fecha_registro) VALUES
             (null,
              '$nombre',
              '$cedula',
              '$tipo_documento',
              '$celular',
              '$correo',
              '$objetivos',
              '$tratamientos',
              '$detalle_tratamiento',
              '$cedula_referido',
              '$nombreEntrenamiento',
              '$fechaInicioEntrenamiento',
              '$fechaFinEntrenamiento',
              '$checkAcuerdo',
              '$estado_matricula',
               current_timestamp())";


            $resultado = $conn->query($sql);

            if ($resultado) {
                //utilizamos jquery en su ultima version y boostrap5 para mostrar el modal
                echo '<script>
                var myModal = new bootstrap.Modal(document.getElementById("myModal"));
                myModal.show();
            </script>';
            } else {
                echo '<script>
                var myModalError = new bootstrap.Modal(document.getElementById("modalError"));
                myModalError.show();
            </script>';
            }

            // Cierra la conexión cuando hayas terminado
            $conexion->closeConnection();

        }
    }
} else {
    // Si no es una solicitud POST, puedes redirigir o manejar el error de alguna otra manera
    echo "No se recibieron datos por POST.";
}
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
      <!--[if lt IE 10]-->
</body>
</html>

