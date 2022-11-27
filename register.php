<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<!---- PHP ---->
<!----------------------------------------------------------------------------------------------------------------------------------------------------------------->
<?php
    // Llamamos a "db.php" para conectarnos a la Base de Datos
    require "db_connection.php";

    // Definimos una variable para imprimir un mensaje en caso de error y otra para guardar la fecha y hora actuales
    $error = null;
    $registration_date_user=date("Y-m-d H:i:s");
    
    // Definimos que para que se ejecuten el resto de instrucciones, el método de solicitud sea "POST"
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Comenzamos con el proceso de validación de los tres campos, en esta primera línea validamos que los tres campos estén rellenos
        if (empty($_POST["user_name"]) || empty($_POST["user_surname"]) || empty($_POST["user_email"]) || empty($_POST["user_phone_number"]) || empty($_POST["user_id_seneca"]) || empty($_POST["user_password"])) {
            $error = "Por favor rellene todos los campos.";
        // En la segunda línea validamos que el campo de Email contenga un @
        } else if (!str_contains($_POST["user_email"], "@")) {
            $error = "Formato de Email inválido.";
        // Después de pasar los filtros pasamos al último que es la validacion de Email para comprobar que el email introducido no esté ya registrado
        } else {
            // Con la variable "con", realizamos una consulta para comprobar el email en la Base de Datos
            $statement = $con->prepare("SELECT * FROM users WHERE user_email = :user_email");
            $statement->bindParam(":user_email", $_POST["user_email"]);
            $statement->execute();
            // Declaramos una condición, en dicha condición declaramos que si el email es mayor que 0 lo que significaría que el email ya está registrado, enviara el error.
            if ($statement->rowCount() > 0) {
                $error = "Este email ya está registrado";
            } else{
                //Después de validar que el email introducido no esté ya registrado, comprobamos que el ID de seneca introducido no esté ya registrado con la variable "con"
                $statement = $con->prepare("SELECT * FROM users WHERE user_id_seneca = :user_id_seneca");
                $statement->bindParam(":user_id_seneca", $_POST["user_id_seneca"]);
                $statement->execute();
                // Declaramos una condición, en dicha condición declaramos que si el ID de Seneca es mayor que 0 lo que significaría que el ID de Seneca ya está registrado, enviara el error.
                if ($statement->rowCount() > 0) {
                    $error = "Este ID de Seneca ya está registrado";
                } else{
                    //Después de validar todos los datos, preparamos la sentencia SQL para introducir los datos enviados por el usuario
                    $con
                    ->prepare("INSERT INTO users (user_name, user_surname, user_email, user_phone_number, user_id_seneca, user_password, registration_date_user, user_working) VALUES (:user_name, :user_surname, :user_email, :user_phone_number, :user_id_seneca, :user_password, :registration_date_user, :user_working)")
                    ->execute([ 
                        ":user_name" => $_POST["user_name"],
                        ":user_surname" => $_POST["user_surname"],
                        ":user_email" => $_POST["user_email"],
                        ":user_phone_number" => $_POST["user_phone_number"],
                        ":user_id_seneca" => $_POST["user_id_seneca"],
                        ":user_working" => 0,
                        ":registration_date_user" => $_POST["registration_date_user"], 
                        ":user_password" => password_hash($_POST["user_password"], PASSWORD_BCRYPT),
                    ]);
                    $statement = $con->prepare("SELECT * FROM users WHERE user_email = :user_email LIMIT 1");
                    $statement->bindParam(":user_email", $_POST["user_email"]);
                    $statement->execute();
                    $user = $statement->fetch(PDO::FETCH_ASSOC);
                    // Despues de hacer todas las comprovaciones iniciamos la Sesión y redirigimos a home
                    session_start();
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
        <?php
            require "./partials/head.php";    
        ?>
        <link rel="stylesheet" href="./static/css/styles.css">
    </head>
<body class="d-flex h-100 text-center text-bg-dark">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
      <div>
        <h3 class="float-md-start mb-0">Teachers on Time</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="index.php">Home</a>
          <a class="nav-link fw-bold py-1 px-0" href="login.php">Iniciar Sesión</a>
          <a class="nav-link fw-bold py-1 px-0 active" href="register.php">Registrarse</a>
        </nav>
      </div>
    </header>
    <main>
        <form method="POST" action="register.php" class="form-color p-4 p-md-5 border-secondary rounded-3 bg-secondary">
            <?php if ($error): ?>
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <i class="bi bi-exclamation-triangle-fill"></i>
                    <strong>¡Error!</strong> <?= $error ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            <?php endif ?>
            <div class="form-floating mb-2">
                <input id="user_name" type="text" class="form-control" name="user_name" require autocomplete="user_name" autofocus placeholder="Nombre">
                <label for="user_name">Nombre</label>
            </div>
            <div class="form-floating mb-2">
                <input id="user_surname" type="text" class="form-control" name="user_surname" require autocomplete="user_surname" autofocus placeholder="Apellidos">
                <label for="user_surname">Apellidos</label>
            </div>
            <div class="form-floating mb-2">
                <input id="user_email" type="text" class="form-control" name="user_email" require autocomplete="user_email" autofocus placeholder="Correo Electrónico">
                <label for="user_email">Correo Electrónico</label>
            </div>
            <div class="form-floating mb-2">
                <input id="user_phone_number" type="text" class="form-control" name="user_phone_number" require autocomplete="user_phone_number" autofocus placeholder="Telefono">
                <label for="user_phone_number">Telefono</label>
            </div>
            <div class="form-floating mb-2">
                <input id="user_id_seneca" type="text" class="form-control" name="user_id_seneca" require autocomplete="user_id_seneca" autofocus placeholder="ID Seneca">
                <label for="user_id_seneca">ID Seneca</label>
            </div>
            <div class="form-floating mb-2">
                <input id="user_password" type="password" class="form-control" name="user_password" require autocomplete="user_password" autofocus placeholder="Contraseña">
                <label for="user_password">Contraseña</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Registrarse</button>
            <hr class="my-4">
            <small class="text-muted">Ya tienes una cuenta. <a href="index.php">Inicia Sesion!</a></small>
        </form>
    </main>
    <?php
        require "./partials/footer.php";    
    ?>
  </div>
</body>
</html>