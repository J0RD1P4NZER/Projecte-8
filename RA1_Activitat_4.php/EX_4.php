<!DOCTYPE html>
<html>
<head>
    <title>Validació de Correu</title>
</head>
<body>
    <form method="POST">
        <label>Correu electrònic:</label>
        <input type="email" name="correu">
        <button type="submit">Enviar</button>
    </form>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (filter_var($_POST["correu"], FILTER_VALIDATE_EMAIL)) {
            echo "<p>El correu és vàlid.</p>";
        } else {
            echo "<p style='color: red;'>Format de correu incorrecte.</p>";
        }
    }
    ?>
</body>
</html>

