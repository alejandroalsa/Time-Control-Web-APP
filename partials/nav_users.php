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
                <a class="nav-link fw-bold py-1 px-0 m-2 active" href="home.php">Inicio</a>
            </li>
            <li class="nav-item">
              <a href="version.php" class="nav-link fw-bold py-1 px-0 m-2">Versión 1.0</a>
            </li>
        <?php endif ?>
      </ul>
      <form class="d-flex" role="search">
        <!-- En este caso insertaremos el nombre del usuario cuando inicie Sesión -->
        <?php if (isset($_SESSION["user"])): ?>
            <a href="account.php"><button type="button" class="boton btn btn-dark"><?= $_SESSION["user"]["user_name"] ?></button></a>
            <a href="logout.php"><button type="button" class="cerrar btn btn-danger">Cerrar Sesión</button></a>                      
        <?php endif ?>
      </form>
    </div>
  </div>
</nav>
