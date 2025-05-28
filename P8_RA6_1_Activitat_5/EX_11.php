<?php
$servidor = "localhost";
$usuari = "root"; // Canvia segons la teva configuració
$contrasenya = ""; // Canvia segons la teva configuració
$base_dades = "biblioteca";

$conexion = new mysqli($servidor, $usuari, $contrasenya, $base_dades);

if ($conexion->connect_error) {
    die("Error de connexió: " . $conexion->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = (int)$_POST["id"];
    $titol = htmlspecialchars(trim($_POST["titol"]));
    $autor = htmlspecialchars(trim($_POST["autor"]));
    $any = (int)$_POST["any"];

    if (!empty($titol) && !empty($autor) && !empty($any)) {
        $stmt = $conexion->prepare("UPDATE llibres SET titol = ?, autor = ?, any = ? WHERE id = ?");
        $stmt->bind_param("ssii", $titol, $autor, $any, $id);

        if ($stmt->execute()) {
            echo "<script>alert('Llibre actualitzat correctament!'); window.location.href='llistat.php';</script>";
        } else {
            echo "<script>alert('Error en actualitzar el llibre!'); window.location.href='editar_llibre.php?id=$id';</script>";
        }

        $stmt->close();
    } else {
        echo "<script>alert('Tots els camps són obligatoris!'); window.location.href='editar_llibre.php?id=$id';</script>";
    }
}

$conexion->close();
?>

