<?php
$conexion = new mysqli("localhost", "usuari", "contrasenya", "biblioteca");

if ($conexion->connect_error) {
    die("Error de connexió: " . $conexion->connect_error);
}

$resultat = $conexion->query("SELECT * FROM llibres ORDER BY any DESC");

echo "<table border='1'><tr><th>ID</th><th>Títol</th><th>Autor</th><th>Any</th></tr>";
while ($fila = $resultat->fetch_assoc()) {
    echo "<tr><td>{$fila['id']}</td><td>{$fila['titol']}</td><td>{$fila['autor']}</td><td>{$fila['any']}</td></tr>";
}
echo "</table>";

$conexion->close();
?>

