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

        if ( $user['user_working'] != '0' ) {
            $_SESSION["error_start_day"] = ["fecha" => "$fecha", "estilo" => "danger", "icono" => "exclamation-triangle-fill"];
            header("Location: home.php");
            return;
        }
 
        // Ejecutamos las consultas SQL, en ellas definimos que por defecto los valores a enviar sean los validados.
        $statement = $con->prepare("INSERT INTO records (user_id, entry_hour) VALUES ({$_SESSION['user']['id']}, :entry_hour)");
        $statement->bindParam(":entry_hour", $fecha);
        $statement->execute();

        $record = $con->prepare("UPDATE users SET user_working=:insert_id WHERE id = {$_SESSION['user']['id']}");
        $record->bindParam(":insert_id", $con->lastInsertId());
        $record->execute();


        $_SESSION["flash_start_day"] = ["fecha" => "$fecha", "estilo" => "success", "icono" => "check-circle-fill"];

        // Redirigimos a index
        header("Location: home.php");
        return;
    }
?>