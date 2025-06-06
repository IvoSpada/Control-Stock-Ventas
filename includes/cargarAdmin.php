<?php

require 'database.php'; // Asegúrate de que $db esté conectado correctamente

if ($db) {
    echo "Conexión OK<br>";
} else {
    echo "Fallo de conexión<br>";
}


$nombre = "Administrador";
$rol = "admin";
$contra = "prueba123";

// Verifica conexión
if (!$db) {
    die("❌ Error de conexión: " . mysqli_connect_error());
}
echo "Conexión OK<br>";

// Hashear la contraseña
$hash = password_hash($contra, PASSWORD_BCRYPT);

// Escapar para evitar errores de comillas
$nombre = mysqli_real_escape_string($db, $nombre);
$rol = mysqli_real_escape_string($db, $rol);
$hash = mysqli_real_escape_string($db, $hash);

// ✅ Consulta correcta con nombre exacto de la tabla
$sql = "INSERT INTO usuarios (nombre, rol, contrasena) VALUES ('$nombre', '$rol', '$hash')";

// Ejecutar
echo "Consulta SQL: $sql<br>";

if (mysqli_query($db, $sql)) {
    echo "✅ Usuario insertado correctamente.";
} else {
    echo "❌ Error al insertar el usuario: " . mysqli_error($db);
}

mysqli_close($db);