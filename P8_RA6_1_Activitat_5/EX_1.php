<<?php
$servidor = "localhost";
$usuari = "root"; // Canvia si cal
$contrasenya = ""; // Canvia si cal
$base_dades = "biblioteca";

// Connexió al servidor MySQL
$conexion = new mysqli($servidor, $usuari, $contrasenya);

// Comprovació de la connexió
if ($conexion->connect_error) {
    die("Error de connexió: " . $conexion->connect_error);
}

// Comprovar si la base de dades ja existeix abans de crear-la
$sql = "CREATE DATABASE IF NOT EXISTS $base_dades";
if ($conexion->query($sql) === TRUE) {
    echo "Base de dades '$base_dades' creada amb èxit.<br>";
} else {
    die("Error en crear la base de dades: " . $conexion->error);
}

// Connexió a la base de dades
$conexion->select_db($base_dades);

// Creació de la taula llibres
$sql = "CREATE TABLE IF NOT EXISTS llibres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titol VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    any INT NOT NULL
)";

if ($conexion->query($sql) === TRUE) {
    echo "Taula 'llibres' creada amb èxit.<br>";
} else {
    die("Error en crear la taula: " . $conexion->error);
}

// Inserció de llibres amb preparació de sentència per seguretat
$sql = $conexion->prepare("INSERT INTO llibres (titol, autor, any) VALUES (?, ?, ?)");

$llibres = [
    ["1984", "George Orwell", 1949],
    ["El petit príncep", "Antoine de Saint-Exupéry", 1943],
    ["Harry Potter i la pedra filosofal", "J.K. Rowling", 1997],
    ["El senyor dels anells", "J.R.R. Tolkien", 1954],
    ["Crim i càstig", "Fiódor Dostoievski", 1866]
];

foreach ($llibres as $llibre) {
    $sql->bind_param("ssi", $llibre[0], $llibre[1], $llibre[2]);
    if ($sql->execute()) {
        echo "Llibre '" . $llibre[0] . "' inserit correctament.<br>";
    } else {
        echo "Error en inserir el llibre '" . $llibre[0] . "': " . $sql->error . "<br>";
    }
}

// Tancar connexió
$conexion->close();
?>

} else {
    echo "Error en crear la taula: " . $conexion->error . "<br>";
}

// Inserció de llibres
$sql = "INSERT INTO llibres (titol, autor, any) VALUES
    ('1984', 'George Orwell', 1949),
    ('El petit príncep', 'Antoine de Saint-Exupéry', 1943),
    ('Harry Potter i la pedra filosofal', 'J.K. Rowling', 1997),
    ('El senyor dels anells', 'J.R.R. Tolkien', 1954),
    ('Crim i càstig', 'Fiódor Dostoievski', 1866)";

if ($conexion->query($sql) === TRUE) {
    echo "Llibres inserits correctament!<br>";
} else {
    echo "Error en inserir llibres: " . $conexion->error . "<br>";
}

// Tancar connexió
$conexion->close();
?>

