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

    $records = $con->query("SELECT entry_hour, exit_hour FROM records WHERE user_id = {$_SESSION['user']['id']}");
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
    <nav class="nav-color navbar navbar-expand-lg navbar-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php"><img class="mr-2" src="./static/img/logo-colegio-almeria.png"/>Teachers on Time</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <!-- Definimos que si se a establecida la Sesión con un usuario muestre los enlaces de Inicio, Añadir Contacto y Cerrar Sesión -->
                <?php if (isset($_SESSION["user"])): ?>
                    <li class="nav-item">
                        <a class="nav-link fw-bold py-1 px-0 m-2" href="home.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold py-1 px-0 m-2 active" href="sesions.php">Sesiones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link fw-bold py-1 px-0 m-2" href="###">Mas Informacion</a>
                    </li>
                <?php endif ?>
            </ul>
            <form class="d-flex" role="search">
                <!-- En este caso insertaremos el nombre del usuario cuando inicie Sesión -->
                <?php if (isset($_SESSION["user"])): ?>
                    <button type="button" class="boton btn btn-secondary"><?= $_SESSION["user"]["user_name"] ?></button>
                    <a href="logout.php"><button type="button" class="cerrar btn btn-danger">Cerrar Sesión</button></a>                      
                <?php endif ?>
            </form>
            </div>
        </div>
    </nav>
    <main>
        <div class="container pt-4 p-3">
            <div class="row">
                <div class="">
                    <div class="card text-center">
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
                                            <td>8</td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</body>
</html>
