<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!---- PHP ---->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php

// Llamamos a "db.php" para conectarnos a la Base de Datos
    require "db_connection.php";

// Reanudamos la sesión a través de una Cookie
    session_start();

// En el caso de que la Sesión no este iniciada redirigimos a login
    if (!isset($_SESSION["user"])) {
        header("Location: index.php");
        return;
    }

// Definimos dos variables una para guardar la hora actual y otra para guardar la fecha actual
    $hora_actual=date("H:i:s");
    $fecha_actual=date("Y-m-d");

// Realizamos una consulta SQL para obtener la hora de entrada, hora de salida y total de horas del usuario cuyo "user_id" sea el de la sesión iniciada
    $records = $con->query("SELECT user_name, user_surname, user_phone_number, user_id_business, user_email FROM users WHERE id = {$_SESSION['user']['id']}");



    // Definimos una variable para imprimir un mensaje en caso de error
    $error = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Definimos que no pueden estas vacíos los campos de "nombre" y "numero_telefono"
        if (empty($_POST["user_name"]) || empty($_POST["user_surname"]) || empty($_POST["user_phone_number"])) {
            $error = "Porfavor rellena todos los campos."; 
        }else {
        
            // Ejecutamos las consultas SQL, en ellas definimos que por defecto los valores a enviar sean los validados.
            $statement = $con->prepare("UPDATE users SET user_name = :user_name, user_surname = :user_surname, user_phone_number = :user_phone_number WHERE id = 1");
            $statement->execute([
                    ":user_name" => $_POST["user_name"],
                    ":user_surname" => $_POST["user_surname"],
                    ":user_phone_number" => $_POST["user_phone_number"],
                ]
            );
            
            // Redirigimos a index
            header("Location: home.php");
            return;
        }
    }
?>


<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!---- PHP ---->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="es">
<head>
    
<!-- PHP para incluir el head -->
    <?php
        require "./partials/head.php";    
    ?>
<!-- PHP para incluir el head -->

    <link rel="stylesheet" href="./static/css/styles-home.css">
    <title>Time Control | Account</title>
</head>
<body>
    <?php
        require "./partials/nav_users.php";    
    ?>
    <main>
<!-- MAIN -->
        <div class="container pt-4 p-3">
            <div class="row">
                <div class="p-3">

<!-- PHP para incluir los mensajes flash -->
                    <?php
                        require "./partials/flash_menssages.php";    
                    ?>
<!-- PHP para incluir los mensajes flash -->

<!-- Sección inicio/finalización de jornada -->
                        <div class="card text-center tabla_contenido">
                            <div class="card-body p-5">
                                <form method="POST" action="account.php">
                                    <?php foreach ($records as $datos) : ?>
                                        <fieldset  class="text-start">
                                            <legend>Datos de la cuenta</legend>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Nombre</label>
                                                <input class="form-control" id="user_name" type="text" value="<?= $datos["user_name"]?>" aria-label="default input example">
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Apellidos</label>
                                                <input class="form-control" id="user_surname" type="text" value="<?= $datos["user_surname"]?>" aria-label="default input example">
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">E-mail</label>
                                                <input disabled class="form-control" type="text" value="<?= $datos["user_email"]?>" aria-label="default input example">
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Telefono</label>
                                                <input class="form-control" id="user_phone_number" type="text" value="<?= $datos["user_phone_number"]?>" aria-label="default input example">
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">ID-Empresa</label>
                                                <input disabled class="form-control" type="text" value="<?= $datos["user_id_business"]?>" aria-label="default input example">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Aztualizar Datos</button>
                                        </fieldset>
                                    <?php endforeach ?>
                                </form>
                            </div>
                    </div>

<!-- Sección inicio/finalización de jornada -->

                 </div>
            </div>
        </div>

<!-- Sección tabla de jornadas mas total de horas -->

<!-- MAIN -->
    </main>
    
<!-- PHP para incluir el footer -->
    <?php
        require "./partials/footer_users.php";    
    ?>
<!-- PHP para incluir el footer -->

   </body>
</html>











