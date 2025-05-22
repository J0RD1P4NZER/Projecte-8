CREATE DATABASE usuaris;
USE usuaris;

CREATE TABLE clients (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nom VARCHAR(255),
    email VARCHAR(255)
);

<?php
$conexion = new mysqli("localhost", "usuari", "contrasenya", "usuaris");

if ($conexion->connect_error) {
    die("Error de connexió: " . $conexion->connect_error);
}

$resultat = $conexion->query("SELECT * FROM clients");

echo "<table border='1'><tr><th>ID</th><th>Nom</th><th>Email</th><th>Accions</th></tr>";
while ($fila = $resultat->fetch_assoc()) {
    echo "<tr>
            <td>{$fila['id']}</td>
            <td>{$fila['nom']}</td>
            <td>{$fila['email']}</td>
            <td><a href='editar_client.php?id={$fila['id']}'>Editar</a> | 
                <a href='eliminar_client.php?id={$fila['id']}' onclick=\"return confirm('Segur que vols eliminar aquest client?')\">Eliminar</a>
            </td>
          </tr>";
}
echo "</table>";

$conexion->close();
?>

