<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EvoZap</title>
      <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>            
      <script src="https://kit.fontawesome.com/cf96aaa9b2.js" crossorigin="anonymous"></script>

</head>
<body>
    <!-- Modal success -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalSuccess" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header text-center">
            <h5 class="modal-title" id="exampleModalLabel">Confirmación</h5>
        </div>
        <div class="modal-body d-flex">
            El formulario se Actualizó de manera correcta.
        </div>
        <div class="modal-footer">
            <a href="formulario.php" type="button" style="background:#0891b2; color:#fff;" class="btn">De acuerdo</a>
        </div>
        </div>
    </div>
    </div>

    <!-- Modal error -->
    <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" id="modalError" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
        <div class="modal-header text-center">
            <h5 class="modal-title" id="exampleModalLabel">Error</h5>
        </div>
        <div class="modal-body d-flex">
            Algo salió mal al actualizar el formulario, contacter al Desarrollador.
        </div>
        <div class="modal-footer">
            <a href="formulario.php" type="button" style="background:#0891b2; color:#fff;" class="btn">Volver a intentar</a>
        </div>
        </div>
    </div>
    </div>        
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $seleccion = $_POST["entrenamiento"];
    $desde = $_POST["desde"];
    $hasta = $_POST["hasta"];

    //requerimos la conexion
    require '../../funciones/conexion.php';

    //creamos la instancia y le pasamamos los parámetros
    $conexion = new ConexionCrud('localhost', 'user_update', '*hT[SQy8iTeHiwEp', 'evozap_202401');
    $conn = $conexion->getConnection();

    $sql = "UPDATE fecha_entrenamientos
                    SET nombre_entrenamiento = '$seleccion',
                    fecha_inicio = '$desde',
                    fecha_fin = '$hasta',
                    fecha_actualizacion = current_timestamp();
                    ";

    // Ejecutar la consulta SQL
    $result = $conn->query($sql);

    // Verificar si la consulta se ejecutó correctamente
    if ($result) {
        // Enviar respuesta al cliente
        echo '<script>
        var modalSuccess = new bootstrap.Modal(document.getElementById("modalSuccess"));
        modalSuccess.show();
        </script>';
        exit;
    } else {
        // Enviar mensaje de error al cliente
        echo '<script>
        var modalError = new bootstrap.Modal(document.getElementById("modalError"));
        modalError.show();
        </script>';
        exit;
    }

}else{
    echo '<script>
    var modalError = new bootstrap.Modal(document.getElementById("modalError"));
    modalError.show();
    </script>';
    exit;
}
exit;
?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/js/bootstrap.min.js" integrity="sha384-aJ21OjlMXNL5UyIl/XNwTMqvzeRMZH2w8c5cRVpzpU8Y5bApTppSuUkhZXN0VxHd" crossorigin="anonymous"></script>
</body>
</html>
