<?php
// Muestra todos los errores en el script
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar si se han enviado datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Verificar si se proporcionó el ID del participante
    $idParticipanteMatricular = isset($_POST['valorIdParticipante']) ? $_POST['valorIdParticipante'] : "";

    if (empty($idParticipanteMatricular)) {
        // No se recibió el ID a Matricular, mostrar mensaje de error
        echo json_encode(['status' => 'error', 'message' => 'No se recibió el ID a Matricular, contacte al desarrollador']);
    } else {
        // Ejecutar el procedimiento almacenado
        require '../../funciones/conexion.php';
        $conexion = new ConexionCrud('localhost', 'user_insert', 'fFyuMXaU7_SgnwB@', 'evozap_202401');
        $conn = $conexion->getConnection();

        // Llamada al procedimiento almacenado
        $stmt = $conn->prepare("CALL MatricularParticipante(?)");
        $stmt->bind_param("i", $idParticipanteMatricular);
        $stmt->execute();

        // Obtener el resultado del procedimiento almacenado
        $stmt->bind_result($status, $message);
        $stmt->fetch();

        // Verificar si hay un resultado válido
        if (!empty($status) && !empty($message)) {
            echo json_encode(['status' => $status, 'message' => $message]);
        } else {
            // Enviar una respuesta JSON vacía si no hay resultados válidos
            echo json_encode(['status' => 'error', 'message' => 'Error inesperado al ejecutar el procedimiento almacenado.']);
        }

        // Cerrar la conexión
        $stmt->close();
        $conn->close();
    }
} else {
    // No se recibieron datos por POST, mostrar mensaje de error
    echo json_encode(['status' => 'error', 'message' => 'No se recibieron datos por POST.']);
}
?>
