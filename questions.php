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

<!-- PHP para incluir las preguntas -->
        <?php
          require "./partials/questions.php";    
        ?>
<!-- PHP para incluir las preguntas -->

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
