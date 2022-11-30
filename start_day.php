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
    $fecha_hora_actual=date("Y-m-d H:i:s");

    // Definimos que para que se ejecuten el resto de instrucciones, el método de solicitud sea "POST"
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Definimos una consulta SQL donde obtenemos el ID del usuario con la sesión iniciada
        $working_user_id = $con->query("SELECT user_working FROM users WHERE id = {$_SESSION['user']['id']}");
        $working_user_id->execute();
        $user = $working_user_id->fetch(PDO::FETCH_ASSOC);

        // Declaramos una condición indicando que si la variable "$user", antes definida, es igual a 0 enviara el mensaje de error, ya que el usuario tiene una sesión iniciada
        if ( $user['user_working'] != '0' ) {
            $_SESSION["error_start_day"] = ["fecha" => "$fecha_hora_actual", "estilo" => "danger", "icono" => "exclamation-triangle-fill"];
            header("Location: home.php");
            return;
        }
 
        // Definimos la consulta SQL para introducir los datos de "entry_hour", que en este caso será a través de la variable "fecha" definida anteriormente
        $statement = $con->prepare("INSERT INTO records (user_id, entry_hour) VALUES ({$_SESSION['user']['id']}, :entry_hour)");
        $statement->bindParam(":entry_hour", $fecha_hora_actual);
        $statement->execute();

        // Por último le asignamos al usuario el id de la consulta anteriormente declarada para que no sea igual a 0 y no pueda iniciar otra jornada hasta finalizar esta
        $record = $con->prepare("UPDATE users SET user_working=:insert_id WHERE id = {$_SESSION['user']['id']}");
        $record->bindParam(":insert_id", $con->lastInsertId());
        $record->execute();
        
        // Definimos un mensaje flash para indicarle al usuario que la sesión se ha iniciado correctamente donde definimos un estilo y un icono
        $_SESSION["flash_start_day"] = ["fecha" => "$fecha_hora_actual", "estilo" => "success", "icono" => "check-circle-fill"];

        // Redirigimos a index
        header("Location: home.php");
        return;
    }
?>
