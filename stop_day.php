<?php
    // Llamamos a "db.php" para conectarnos a la Base de Datos
    require "db_connection.php";

    // Iniciamos la Sesión
    session_start();

    // En el caso de que la Sesión no este iniciada redirigimos a login
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
        return;
    }
    
    // Definimos una variable para imprimir un mensaje en caso de error
    $error = null;

    $fecha=date("Y-m-d H:i:s");


    
    // Definimos que para que se ejecuten el resto de instrucciones, el método de solicitud sea "POST"
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $working_user_id = $con->query("SELECT user_working FROM users WHERE id = {$_SESSION['user']['id']}");
        $working_user_id->execute();
        $user = $working_user_id->fetch(PDO::FETCH_ASSOC);

        // Ejecutamos las consultas SQL, en ellas definimos que por defecto los valores a enviar sean los validados.
        $statement = $con->prepare("UPDATE records SET exit_hour=:exit_hour WHERE user_id = {$_SESSION['user']['id']} AND id = {$user['user_working']}");
        $statement->bindParam(":exit_hour", $fecha);
        $statement->execute();

        $record = $con->prepare("UPDATE users SET user_working='0' WHERE id = {$_SESSION['user']['id']}");
        $record->execute();

        $total_hours = $con->prepare("UPDATE records SET  total_hours=CONCAT(MOD(HOUR(TIMEDIFF(entry_hour,exit_hour)), 24), ':',MINUTE(TIMEDIFF(entry_hour,exit_hour)), '') WHERE id = {$user['user_working']};");
        $total_hours->execute();

        $_SESSION["flash_stop_day"] = ["fecha" => "$fecha", "estilo" => "warning", "icono" => "check-circle-fill"];

        // Redirigimos a index
        header("Location: home.php");
        return;
    }
?>










