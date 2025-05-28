<?php
$servidor = "localhost";
$usuari = "root"; // Canvia segons la teva configuració
$contrasenya = ""; // Canvia segons la teva configuració
$base_dades = "biblioteca";

$conexion = new mysqli($servidor, $usuari, $contrasenya, $base_dades);

if ($conexion->connect_error) {
    die("Error de connexió: " . $conexion->connect_error);
}

// Acció seleccionada
$accio = $_GET['accio'] ?? 'llistar';
$missatge = "";

// 🔹 Afegir Llibre
if ($_SERVER["REQUEST_METHOD"] == "POST" && $accio === "afegir") {
    $titol = htmlspecialchars(trim($_POST["titol"]));
    $autor = htmlspecialchars(trim($_POST["autor"]));
    $any = (int)$_POST["any"];

    if (!empty($titol) && !empty($autor) && !empty($any)) {
        $stmt = $conexion->prepare("INSERT INTO llibres (titol, autor, any) VALUES (?, ?, ?)");
        $stmt->bind_param("ssi", $titol, $autor, $any);

        if ($stmt->execute()) {
            $missatge = "<p style='color: green;'>✅ Llibre afegit correctament!</p>";
        } else {
            $missatge = "<p style='color: red;'>❌ Error en afegir el llibre.</p>";
        }

        $stmt->close();
    } else {
        $missatge = "<p style='color: red;'>⚠️ Tots els camps són obligatoris.</p>";
    }
}

// 🔹 Editar Llibre
if ($_SERVER["REQUEST_METHOD"] == "POST" && $accio === "editar") {
    $id = (int)$_POST["id"];
    $titol = htmlspecialchars(trim($_POST["titol"]));
    $autor = htmlspecialchars(trim($_POST["autor"]));
    $any = (int)$_POST["any"];

    if (!empty($titol) && !empty($autor) && !empty($any)) {
        $stmt = $conexion->prepare("UPDATE llibres SET titol = ?, autor = ?, any = ? WHERE id = ?");
        $stmt->bind_param("ssii", $titol, $autor, $any, $id);

        if ($stmt->execute()) {
            $missatge = "<p style='color: green;'>✅ Llibre actualitzat correctament!</p>";
        } else {
            $missatge = "<p style='color: red;'>❌ Error en actualitzar el llibre.</p>";
        }

        $stmt->close();
    } else {
        $missatge = "<p style='color: red;'>⚠️ Tots els camps són obligatoris.</p>";
    }
}

// 🔹 Eliminar Llibre
if ($accio === "eliminar" && isset($_GET["id"])) {
    $id = (int)$_GET["id"];
    $stmt = $conexion->prepare("DELETE FROM llibres WHERE id = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "<script>alert('✅ Llibre eliminat correctament!'); window.location.href='biblioteca.php?accio=llistar';</script>";
    } else {
        echo "<p style='color: red;'>❌ Error en eliminar el llibre.</p>";
    }

    $stmt->close();
}

// 🔹 Llistar Llibres amb cerca
$criteri = isset($_GET['buscar']) ? trim($_GET['buscar']) : "";

$sql = "SELECT * FROM llibres";
if (!empty($criteri)) {
    $sql .= " WHERE titol LIKE ? OR autor LIKE ?";
}

$stmt = $conexion->prepare($sql);
if (!empty($criteri)) {
    $buscar_param = "%" . $criteri . "%";
    $stmt->bind_param("ss", $buscar_param, $buscar_param);
}

$stmt->execute();
$resultat = $stmt->get_result();

$conexion->close();
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblioteca - Gestió de Llibres</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; background-color: #f4f4f4; }
        .container { max-width: 600px; padding: 20px; background-color: white; border-radius: 5px; box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); }
        h2 { color: #333; }
        nav { margin-bottom: 20px; }
        a { text-decoration: none; background-color: #007bff; color: white; padding: 10px 15px; border-radius: 5px; margin: 5px; display: inline-block; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #007bff; color: white; }
        .delete-link { text-decoration: none; background-color: #dc3545; color: white; padding: 5px 10px; border-radius: 3px; }
    </style>
</head>
<body>

<div class="container">
    <h2>Panell de Gestió de la Biblioteca</h2>

    <nav>
        <a href="biblioteca.php?accio=afegir">Afegir Llibre</a>
        <a href="biblioteca.php?accio=llistar">Llistar Llibres</a>
    </nav>

    <?= $missatge ?>

    <form method="GET">
        <input type="text" name="buscar" placeholder="Cerca per títol o autor">
        <button type="submit">Cercar</button>
    </form>

    <table>
        <tr><th>ID</th><th>Títol</th><th>Autor</th><th>Any</th><th>Accions</th></tr>
        <?php while ($fila = $resultat->fetch_assoc()): ?>
            <tr>
                <td><?= $fila['id'] ?></td>
                <td><?= $fila['titol'] ?></td>
                <td><?= $fila['autor'] ?></td>
                <td><?= $fila['any'] ?></td>
                <td>
                    <a href="biblioteca.php?accio=editar&id=<?= $fila['id'] ?>">Editar</a> | 
                    <a class="delete-link" href="biblioteca.php?accio=eliminar&id=<?= $fila['id'] ?>" onclick="return confirm('Segur que vols eliminar aquest llibre?');">Eliminar</a>
                </td>
            </tr>
        <?php endwhile; ?>
    </table>
</div>

</body>
</html>

