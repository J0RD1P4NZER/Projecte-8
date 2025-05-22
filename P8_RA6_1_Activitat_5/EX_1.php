<?php
$servidor = "localhost";
$usuari = "root"; // Canvia si cal
$contrasenya = ""; // Canvia si cal

// Connexió al servidor MySQL
$conexion = new mysqli($servidor, $usuari, $contrasenya);

// Comprovació de la connexió
if ($conexion->connect_error) {
    die("Error de connexió: " . $conexion->connect_error);
}

// Creació de la base de dades
$sql = "CREATE DATABASE IF NOT EXISTS biblioteca";
if ($conexion->query($sql) === TRUE) {
    echo "Base de dades 'biblioteca' creada amb èxit.<br>";
} else {
    echo "Error en crear la base de dades: " . $conexion->error . "<br>";
}

// Connexió a la base de dades biblioteca
$conexion->select_db("biblioteca");

// Creació de la taula llibres
$sql = "CREATE TABLE IF NOT EXISTS llibres (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titol VARCHAR(255),
    autor VARCHAR(255),
    any INT
)";
if ($conexion->query($sql) === TRUE) {
    echo "Taula 'llibres' creada amb èxit.<br>";
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

