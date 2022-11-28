<!doctype html>
<html lang="es" class="h-100">
  <head>
    <?php
      require "../partials/head.php";    
    ?>
    <link rel="stylesheet" href="../static/css/styles.css">
  </head>
<body class="d-flex h-100 text-center text-bg-dark">
  <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
    <header class="mb-auto">
      <div>
        <h3 class="float-md-start mb-0"></h3>
        <nav class="nav nav-masthead justify-content-center float-md-end">
          <a class="nav-link fw-bold py-1 px-0 active" aria-current="page"></a>
          <a class="nav-link fw-bold py-1 px-0"></a>
          <a class="nav-link fw-bold py-1 px-0"></a>
        </nav>
      </div>
    </header>
    <main class="px-3">
      <h1>Error 500</h1>
      <p class="lead">El servidor encontró una condición inesperada que le impide completar la petición.</p>
      <p class="lead">
        <a href="javascript:history.back()" class="btn btn-lg btn-secondary fw-bold border-white bg-white">Volver Atrás</a>
      </p>
    </main>
    <?php
      require "../partials/footer.php";    
    ?>
  </div>
</body>
</html>
