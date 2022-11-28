<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!---- PHP ---->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php

    // Llamamos a "db.php" para conectarnos a la Base de Datos
    require "db_connection.php";

    // Iniciamos la Sesión
    session_start();

    // En el caso de que la Sesión no este iniciada redirigimos a login
    if (!isset($_SESSION["user"])) {
        header("Location: index.php");
        return;
    }

    $hora_actual=date("H:i:s");
    $fecha_actual=date("Y-m-d");

    $records = $con->query("SELECT entry_hour, exit_hour, total_hours FROM records WHERE user_id = {$_SESSION['user']['id']}");


?>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!---- PHP ---->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        require "./partials/head.php";    
    ?>
       <link rel="stylesheet" href="./static/css/styles-home.css">
    <title>Teachers on Time | Home</title>
</head>
<body>
    <?php
        require "./partials/nav.php";    
    ?>
    <main>
        <div class="container pt-4 p-3">
            <div class="row">
                <div class="p-3">
                <?php if (isset($_SESSION["flash_start_day"])): ?>
                            <div class="container mt-4">
                                <div class="alert alert-<?= $_SESSION["flash_start_day"]["estilo"]?>  alert-dismissible fade show" role="alert">
                                    <i class="bi bi-<?= $_SESSION["flash_start_day"]["icono"] ?>"></i>
                                    <strong>¡Jornada Iniciada!</strong>, usted ha iniciado su jornada el día: <strong><?= $fecha_actual?> a las: <?= $hora_actual?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            <?php unset($_SESSION["flash_start_day"]) ?>
                        <?php endif ?>
                        <?php if (isset($_SESSION["flash_stop_day"])): ?>
                            <div class="container mt-4">
                                <div class="alert alert-<?= $_SESSION["flash_stop_day"]["estilo"]?>  alert-dismissible fade show" role="alert">
                                    <i class="bi bi-<?= $_SESSION["flash_stop_day"]["icono"] ?>"></i>
                                    <strong>¡Jornada Detenida!</strong>,usted ha finalizado su jornada el día: <strong><?= $fecha_actual?></strong> a las: <strong><?= $hora_actual?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            <?php unset($_SESSION["flash_stop_day"]) ?>
                        <?php endif ?>
                        <?php if (isset($_SESSION["error_start_day"])): ?>
                            <div class="container mt-4">
                                <div class="alert alert-<?= $_SESSION["error_start_day"]["estilo"]?>  alert-dismissible fade show" role="alert">
                                    <i class="bi bi-<?= $_SESSION["error_start_day"]["icono"] ?>"></i>
                                    <strong>¡Error!</strong>, usted ya tiene una <strong>Jornada Iniciada.</strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            </div>
                            <?php unset($_SESSION["error_start_day"]) ?>
                        <?php endif ?>
                    <div class="card text-center tabla_contenido">
                        <div class="card-body">
                            <h3 class="card-title text-capitalize">Iniciar Jornada</h3>
                            <p><strong>Día:</strong> <span><?= $fecha_actual?></span> <strong>Hora:</strong> <span><?= $hora_actual?></span></p>
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
                 </div>
            </div>
        </div>
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
    </main>
    <?php
        require "./partials/footer_users.php";    
    ?>
   </body>
</html>
