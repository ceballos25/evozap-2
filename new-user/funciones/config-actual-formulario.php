<?php

// Requerimos la conexión
require 'conexion.php';
$conexion = new Conexion('localhost', 'user_registro', 'Y,D:{`r0y3p\>-*pX8r#', 'evozap_202401');
$conn = $conexion->getConnection();

$sql = "SELECT nombre_entrenamiento, fecha_inicio, fecha_fin FROM fecha_entrenamientos";

$resultado = $conn->query($sql);

// Verificamos si se obtuvieron filas
if ($resultado->num_rows > 0) {
    // Obtenemos la primera fila
    $fila = $resultado->fetch_assoc();
    
    // Asignamos los valores a las variables
    $nombre_entrenamiento = $fila['nombre_entrenamiento'];
    $del = $fila['fecha_inicio'];
    $al = $fila['fecha_fin'];

} else {
    // No se encontraron filas en el resultado
    $nombre_entrenamiento = "";
    $del = "";
    $al = "";
}

// Liberamos el resultado
$resultado->free();

// Cerramos la conexión
$conn->close();
?>
