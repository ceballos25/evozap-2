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
    $nombreAdministrativoAdd = isset($_POST['nombreAdministrativoAdd']) ? sanitizeInput($_POST['nombreAdministrativoAdd']) : "";
    $cedulaAdministrativoAdd = isset($_POST['cedulaAdministrativoAdd']) ? sanitizeInput($_POST['cedulaAdministrativoAdd']) : "";
    $celularAdministrativoAdd = isset($_POST['celularAdministrativoAdd']) ? sanitizeInput($_POST['celularAdministrativoAdd']) : "";
    $correoAdministrativoAdd = isset($_POST['correoAdministrativoAdd']) ? sanitizeInput($_POST['correoAdministrativoAdd']) : "";
    $direccionAdministrativoAdd = isset($_POST['direccionAdministrativoAdd']) ? sanitizeInput($_POST['direccionAdministrativoAdd']) : "";
    $cargoAdministrativoAdd = isset($_POST['cargoAdministrativoAdd']) ? sanitizeInput($_POST['cargoAdministrativoAdd']) : "";
    $rolAdministrativoAdd = isset($_POST['rolAdministrativoAdd']) ? sanitizeInput($_POST['rolAdministrativoAdd']) : "";

    // Validar datos (ejemplo simple)
    if (
        empty($nombreAdministrativoAdd) || 
        empty($cedulaAdministrativoAdd) ||
        empty($celularAdministrativoAdd) ||
        empty($correoAdministrativoAdd) ||
        empty($direccionAdministrativoAdd) ||
        empty($cargoAdministrativoAdd) ||
        empty($rolAdministrativoAdd)
    ) {
        // Alguna variable está vacía, redirigir o mostrar mensaje
        echo json_encode(['status' => 'error', 'message' => 'Al menos uno de los campos se encuentran vacios, verifique nuevamente.']);
    } else {
        // Validar correo electrónico
        if (!filter_var($correoAdministrativoAdd, FILTER_VALIDATE_EMAIL)) {
            // Enviar mensaje de error al cliente
            echo json_encode(['status' => 'error', 'message' => 'Correo electrónico no válido.']);
        } else {

            // Función para generar una contraseña aleatoria
            function generarContrasena($longitud) {
                $caracteres = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";
                $contrasena = "";
                
                for ($i = 0; $i < $longitud; $i++) {
                    $index = rand(0, strlen($caracteres) - 1);
                    $contrasena .= $caracteres[$index];
                }

                return $contrasena;
            }

            //generamos la contrasena automatica:
            $contrasena_plana = generarContrasena(8);

            // Convertir la contraseña a MD5
            $contrasena_md5 = md5($contrasena_plana);

            // Ejecutar la consulta
            require '../../funciones/conexion.php';
            // Crea una instancia de la clase de conexión
            $conexion = new ConexionCrud('localhost', 'user_registro', 'Y,D:{`r0y3p\>-*pX8r#', 'evozap_202401');
            $conn = $conexion->getConnection();
            // Construir la consulta SQL
            $sql = "INSERT INTO administrativos (id, nombre, cedula, celular, correo, direccion, cargo, rol, contrasena) VALUES (NULL,'$nombreAdministrativoAdd','$cedulaAdministrativoAdd','$celularAdministrativoAdd','$correoAdministrativoAdd','$direccionAdministrativoAdd','$cargoAdministrativoAdd','$rolAdministrativoAdd', '$contrasena_md5')";
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
