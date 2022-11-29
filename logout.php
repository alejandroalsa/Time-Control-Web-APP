<?php
    //Comprobamos que la sesión esté iniciada
    session_start();
    //Después la destruimos
    session_destroy();
    // Y redirigimos a "index.php"
    header("Location: index.php");
?>
