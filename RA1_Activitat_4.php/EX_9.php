<!DOCTYPE html>
<html>
<head>
    <title>Formulari de Comentari</title>
</head>
<body>
    <form method="POST">
        <label>Comentari:</label>
        <textarea name="comentari"></textarea>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if (!empty($_POST["comentari"])) {
        echo "<p>El teu comentari:</p>";
        echo "<p>" . htmlspecialchars($_POST["comentari"]) . "</p>";
    }
    ?>
</body>
</html>

