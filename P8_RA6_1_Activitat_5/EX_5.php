<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = new mysqli("localhost", "usuari", "contrasenya", "biblioteca");

    if ($conexion->connect_error) {
        die("Error de connexió: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("INSERT INTO llibres (titol, autor, any) VALUES (?, ?, ?)");
    $stmt->bind_param("ssi", $titol, $autor, $any);

    $titol = htmlspecialchars($_POST["titol"]);
    $autor = htmlspecialchars($_POST["autor"]);
    $any = (int)$_POST["any"];

    if (!empty($titol) && !empty($autor) && !empty($any)) {
        if ($stmt->execute()) {
            echo "<p>Llibre afegit correctament amb seguretat!</p>";
        } else {
            echo "<p>Error en afegir el llibre.</p>";
        }
    } else {
        echo "<p style='color: red;'>Tots els camps són obligatoris.</p>";
    }

    $stmt->close();
    $conexion->close();
}
?>

