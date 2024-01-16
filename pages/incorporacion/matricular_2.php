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
    $valorIdParticipanteMatricular = isset($_POST['valorIdParticipanteMatricular']) ? sanitizeInput($_POST['valorIdParticipanteMatricular']) : "";

    // Validar datos (ejemplo simple)
    if (
        empty($valorIdParticipanteMatricular)

    ) {
        // Alguna variable está vacía, redirigir o mostrar mensaje
        echo json_encode(['status' => 'error', 'message' => 'No se recibió el ID a Matricular, contacte al desarrollador']);
    } else {

            // Ejecutar la consulta
            require '../../funciones/conexion.php';
            // Crea una instancia de la clase de conexión
            $conexion = new ConexionCrud('localhost', 'user_insert', 'fFyuMXaU7_SgnwB@', 'evozap_202401');
            $conn = $conexion->getConnection();

            // Construir la consulta SQL
            $sql = "INSERT INTO matriculado (id_registro_participante, fecha_matricula) VALUES ('$valorIdParticipanteMatricular', current_timestamp())";

                    // Después de la ejecución de la consulta SQL

            // Ejecutar la consulta SQL
            $result = $conn->query($sql);

            // Verificar si la consulta se ejecutó correctamente
            if ($result) {
                // Enviar respuesta al cliente
                echo json_encode(['status' => 'success', 'message' => 'Participante Matriculado correctamente.']);
            } else {
                // Enviar mensaje de error al cliente
                echo json_encode(['status' => 'error', 'message' => 'Error al matricular al participante Contacte al desarrollador.']);
            }
        
    }
} else {
    // Si no se recibieron datos por POST, manejar el caso adecuadamente
    echo json_encode(['status' => 'error', 'message' => 'No se recibieron datos por POST.']);
}
?>
