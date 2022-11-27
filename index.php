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
          <a class="nav-link fw-bold py-1 px-0 active" aria-current="page" href="index.php">Home</a>
          <a class="nav-link fw-bold py-1 px-0" href="login.php">Iniciar Sesión</a>
          <a class="nav-link fw-bold py-1 px-0" href="register.php">Registrarse</a>
        </nav>
      </div>
    </header>
    <main class="px-3">
      <h1>Control Horario.</h1>
      <p class="lead">Esta es una APP desarrollada para el Colegio Cooperativa Ciudad de Almería. La funcion de esta APP es un control horario para los profesor@s del CCDA!</p>
      <p class="lead">
        <a href="login.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Iniciar Sesión</a>
        <a href="register.php" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Registrarse</a>
      </p>
    </main>
    <?php
      require "./partials/footer.php";    
    ?>
  </div>
</body>
</html>
