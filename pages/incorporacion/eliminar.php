<?php
// Muestra todos los errores en el script
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Verificar si se han enviado datos por POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Verificar si se proporcionó el ID del participante
    $idParticipanteeliminar = isset($_POST['idParticipanteeliminar']) ? $_POST['idParticipanteeliminar'] : "";

    if (empty($idParticipanteeliminar)) {
        // No se recibió el ID a eliminar, mostrar mensaje de error
        echo json_encode(['status' => 'error', 'message' => 'No se recibió el ID a eliminar, contacte al desarrollador']);
    } else {
        // Ejecutar el procedimiento almacenado
        require '../../funciones/conexion.php';
        $conexion = new ConexionCrud('localhost', 'user_insert', 'fFyuMXaU7_SgnwB@', 'evozap_202401');
        $conn = $conexion->getConnection();

        $sql = "DELETE FROM participante WHERE id='$idParticipanteeliminar'";

        // Ejecutar la consulta SQL
        $resultado = $conn->query($sql);

        if ($resultado) {
            // Operación exitosa
            echo json_encode(['status' => 'success', 'message' => 'Participante eliminado correctamente.']);
        } else {
            // Error al eliminar
            echo json_encode(['status' => 'error', 'message' => 'Contacte al desarrollador']);
        }

        // Cerrar la conexión
        $conn->close();
    }
} else {
    // No se recibieron datos por POST, mostrar mensaje de error
    echo json_encode(['status' => 'error', 'message' => 'No se recibieron datos por POST.']);
}
?>
