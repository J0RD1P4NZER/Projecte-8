<!DOCTYPE html>
<html>
<head>
    <title>Checkbox Aficions</title>
</head>
<body>
    <form method="POST">
        <label>Aficions:</label><br>
        <input type="checkbox" name="aficions[]" value="Lectura"> Lectura<br>
        <input type="checkbox" name="aficions[]" value="Esports"> Esports<br>
        <input type="checkbox" name="aficions[]" value="Música"> Música<br>
        <input type="checkbox" name="aficions[]" value="Viatges"> Viatges<br>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if (!empty($_POST["aficions"])) {
        echo "<p>Has seleccionat:</p><ul>";
        foreach ($_POST["aficions"] as $aficio) {
            echo "<li>" . htmlspecialchars($aficio) . "</li>";
        }
        echo "</ul>";
    }
    ?>
</body>
</html>

