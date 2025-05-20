<!DOCTYPE html>
<html>
<head>
    <title>Formulari amb reompliment</title>
</head>
<body>
    <form method="POST">
        <label>Nom:</label>
        <input type="text" name="nom" value="<?php echo isset($_POST['nom']) ? htmlspecialchars($_POST['nom']) : ''; ?>">
        <label>Edat:</label>
        <input type="number" name="edat" value="<?php echo isset($_POST['edat']) ? htmlspecialchars($_POST['edat']) : ''; ?>">
        <button type="submit">Enviar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nom"]) || empty($_POST["edat"])) {
            echo "<p style='color: red;'>Tots els camps són obligatoris.</p>";
        } else {
            echo "<p>Nom: " . htmlspecialchars($_POST["nom"]) . "</p>";
            echo "<p>Edat: " . htmlspecialchars($_POST["edat"]) . "</p>";
        }
    }
    ?>
</body>
</html>

