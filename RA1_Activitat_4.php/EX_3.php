<!DOCTYPE html>
<html>
<head>
    <title>Formulari amb Validació</title>
</head>
<body>
    <form method="POST">
        <label>Nom:</label>
        <input type="text" name="nom">
        <label>Correu electrònic:</label>
        <input type="email" name="correu">
        <label>Missatge:</label>
        <textarea name="missatge"></textarea>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nom"]) || empty($_POST["correu"]) || empty($_POST["missatge"])) {
            echo "<p style='color: red;'>Tots els camps són obligatoris.</p>";
        } else {
            echo "<p>Nom: " . htmlspecialchars($_POST["nom"]) . "</p>";
            echo "<p>Correu: " . htmlspecialchars($_POST["correu"]) . "</p>";
            echo "<p>Missatge: " . htmlspecialchars($_POST["missatge"]) . "</p>";
        }
    }
    ?>
</body>
</html>

