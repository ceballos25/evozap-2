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
    $idAdministrativo = isset($_POST['idAdministrativo']) ? sanitizeInput($_POST['idAdministrativo']) : "";
    $nombreAdministrativo = isset($_POST['nombreAdministrativo']) ? sanitizeInput($_POST['nombreAdministrativo']) : "";
    $cedulaAdministrativo = isset($_POST['cedulaAdministrativo']) ? sanitizeInput($_POST['cedulaAdministrativo']) : "";
    $celularAdministrativo = isset($_POST['celularAdministrativo']) ? sanitizeInput($_POST['celularAdministrativo']) : "";
    $correoAdministrativo = isset($_POST['correoAdministrativo']) ? sanitizeInput($_POST['correoAdministrativo']) : "";
    $direccionAdministrativo = isset($_POST['direccionAdministrativo']) ? sanitizeInput($_POST['direccionAdministrativo']) : "";
    $cargoAdministrativo = isset($_POST['cargoAdministrativo']) ? sanitizeInput($_POST['cargoAdministrativo']) : "";
    $rolAdministrativo = isset($_POST['rolAdministrativo']) ? sanitizeInput($_POST['rolAdministrativo']) : "";

    // Validar datos (ejemplo simple)
    if (
        empty($idAdministrativo) ||
        empty($nombreAdministrativo) ||
        empty($cedulaAdministrativo) ||
        empty($celularAdministrativo) ||
        empty($correoAdministrativo) ||
        empty($direccionAdministrativo) ||
        empty($cargoAdministrativo) ||
        empty($rolAdministrativo)
    ) {
        // Alguna variable está vacía, redirigir o mostrar mensaje
        echo json_encode(['status' => 'error', 'message' => 'Al menos uno de los campos se encuentran vacios, verifique nuevamente.']);
    } else {
        // Validar correo electrónico
        if (!filter_var($correoAdministrativo, FILTER_VALIDATE_EMAIL)) {
            // Enviar mensaje de error al cliente
            echo json_encode(['status' => 'error', 'message' => 'Correo electrónico no válido.']);
        } else {
            // Ejecutar la consulta
            require '../../funciones/conexion.php';
            // Crea una instancia de la clase de conexión
            $conexion = new ConexionCrud('localhost', 'user_update', '*hT[SQy8iTeHiwEp', 'evozap_202401');
            $conn = $conexion->getConnection();

            // Construir la consulta SQL
            $sql = "UPDATE administrativos
                    SET nombre='$nombreAdministrativo',
                    cedula='$cedulaAdministrativo',
                    celular='$celularAdministrativo',
                    correo='$correoAdministrativo',
                    direccion='$direccionAdministrativo',
                    cargo='$cargoAdministrativo',
                    rol='$rolAdministrativo'
                    WHERE id= '$idAdministrativo'";
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
