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
          <h1>Versión 2.0</h1>
          <hr>
          <p class="text-start">Actualmente la APP se encuentra en la versión 2.0, lanzada el día 4 de Diciembre de 2022</p>
          <p class="text-start">En la fecha anteriormente indicada, la APP cuenta con una funcionalidad del 100% y con una seguridad del 99%, con base en nuestras pruebas de funcionalidad y seguridad<p>
          <p class="text-start">La APP recibira más actualizaciones en el futuro y actualmente estamos trabajando en la versión 3.0 que incorporara más funcionalidades</p>
          <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-label="Animated striped example" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 25%"><strong>Version 3.0 25%</strong></div>
          </div>
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
