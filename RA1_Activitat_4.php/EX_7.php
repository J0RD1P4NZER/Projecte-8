<!DOCTYPE html>
<html>
<head>
    <title>Selecció de Gènere</title>
</head>
<body>
    <form method="POST">
        <label>Gènere:</label><br>
        <input type="radio" name="genere" value="Home"> Home<br>
        <input type="radio" name="genere" value="Dona"> Dona<br>
        <input type="radio" name="genere" value="Altres"> Altres<br>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if (!empty($_POST["genere"])) {
        echo "<p>Has seleccionat: " . htmlspecialchars($_POST["genere"]) . "</p>";
    }
    ?>
</body>
</html>

