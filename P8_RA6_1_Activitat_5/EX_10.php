<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $conexion = new mysqli("localhost", "usuari", "contrasenya", "biblioteca");

    if ($conexion->connect_error) {
        die("Error de connexió: " . $conexion->connect_error);
    }

    $stmt = $conexion->prepare("UPDATE llibres SET titol = ?, autor = ?, any = ? WHERE id = ?");
    $stmt->bind_param("ssii", $titol, $autor, $any, $id);

    $titol = htmlspecialchars($_POST["titol"]);
    $autor = htmlspecialchars($_POST["autor"]);
    $any = (int)$_POST["any"];
    $id = (int)$_POST["id"];

    if (!empty($titol) && !empty($autor) && !empty($any)) {
        if ($stmt->execute()) {
            echo "<p>Llibre actualitzat correctament!</p>";
        } else {
            echo "<p>Error en actualitzar el llibre.</p>";
        }
    } else {
        echo "<p style='color: red;'>Tots els camps són obligatoris.</p>";
    }

    $stmt->close();
    $conexion->close();
}
?>

