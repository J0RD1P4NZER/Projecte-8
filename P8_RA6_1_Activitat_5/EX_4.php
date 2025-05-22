4
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

$missatge_error = "";

// Si s'ha enviat el formulari
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titol = trim($_POST["titol"]);
    $autor = trim($_POST["autor"]);
    $any = trim($_POST["any"]);

    // Comprovació de camps buits
    if (empty($titol) || empty($autor) || empty($any)) {
        $missatge_error = "Tots els camps són obligatoris.";
    } else {
        // Inserir el llibre de manera segura amb prepared statements
        $stmt = $conexion->prepare("INSERT INTO llibres (titol, autor, any) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $titol, $autor, $any);

        if ($stmt->execute()) {
            echo "<p style='color: green;'>Llibre afegit correctament!</p>";
        } else {
            echo "<p style='color: red;'>Error en afegir el llibre.</p>";
        }

        $stmt->close();
    }
}

$conexion->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Afegir Llibre amb Validació</title>
</head>
<body>
    <h2>Afegir un Llibre</h2>
    <?php if (!empty($missatge_error)) echo "<p style='color: red;'>$missatge_error</p>"; ?>
    <form method="POST">
        <label>Títol:</label>
        <input type="text" name="titol" value="<?php echo isset($_POST['titol']) ? htmlspecialchars($_POST['titol']) : ''; ?>"><br>
        <label>Autor:</label>
        <input type="text" name="autor" value="<?php echo isset($_POST['autor']) ? htmlspecialchars($_POST['autor']) : ''; ?>"><br>
        <label>Any:</label>
        <input type="number" name="any" value="<?php echo isset($_POST['any']) ? htmlspecialchars($_POST['any']) : ''; ?>"><br>
        <button type="submit">Afegir</button>
    </form>
</body>
</html>

