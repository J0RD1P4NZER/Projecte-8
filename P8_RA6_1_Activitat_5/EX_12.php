<?php
$conexion = new mysqli("localhost", "usuari", "contrasenya", "biblioteca");

if ($conexion->connect_error) {
    die("Error de connexió: " . $conexion->connect_error);
}

$id = $_GET["id"];
$stmt = $conexion->prepare("DELETE FROM llibres WHERE id = ?");
$stmt->bind_param("i", $id);

if ($stmt->execute()) {
    echo "<script>alert('Llibre eliminat correctament!'); window.location.href='llistat.php';</script>";
} else {
    echo "<p style='color: red;'>Error en eliminar el llibre.</p>";
}

$stmt->close();
$conexion->close();
?>

