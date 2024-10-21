<?php
require 'database.php';

function hashearAdmin($contra): string {
    $hash = password_hash($contra, PASSWORD_BCRYPT);
    return $hash;
}
$nombre = "admin11"; 
$rol = 1; 
$contra = "prueba1234";
$hash = hashearAdmin($contra);

$query = "INSERT INTO usuarios (nombre, rol, contraseña) VALUES (?, ?, ?)";

$stmt = mysqli_prepare($db, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "sis", $nombre, $rol, $hash);
    if (mysqli_stmt_execute($stmt)) {
        echo "Usuario insertado correctamente";
    } else {
        echo "Error al insertar el usuario: " . mysqli_error($db);
    }
    mysqli_stmt_close($stmt);
} else {
    echo "Error al preparar la consulta: " . mysqli_error($db);
}
mysqli_close($db);
