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

// En el caso de que la cuenta no tenga un valor  no este iniciada redirigimos a login
    $admin = $con->query("SELECT user_admin FROM users WHERE id = {$_SESSION['user']['id']}");
    $admin->execute();
    $user_admin = $admin->fetch(PDO::FETCH_ASSOC);

    if ( $user_admin['user_admin'] != '1' ) {
        header("Location: home.php");
        return;
    }

    // Realizamos una consulta SQL para obtener la hora de entrada, hora de salida y total de horas del usuario cuyo "user_id" sea el de la sesión iniciada
    $records = $con->query("SELECT user_name, user_id_business, entry_hour, exit_hour, total_hours, total_remuneration FROM records, users WHERE users.id = records.user_id");

    $records2 = $con->query("SELECT user_name, user_surname, user_phone_number, user_id_business, registration_date_user, user_email, id FROM users");


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
    <title>Time Control | Home</title>
</head>
<body>
    <?php
        require "./partials/nav_users.php";    
    ?>
    <main>
<!-- MAIN -->
<!-- PHP para incluir los mensajes flash -->
<?php
                        require "./partials/flash_menssages.php";    
                    ?>
<!-- PHP para incluir los mensajes flash -->

<!-- Sección tabla de jornadas mas total de horas -->
        <div class="container pt-4">
            <div class="row">
                <div>
                    <div class="card text-center tabla_contenido p-4">
                        <div class="card-body p-3">
                            <h2 class="text-start">Listado de Jornadas</h2>
                            <table class="table">

                                <thead class="text-start">
                                    <tr>
                                        <th scope="col">Profesor</th>
                                        <th scope="col">ID Seneca</th>
                                        <th scope="col">Hora Entrada</th>
                                        <th scope="col">Hora Salida</th>
                                        <th scope="col">Total Horas</th>
                                        <th scope="col">Remuneración</th>
                                    </tr>
                                </thead>

                                <tbody class="text-start">

                                    <?php foreach ($records as $datos) : ?>
                                        <tr>
                                            <td><?= $datos["user_name"]?></td>
                                            <td><?= $datos["user_id_business"]?></td>
                                            <td><?= $datos["entry_hour"]?></td>
                                            <td><?= $datos["exit_hour"]?></td>
                                            <td><?= $datos["total_hours"]?> </td>
                                            <td><?= $datos["total_remuneration"]?> €</td>
                                    <?php endforeach ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
<!-- Sección tabla de jornadas mas total de horas -->

<!-- Sección tabla de usuarios registrados -->
        <div class="container pt-4">
            <div class="row">
            <h2 class="text-start">Profesores Registrados</h2>
                <?php foreach ($records2 as $profesores) : ?>
                    <div class="col-md-5 mb-3 ">
                        <div class="card text-center profesores">
                            <div class="card-body">
                                <h3 class="card-title text-capitalize"><?= $profesores["user_name"] ?> <?= $profesores["user_surname"] ?></h3>
                                <p class="m-2"><strong>Teléfono:</strong> <?= $profesores["user_phone_number"] ?></p>
                                <p class="m-2"><strong>ID Empresa:</strong> <?= $profesores["user_id_business"] ?></p>
                                <p class="m-2"><strong>Registro:</strong> <?= $profesores["registration_date_user"] ?></p>
                                <p class="m-2"><strong>E-Mail:</strong> <?= $profesores["user_email"] ?></p>
                                <a href="update_data.php?id=<?= $profesores["id"] ?>" class="btn btn-success mb-2">Editar Usuario <i class="bi bi-pencil-fill"></i></a>
                                <a href="delete_user.php?id=<?= $profesores["id"] ?>" class="btn btn-danger mb-2">Eliminar Usuario <i class="bi bi-trash3-fill"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            </div>
        </div>
<!-- Sección tabla de usuarios registrados -->

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
