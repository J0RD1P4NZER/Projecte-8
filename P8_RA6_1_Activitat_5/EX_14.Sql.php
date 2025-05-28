<?php
$servidor = "localhost";
$usuari = "root"; // Canvia segons la teva configuració
$contrasenya = ""; // Canvia segons la teva configuració
$base_dades = "usuaris";

$conexion = new mysqli($servidor, $usuari, $contrasenya, $base_dades);

if ($conexion->connect_error) {
    die("Error de connexió: " . $conexion->connect_error);
}

$resultat = $conexion->query("SELECT * FROM clients");

$clients_data = [];
if ($resultat->num_rows > 0) {
    while ($fila = $resultat->fetch_assoc()) {
        $clients_data[] = $fila;
    }
}

$conexion->close();
?>


