<!DOCTYPE html>
<html>
<head>
    <title>Selecció de Ciutat</title>
</head>
<body>
    <form method="POST">
        <label>Ciutat d'origen:</label>
        <select name="ciutat">
            <option value="Barcelona">Barcelona</option>
            <option value="Girona">Girona</option>
            <option value="Tarragona">Tarragona</option>
            <option value="Lleida">Lleida</option>
        </select>
        <button type="submit">Enviar</button>
    </form>
    <?php
    if (!empty($_POST["ciutat"])) {
        echo "<p>Has seleccionat: " . htmlspecialchars($_POST["ciutat"]) . "</p>";
    }
    ?>
</body>
</html>

