<!doctype html>
<html lang="es" class="h-100">
  <head>
    <?php
      require "./partials/head.php";    
    ?>
    <link rel="stylesheet" href="./static/css/styles.css">
  </head>
<body class="d-flex h-100 text-center text-bg-dark body-politica">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
      <div>
        <h3 class="float-md-start mb-0">Teachers on Time</h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link fw-bold py-1 px-0" aria-current="page" href="index.php">Home</a>
          <a class="nav-link fw-bold py-1 px-0" href="login.php">Iniciar Sesión</a>
          <a class="nav-link fw-bold py-1 px-0" href="register.php">Registrarse</a>
        </nav>
      </div>
    </header>
    <main class="px-3 main-politica">
        <h1>Versión 1.0</h1>
        <hr>
        <p class="text-start">Actualmente la APP se encuentra en la versión 1.0, lanzada el día 1 de Diciembre de 2022</p>
        <p class="text-start">En la fecha anteriormente indicada, la APP cuenta con una funcionalidad del 100% y con una seguridad del 100%, con base en nuestras pruebas de funcionalidad y seguridad<p>
        <p class="text-start">La APP recibira más actualizaciones en el futuro y actualmente estamos trabajando en la versión 2.0 que incorporara mejoras en la funcionalidad y más funcionalidades</p>
        <div class="progress">
            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 25%"><strong>Version 2.0 25%</strong></div>
        </div>
    </main>
    <?php
      require "./partials/footer.php";    
    ?>
  </div>
</body>
</html>