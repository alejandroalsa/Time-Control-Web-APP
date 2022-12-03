<?php
    // Llamamos a "db.php" para conectarnos a la Base de Datos
    require "db_connection.php";

    // Iniciamos la Sesión a través de la Cookie
    session_start();

    // En el caso de que la Sesión no este iniciada redirigimos a login
    if (!isset($_SESSION["user"])) {
        header("Location: login.php");
        return;
    }
    
    // Definimos una variable para imprimir un mensaje en caso de error y otra para guardar la fecha en la que se inicia la jornada
    $error = null;
    $fecha=date("Y-m-d H:i:s");

    // Definimos que para que se ejecuten el resto de instrucciones, el método de solicitud sea "POST"
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Definimos una consulta SQL donde obtenemos el ID del usuario con la sesión iniciada
        $working_user_id = $con->query("SELECT user_working FROM users WHERE id = {$_SESSION['user']['id']}");
        $working_user_id->execute();
        $user = $working_user_id->fetch(PDO::FETCH_ASSOC);

        // Definimos una consulta SQL donde actualizamos la tabla records en el campo del "user_id" igual al del usuario con la sesión iniciada y el campo de "user_working"
        $statement = $con->prepare("UPDATE records SET exit_hour=:exit_hour WHERE user_id = {$_SESSION['user']['id']} AND id = {$user['user_working']}");
        $statement->bindParam(":exit_hour", $fecha);
        $statement->execute();

        // Definimos una consulta SQL donde actualizamos la tabla users en el campo del "user_id" asignandole el valor 0 para que usuario pueda volver a iniciar otra jornada
        $record = $con->prepare("UPDATE users SET user_working='0' WHERE id = {$_SESSION['user']['id']}");
        $record->execute();

        // Definimos una consulta SQL donde actualizamos la tabla users en el campo del "total_hours" asignándole la resta de tiempo de la hora de entrada y salida para que visualice el total de horas de dicha jornada
        $total_hours = $con->prepare("UPDATE records SET total_hours=TIMEDIFF(exit_hour, entry_hour) WHERE id = {$user['user_working']};");
        $total_hours->execute();

        // Definimos una consulta SQL donde actualizamos la tabla users en el campo del "total_seconds" asignándole los segundos totales trbajados para poder calcular su remuneracion
        $total_seconds = $con->prepare("UPDATE records SET total_seconds=TIME_TO_SEC(TIMEDIFF(exit_hour, entry_hour)) WHERE id = {$user['user_working']};");
        $total_seconds->execute();

        // Definimos una consulta SQL donde actualizamos la tabla users en el campo del "total_remuneration" para poder calcular su remuneracion
        $total_remuneration = $con->prepare("UPDATE records SET total_remuneration = total_seconds * 0.00278 WHERE id = {$user['user_working']};");
        $total_remuneration->execute();

        // Definimos un mensaje flash para indicarle al usuario que la sesión se ha finalizado correctamente donde definimos un estilo y un icono
        $_SESSION["flash_stop_day"] = ["fecha" => "$fecha", "estilo" => "warning", "icono" => "check-circle-fill"];

        // Redirigimos a index
        header("Location: home.php");
        return;
    }
?>
