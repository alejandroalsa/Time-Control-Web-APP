<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!---- PHP ---->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php
    // Llamamos a "db.php" para conectarnos a la Base de Datos
    require "db_connection.php";
    
    // Definimos una variable para imprimir un mensaje en caso de error
    $error = null;
    
    // Definimos que para que se ejecuten el resto de instrucciones, el método de solicitud sea "POST"
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Comenzamos con el proceso de validación de los tres campos, en esta primera línea validamos que los tres campos estén rellenos
        if (empty($_POST["user_email"]) || empty($_POST["user_password"])) {
            $error = "Por favor rellene todos los campos.";

        // En la segunda línea validamos que el campo de Email contenga un @
        } else if (!str_contains($_POST["user_email"], "@")) {
            $error = "Formato de Email inválido.";

        // Después de pasar los filtros pasamos al último que es la validacion de Email para comprobar que el email introducido no esté ya registrado
        } else {

            // Con la variable "con", realizamos una consulta para comprobar el email en la Base de Datos
            $statement = $con->prepare("SELECT * FROM users WHERE user_email = :user_email LIMIT 1");
            $statement->bindParam(":user_email", $_POST["user_email"]);
            $statement->execute();

            // Declaramos una condición, en dicha condición declaramos que si el email no es igual a 0 lo que en este caso que las los emails coincidan, enviara el error.
            if ($statement->rowCount() == 0) {
                $error = "Email o Contraseña incorrectos";
            } else {
                $user = $statement->fetch(PDO::FETCH_ASSOC);

                // En este paso comprobamos que la contraseña introducida por el usuario corresponda al email introducido en el paso anterior.
                if (!password_verify($_POST["user_password"], $user["user_password"])) {
                    $error = "Email o Contraseña incorrectos";
                } else {

                    // Despues de hacer todas las comprovaciones iniciamos la Sesión y redirigimos a "home.php"
                    session_start();
                    unset($user["user_password"]);
                    $_SESSION["user"] = $user;
                    header("Location: home.php");
                }
            }
        }
    }
?>
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!---- PHP ---->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->

<!doctype html>
<html lang="es" class="h-100">
  <head>

<!-- PHP para incluir el head -->
    <?php
      require "./partials/head.php";    
    ?>
<!-- PHP para incluir el head -->

    <link rel="stylesheet" href="./static/css/styles.css">
  </head>
  <body class="d-flex h-100 text-center text-bg-dark body-politica">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">

<!-- PHP para incluir el header -->
      <?php
        require "./partials/nav.php";    
      ?>
<!-- PHP para incluir el header -->

<!-- MAIN -->
      <main class="px-3 main-politica">

<!-- Formulario de Inicio de sesión -->
        <form method="POST" action="login.php" class="form-color p-4 p-md-5 border-secondary rounded-3 bg-secondary">

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

            <div class="form-floating mb-3">
                <input id="user_email" type="text" class="form-control" name="user_email" require autocomplete="user_email" autofocus placeholder="Correo Electrónico">
                <label for="user_email">Correo Electrónico</label>
            </div>

            <div class="form-floating mb-3">
                <input id="user_password" type="password" class="form-control" name="user_password" require autocomplete="user_password" autofocus placeholder="Contraseña">
                <label for="user_password">Contraseña</label>
            </div>

            <button class="w-100 btn btn-lg btn-primary" type="submit">Iniciar Sesión</button>
            <hr class="my-4">
            <small class="text-muted">No tienes una cuenta. <a href="register.php">¡Registrate!</a></small>
        </form>
<!-- Formulario de Inicio de sesión -->

      </main>
<!-- MAIN -->

<!-- PHP para incluir el footer -->
      <?php
        require "./partials/footer.php";    
      ?>
<!-- PHP para incluir el footer -->

    </div>
  </body>
</html>
