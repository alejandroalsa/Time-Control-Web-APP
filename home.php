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
    $records = $con->query("SELECT entry_hour, exit_hour, total_hours, total_remuneration FROM records WHERE user_id = {$_SESSION['user']['id']}");

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
                        <div class="card-body">
                            <h3 class="card-title text-capitalize">Iniciar Jornada</h3>

                            <p>
                                <strong>Día:</strong> <span><?= $fecha_actual?></span> <strong>Hora:</strong> <span><?= $hora_actual?></span>
                            </p>

                            <div class="d-grid gap-2 d-md-block">

                                <form method="POST" action="start_day.php">
                                    <button href="" class="btn btn-success mb-2">Iniciar Jornada</button>
                                </form>

                                <form method="POST" action="stop_day.php">
                                    <button href="" class="btn btn-danger mb-2">Finalizar Jornada</button>
                                </form>

                            </div>

                        </div>
                     </div>
<!-- Sección inicio/finalización de jornada -->

                 </div>
            </div>
        </div>

<!-- Sección tabla de jornadas mas total de horas -->
        <div class="container pt-4 p-3">
            <div class="row">
                <div class="">
                    <div class="card text-center tabla_contenido">
                        <div class="card-body">

                            <table class="table">

                                <thead>
                                    <tr>
                                        <th scope="col">Hora de Entrada</th>
                                        <th scope="col">Hora de Salida</th>
                                        <th scope="col">Total Horas</th>
                                    </tr>
                                </thead>

                                <tbody>

                                    <?php foreach ($records as $datos) : ?>
                                        <tr>
                                            <td><?= $datos["entry_hour"]?></td>
                                            <td><?= $datos["exit_hour"]?></td>
                                            <td><?= $datos["total_hours"]?></td>
                                    <?php endforeach ?>
                                </tbody>

                            </table>

                        </div>
                    </div>
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
