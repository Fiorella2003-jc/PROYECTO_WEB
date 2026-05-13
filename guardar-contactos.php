<?php
// 1. Conexión limpia
$conexion = new mysqli("localhost", "root", "", "sistema_web");

if($conexion->connect_error){
    die("Error de conexion: " . $conexion->connect_error);
}

// 2. Captura de datos (Verificando que existan)
if($_SERVER["REQUEST_METHOD"] == "POST"){

    // Estos nombres deben coincidir con el atributo 'name' de tu HTML
    $nombre  = $_POST['nombre'] ?? '';
    $correo  = $_POST['correo_electronico'] ?? '';
    $asunto  = $_POST['asunto'] ?? '';
    $mensaje = $_POST['mensaje'] ?? '';

    // 3. Consulta SQL (Nombres exactos de tu tabla)
    $sql = "INSERT INTO tb_contactos (nombre_completo, correo_electronico, asunto, mensaje) 
            VALUES ('$nombre', '$correo', '$asunto', '$mensaje')";

    if ($conexion->query($sql) === TRUE){
        echo "Datos guardados correctamente";
    } else {
        echo "Error: " . $conexion->error;
    }

} else {
    echo "ACCESO NO PERMITIDO";
}

$conexion->close();
?>