<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!---- PHP ---->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php

// Llamamos a "db_connection.php" para conectarnos a la Base de Datos
    require "db_connection.php";

// Reanudamos la sesión a través de una Cookie
    session_start();

// En el caso de que la Sesión no este iniciada redirigimos a login
    if (!isset($_SESSION["user"])) {
        header("Location: index.php");
        return;
    }

// En el caso de que la cuenta no tenga un valor  no este iniciada redirigimos a login
    $admin = $con->query("SELECT user_admin FROM users WHERE id = {$_SESSION['user']['id']}");
    $admin->execute();
    $user_admin = $admin->fetch(PDO::FETCH_ASSOC);

    if ( $user_admin['user_admin'] != '1' ) {
        header("Location: home.php");
        return;
    }

// Definimos los id para posteriormente saber que usuario eliminar
    $id = $_GET["id"];

// Ejecutamos las consultas SQL para obtener el id a eliminar
    $statement = $con->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
    $statement->execute([":id" => $id]);

// Declaramos la variable de profesor para devolver una matriz indexada por nombre de columna como se muestra en su conjunto de resultados. 
    $profesor = $statement->fetch(PDO::FETCH_ASSOC);

// Ejecutamos las consultas SQL para eliminar al usuario con el id definido anteriormente
    $con->prepare("DELETE FROM users WHERE id = :id")->execute([":id" => $id]);

// Configuracion de Mensajes flash
    $_SESSION["delete_user"] = ["estilo" => "sucess", "icono" => "check-circle-fill"];

// Redirigimos a index
    header("Location: panel.php");
    return;
?>
