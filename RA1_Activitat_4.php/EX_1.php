<!DOCTYPE html>
<html>
<head>
    <title>Formulari de Nom</title>
</head>
<body>
    <form method="POST">
        <label>Nom:</label>
        <input type="text" name="nom">
        <button type="submit">Enviar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && !empty($_POST["nom"])) {
        echo "<p>Benvingut, " . htmlspecialchars($_POST["nom"]) . "!</p>";
    }
    ?>
</body>
</html>

