<?php

// Definimos la dirección IP de la Base de Datos
$host = "localhost";

// Seleccionamos la Base de Datos teachers_on_time
$database = "teachers_on_time2";

// Definimos el usuario para conectarnos y su contraseña
$name = "root";
$password = "";

// Utilizamos un librería (PDO) para conectarnos a la Base de Datos
try {
    $con = new PDO("mysql:host=$host;dbname=$database", $name, $password);
    // foreach ($con->query("SHOW DATABASES") as $row) {
    //     print_r($row);
    // }
    // die();
} catch (PDOException $e) {
    die("PDO Connection Error: " .$e->getMessage());
}
