<!DOCTYPE html>
<html>
<head>
    <title>Formulari GET</title>
</head>
<body>
    <form method="GET">
        <label>Nom:</label>
        <input type="text" name="nom">
        <label>Edat:</label>
        <input type="number" name="edat">
        <button type="submit">Enviar</button>
    </form>
    <?php
    if (!empty($_GET["nom"]) && !empty($_GET["edat"])) {
        echo "<p>Nom: " . htmlspecialchars($_GET["nom"]) . "</p>";
        echo "<p>Edat: " . htmlspecialchars($_GET["edat"]) . "</p>";
    }
    ?>
</body>
</html>

