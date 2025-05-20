<!DOCTYPE html>
<html>
<head>
    <title>Usuaris</title>
</head>
<body>
    <table border="1">
        <tr>
            <th>Nom</th>
            <th>Correu</th>
            <th>Edat</th>
            <th>Major d’edat</th>
        </tr>
        <?php
        $usuaris = [
            ["nom" => "Jordi", "correu" => "jordi@example.com", "edat" => 20],
            ["nom" => "Clara", "correu" => "clara@example.com", "edat" => 17],
            ["nom" => "Pere", "correu" => "pere@example.com", "edat" => 25]
        ];

        foreach ($usuaris as $usuari) {
            echo "<tr>";
            echo "<td>{$usuari['nom']}</td>";
            echo "<td>{$usuari['correu']}</td>";
            echo "<td>{$usuari['edat']}</td>";
            echo "<td>" . ($usuari['edat'] >= 18 ? "Sí" : "No") . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>

