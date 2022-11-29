<?php

// Definimos la dirección IP de la Base de Datos
$host = "127.0.0.1";

// Seleccionamos la Base de Datos teachers_on_time
$database = "teachers_on_time";

// Definimos el usuario para conectarnos y su contraseña
$name = "admin_user_teachers_on_time";
$password = "J88s1y6h%4we1NMYpI4";

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
