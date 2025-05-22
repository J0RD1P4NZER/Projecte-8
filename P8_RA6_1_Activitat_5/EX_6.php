<?php
$servidor = "localhost";
$usuari = "root"; // Canvia segons la teva configuració
$contrasenya = ""; // Canvia segons la teva configuració
$base_dades = "biblioteca";

// Connexió a la base de dades
$conexion = new mysqli($servidor, $usuari, $contrasenya, $base_dades);

if ($conexion->connect_error) {
    die("Error de connexió: " . $conexion->connect_error);
}

// Comprovar si s'ha enviat el formulari
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $autor = trim($_POST["autor"]);

    if (!empty($autor)) {
        // Cerca per autor amb prepared statements per evitar injeccions SQL
        $stmt = $conexion->prepare("SELECT * FROM llibres WHERE autor LIKE ?");
        $autor_param = "%" . $autor . "%";
        $stmt->bind_param("s", $autor_param);
        $stmt->execute();
        $resultat = $stmt->get_result();

        echo "Llibres de l'autor '$autor':\n";
        while ($fila = $resultat->fetch_assoc()) {
            echo "ID: {$fila['id']} | Títol: {$fila['titol']} | Autor: {$fila['autor']} | Any: {$fila['any']}\n";
        }

        $stmt->close();
    } else {
        echo "Has d'introduir un autor per fer la cerca.\n";
    }
}

$conexion->close();
?>

<form method="POST">
    Autor: <input type="text" name="autor">
    <button type="submit">Cercar</button>
</form>

