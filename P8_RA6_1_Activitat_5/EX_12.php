<?php
$servidor = "localhost";
$usuari = "root"; // Canvia segons la teva configuració
$contrasenya = ""; // Canvia segons la teva configuració
$base_dades = "biblioteca";

$conexion = new mysqli($servidor, $usuari, $contrasenya, $base_dades);

if ($conexion->connect_error) {
    die("Error de connexió: " . $conexion->connect_error);
}

if (isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $stmt = $conexion->prepare("DELETE FROM llibres WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Llibre eliminat correctament!'); window.location.href='llistat.php';</script>";
    } else {
        echo "<script>alert('❌ Error en eliminar el llibre!'); window.location.href='llistat.php';</script>";
    }

    $stmt->close();
}

$conexion->close();
?>

