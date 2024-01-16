<?php
// Muestra todos los errores en el script
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Función para sanear los datos (puedes ajustarla según tus necesidades)
function sanitizeInput($input) {
    return trim(strip_tags($input));
}

// Verificar si se han enviado datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Verificar y sanear cada variable
    $idParticipante = isset($_POST['idParticipante']) ? sanitizeInput($_POST['idParticipante']) : "";
    $nombreParticipante = isset($_POST['nombreParticipante']) ? sanitizeInput($_POST['nombreParticipante']) : "";
    $cedulaParticipante = isset($_POST['cedulaParticipante']) ? sanitizeInput($_POST['cedulaParticipante']) : "";
    $tipoDocumentoParticipante = isset($_POST['tipoDocumentoParticipante']) ? sanitizeInput($_POST['tipoDocumentoParticipante']) : "";
    $celularParticipante = isset($_POST['celularParticipante']) ? sanitizeInput($_POST['celularParticipante']) : "";
    $correoParticipante = isset($_POST['correoParticipante']) ? sanitizeInput($_POST['correoParticipante']) : "";
    $objetivosParticipante = isset($_POST['objetivosParticipante']) ? sanitizeInput($_POST['objetivosParticipante']) : "";
    $tratamientoParticipante = isset($_POST['tratamientoParticipante']) ? sanitizeInput($_POST['tratamientoParticipante']) : "";
    $detalleTratamientoParticipante = isset($_POST['detalleTratamientoParticipante']) ? sanitizeInput($_POST['detalleTratamientoParticipante']) : "";

    // Validar datos (ejemplo simple)
    if (
        empty($idParticipante) ||
        empty($nombreParticipante) ||
        empty($cedulaParticipante) ||
        empty($tipoDocumentoParticipante) ||
        empty($celularParticipante) ||
        empty($correoParticipante) ||
        empty($objetivosParticipante) ||
        empty($tratamientoParticipante) ||
        empty($detalleTratamientoParticipante)
    ) {
        // Alguna variable está vacía, redirigir o mostrar mensaje
        echo json_encode(['status' => 'error', 'message' => 'Completa todos los campos.']);
    } else {
        // Validar correo electrónico
        if (!filter_var($correoParticipante, FILTER_VALIDATE_EMAIL)) {
            // Enviar mensaje de error al cliente
            echo json_encode(['status' => 'error', 'message' => 'Correo electrónico no válido.']);
        } else {
            // Ejecutar la consulta
            require '../../funciones/conexion.php';
            // Crea una instancia de la clase de conexión
            $conexion = new ConexionCrud('localhost', 'user_update', '*hT[SQy8iTeHiwEp', 'evozap_202401');
            $conn = $conexion->getConnection();

            // Construir la consulta SQL
            $sql = "UPDATE participante
                    SET nombre='$nombreParticipante',
                    cedula='$cedulaParticipante',
                    tipo_documento='$tipoDocumentoParticipante',
                    celular='$celularParticipante',
                    correo='$correoParticipante',
                    objetivos='$objetivosParticipante',
                    tratamiento_psicologico='$tratamientoParticipante',
                    detalle_tratamiento_psicologico='$detalleTratamientoParticipante'
                    WHERE id= '$idParticipante'";
                    // Después de la ejecución de la consulta SQL

            // Ejecutar la consulta SQL
            $result = $conn->query($sql);

            // Verificar si la consulta se ejecutó correctamente
            if ($result) {
                // Enviar respuesta al cliente
                echo json_encode(['status' => 'success', 'message' => 'Datos actualizados correctamente.']);
            } else {
                // Enviar mensaje de error al cliente
                echo json_encode(['status' => 'error', 'message' => 'Error al actualizar los datos.']);
            }
        }
    }
} else {
    // Si no se recibieron datos por POST, manejar el caso adecuadamente
    echo json_encode(['status' => 'error', 'message' => 'No se recibieron datos por POST.']);
}
?>
