<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
// Recibir variables POST y 
$nombre_entrenamiento = isset($_POST["nombre_entrenamiento"]) ? $_POST["nombre_entrenamiento"] : "";
$del = isset($_POST["del"]) ? $_POST["del"] : "";
$al = isset($_POST["al"]) ? $_POST["al"] : "";


// Validar datos (ejemplo simple)
if (empty($nombre_entrenamiento) || empty($del) || empty($al)) {
    // Alguna variable está vacía, redirigir o mostrar mensaje
    echo '<p>Lo siento, debes completar todos los campos.</p>';
} else {
    // Todas las variables están presentes, almacenar en sesiones insertamos a la base de datos

    echo '<script>
    alert("Se recibieron los datos de manera correcta, no olvidar ejecuat la SQL")
    window.location.href = ".../config-formulario.php";
    </script>';
}
?>
