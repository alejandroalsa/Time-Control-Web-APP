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
      <h1>Preguntas.</h1>
      <div class="accordion accordion-flush" id="accordionFlushExample">

        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#registro" aria-expanded="false" aria-controls="flush-collapseOne">
            ¿Cómo me registro?
            </button>
          </h2>
          <div id="registro" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Para poder acceder a la aplicación web es necesario registrarse antes, para ello tiene ir al siguiente enlace: <a href="register.php">Registrarse</a></div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#inicio_sesion" aria-expanded="false" aria-controls="flush-collapseOne">
            ¿Cómo inicio sesión?
            </button>
          </h2>
          <div id="inicio_sesion" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Para poder acceder a la aplicación web es necesario iniciar sesión antes, para ello tiene ir al siguiente enlace: <a href="login.php">Iniciar Sesión</a></div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#inicio_jornada" aria-expanded="false" aria-controls="flush-collapseOne">
            ¿Cómo inicio una Jornada Laboral?
            </button>
          </h2>
          <div id="inicio_jornada" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Para poder iniciar una Jornada Laboral tiene que dirigirse al siguiente enlace: <a href="home.php">Iniciar Jornada</a> una vez iniciada su sesión, después le aparecerá un botón en el centro de la pantalla de color verde donde pondrá "Iniciar Jornada", tendrá que pulsarlo para iniciar su Jornada Laboral, recuerde que no podrá iniciar varias jornadas.</div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#finalizar_jornada" aria-expanded="false" aria-controls="flush-collapseOne">
            ¿Cómo finalizo una Jornada Laboral?
            </button>
          </h2>
          <div id="finalizar_jornada" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Para poder finalizar una Jornada Laboral tiene que dirigirse al siguiente enlace: <a href="home.php">Finalizar Jornada</a> una vez iniciada su sesión, después le aparecerá un botón en el centro de la pantalla de color rojo donde pondrá "Finalizar Jornada", tendrá que pulsarlo para finalizar su Jornada Laboral.</div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#contraseña" aria-expanded="false" aria-controls="flush-collapseOne">
            ¿Cómo recupero mi contraseña?
            </button>
          </h2>
          <div id="contraseña" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">En el caso de que no se acuerde de su, contraseña tendrá que ponerse en contacto con el administrador de la APP: <a href="mailto:info@teachersontimeccds.com?Subject=Solicitud%20recuperación%20de%20contraseña">Solicitar recuperación de contraseña</a></div>
          </div>
        </div>

        <div class="accordion-item">
          <h2 class="accordion-header" id="flush-headingOne">
            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#elimino_cuenta" aria-expanded="false" aria-controls="flush-collapseOne">
            ¿Cómo elimino mi cuenta?
            </button>
          </h2>
          <div id="elimino_cuenta" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
            <div class="accordion-body">Para poder eliminar su cuenta tendrá que ponerse en contacto con el administrador de la APP: <a href="mailto:info@teachersontimeccds.com?Subject=Solicitud%20eliminacion%20de%20cuenta">Solicitar eliminación de cuenta</a></div>
        </div>


      </div>
    </main>
    <?php
      require "./partials/footer.php";    
    ?>
  </div>
</body>
</html>
