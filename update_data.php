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

// Definimos los id para posteriormente saber que usuario editar
    $id = $_GET["id"];

// Ejecutamos las consultas SQL para autocompletar los campos del formulario con los datos ya definidos
    $statement = $con->prepare("SELECT * FROM users WHERE id = :id LIMIT 1");
    $statement->execute([":id" => $id]);

// Pequeña medida de seguridad para que cuando un usuario introduzca un id por su cuenta devuelta un 404 y no bloque la Base de Datos
    if ($statement->rowCount() == 0) {
        http_response_code(404);
        echo("HTTP 404");
    }

// Definimos la variable de profesor para obterner su ID
    $profesor = $statement->fetch(PDO::FETCH_ASSOC);

// Definimos una variable para imprimir un mensaje en caso de error
    $error = null;

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Definimos que no pueden estas vacíos los campos de "nombre" y "numero_telefono"
        if (empty($_POST["user_name"]) || empty($_POST["user_surname"]) || empty($_POST["user_email"]) || empty($_POST["user_phone_number"]) || empty($_POST["user_id_business"])) {
            $error = "Por favor rellene todos los campos.";
        }else {
        
            // Ejecutamos las consultas SQL, en ellas definimos que por defecto los valores a enviar sean los validados.
            $statement = $con->prepare("UPDATE users SET user_name = :user_name, user_surname = :user_surname, user_phone_number = :user_phone_number, user_id_business = :user_id_business, user_email = :user_email WHERE id = :id");
            $statement->execute([
                    ":id" => $id,
                    ":user_name" => $_POST["user_name"],
                    ":user_surname" => $_POST["user_surname"],
                    ":user_phone_number" => $_POST["user_phone_number"],
                    ":user_email" => $_POST["user_email"],
                    ":user_id_business" => $_POST["user_id_business"],
                ]
            );
            // Definimos un mensaje flash para indicarle al usuario que la sesión se ha iniciado correctamente donde definimos un estilo y un icono
            $_SESSION["update_data"] = ["estilo" => "success", "icono" => "check-circle-fill"];
            // Redirigimos a index
            header("Location: panel.php");
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

<!-- PHP para incluir el mensaje de error -->
            <!-- Si se establece un valor a "$error" se ejecutará esta parte del código, en este caso el mensaje de error -->
                    <?php if ($error): ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <i class="bi bi-exclamation-triangle-fill"></i>
                            <strong>¡Error!</strong> <?= $error ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    <?php endif ?>
<!-- PHP para incluir el mensaje de error -->

<!-- Sección Datos de la cuenta -->
                        <div class="card text-center tabla_contenido">
                            <div class="card-body p-5">
                                <form method="POST" action="update_data.php?id=<?= $profesor["id"] ?>">
                                        <fieldset  class="text-start">
                                            <h3>Datos de la cuenta</h3>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Nombre</label>
                                                <input class="form-control" id="user_name" name="user_name" type="text" value="<?= $profesor["user_name"]?>" aria-label="default input example">
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Apellidos</label>
                                                <input class="form-control" id="user_surname" name="user_surname" type="text" value="<?= $profesor["user_surname"]?>" aria-label="default input example">
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">E-mail</label>
                                                <input  class="form-control" id="user_email" name="user_email" type="text" value="<?= $profesor["user_email"]?>" aria-label="default input example">
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">Telefono</label>
                                                <input class="form-control" id="user_phone_number" name="user_phone_number" type="text" value="<?= $profesor["user_phone_number"]?>" aria-label="default input example">
                                            </div>
                                            <div class="mb-3">
                                                <label for="disabledTextInput" class="form-label">ID-Empresa</label>
                                                <input  class="form-control" id="user_id_business" name="user_id_business" type="text" value="<?= $profesor["user_id_business"]?>" aria-label="default input example">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Actualizar Datos</button>
                                        </fieldset>
                                </form>
                            </div>
                        </div>

<!-- Sección Datos de la cuenta -->

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
