<!DOCTYPE html>
<html>
<head>
    <title>Formulari de Contacte</title>
    <style>
        .error { color: red; }
    </style>
</head>
<body>
    <form method="POST">
        <label>Nom:</label>
        <input type="text" name="nom">
        <label>Correu electrònic:</label>
        <input type="email" name="correu">
        <label>Assumpte:</label>
        <input type="text" name="assumpte">
        <label>Missatge:</label>
        <textarea name="missatge"></textarea>
        <button type="submit">Enviar</button>
    </form>
    <?php
    $errors = [];

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (empty($_POST["nom"])) $errors[] = "El nom és obligatori.";
        if (empty($_POST["correu"]) || !filter_var($_POST["correu"], FILTER_VALIDATE_EMAIL)) $errors[] = "El correu no és vàlid.";
        if (empty($_POST["assumpte"])) $errors[] = "L'assumpte és obligatori.";
        if (empty($_POST["missatge"])) $errors[] = "El missatge és obligatori.";

        if (!empty($errors)) {
            echo "<p class='error'>" . implode("<br>", $errors) . "</p>";
        } else {
            echo "<p>Missatge enviat correctament!</p>";
            echo "<p>Nom: " . htmlspecialchars($_POST["nom"]) . "</p>";
            echo "<p>Correu: " . htmlspecialchars($_POST["correu"]) . "</p>";
            echo "<p>Assumpte: " . htmlspecialchars($_POST["assumpte"]) . "</p>";
            echo "<p>Missatge: " . htmlspecialchars($_POST["missatge"]) . "</p>";
        }
    }
    ?>
</body>
</html>
