<?php
$servidor = "localhost";
$usuari = "root"; // Canvia si cal
$contrasenya = ""; // Canvia si cal
$base_dades = "biblioteca";

// Connexió a la base de dades
$conexion = new mysqli($servidor, $usuari, $contrasenya, $base_dades);

if ($conexion->connect_error) {
    die("Error de connexió: " . $conexion->connect_error);
}

// Si s'ha enviat el formulari
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titol = $_POST["titol"];
    $autor = $_POST["autor"];
    $any = $_POST["any"];

    // Inserir el llibre a la base de dades
    $sql = "INSERT INTO llibres (titol, autor, any) VALUES ('$titol', '$autor', $any)";
    if ($conexion->query($sql) === TRUE) {
        echo "<p style='color: green;'>Llibre afegit correctament!</p>";
    } else {
        echo "<p style='color: red;'>Error en afegir el llibre: " . $conexion->error . "</p>";
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Afegir Llibre</title>
</head>
<body>
    <h2>Afegir un Llibre</h2>
    <form method="POST">
        <label>Títol:</label>
        <input type="text" name="titol"><br>
        <label>Autor:</label>
        <input type="text" name="autor"><br>
        <label>Any:</label>
        <input type="number" name="any"><br>
        <button type="submit">Afegir</button>
    </form>
</body>
</html>

