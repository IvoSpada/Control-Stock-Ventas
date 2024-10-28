<?php

require 'database.php';

function hashearAdmin($contra): string {
    $hash = password_hash($contra, PASSWORD_BCRYPT);
    return $hash;
}
$dni = "46234790";
$nombre = "Administrador"; 
$admin = 1; 
$contra = "prueba123";

$hash = hashearAdmin($contra);

$query = "INSERT INTO usuarios (dni, nombre, admin, contraseña) VALUES (?, ?, ?, ?)";

$stmt = mysqli_prepare($db, $query);

if ($stmt) {
    mysqli_stmt_bind_param($stmt, "isis", $dni , $nombre, $admin, $hash);
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