<?php
$conexion = new mysqli("localhost", "root", "", "sistema_web");

if($conexion->connect_error){
    die("Error de conexión: " . $conexion->connect_error);
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Capturamos los datos del formulario
    $nombre       = $_POST['nombre'] ?? '';
    $correo       = $_POST['correo'] ?? '';
    $telefono     = $_POST['telefono'] ?? ''; // Nuevo
    $especialidad = $_POST['especialidad'] ?? '';
    $mensaje      = $_POST['mensaje'] ?? '';

    // Insertamos en la tabla tb_equipo incluyendo el teléfono
    $sql = "INSERT INTO tb_SOBREMI (nombre_completo, correo, telefono, especialidad, mensaje) 
            VALUES ('$nombre', '$correo', '$telefono', '$especialidad', '$mensaje')";

      if ($conexion->query($sql) === TRUE){
        echo "¡Postulación recibida con éxito! Gracias por querer unirte.";
    } else {
        echo "Error: " . $conexion->error;
    }

} else {
    echo "ACCESO NO PERMITIDO";
}

$conexion->close();
?>