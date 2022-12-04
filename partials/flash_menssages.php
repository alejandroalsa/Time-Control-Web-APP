<!-- Mensaje flash ¡Jornada Iniciada! -->
      <!-- Definimos si la variable "$_SESSION["flash_start_day"]" existe -->
<?php if (isset($_SESSION["flash_start_day"])): ?>
    <div class="container mt-4">
                                <!-- Definimos el contenido que tendrá la variable en este caso estilo -->
        <div class="alert alert-<?= $_SESSION["flash_start_day"]["estilo"]?>  alert-dismissible fade show" role="alert">
                            <!-- Definimos el contenido que tendrá la variable en este caso icono -->
            <i class="bi bi-<?= $_SESSION["flash_start_day"]["icono"] ?>"></i>
            <strong>¡Jornada Iniciada!</strong>, usted ha iniciado su jornada el día: <strong><?= $fecha_actual?> a las: <?= $hora_actual?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <!-- Destruimos la variable "$_SESSION["flash_start_day"]" localmente -->
    <?php unset($_SESSION["flash_start_day"]) ?>
<?php endif ?>
<!-- Mensaje flash ¡Jornada Iniciada! -->

<!-- Mensaje flash ¡Jornada Detenida! -->
      <!-- Definimos si la variable "$_SESSION["flash_stop_day"]" existe -->
<?php if (isset($_SESSION["flash_stop_day"])): ?>
    <div class="container mt-4">
                                <!-- Definimos el contenido que tendrá la variable en este caso estilo -->
        <div class="alert alert-<?= $_SESSION["flash_stop_day"]["estilo"]?>  alert-dismissible fade show" role="alert">
                            <!-- Definimos el contenido que tendrá la variable en este caso icono -->
            <i class="bi bi-<?= $_SESSION["flash_stop_day"]["icono"] ?>"></i>
            <strong>¡Jornada Detenida!</strong>,usted ha finalizado su jornada el día: <strong><?= $fecha_actual?></strong> a las: <strong><?= $hora_actual?></strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <!-- Destruimos la variable "$_SESSION["flash_stop_day"]" localmente -->
    <?php unset($_SESSION["flash_stop_day"]) ?>
<?php endif ?>
<!-- Mensaje flash ¡Jornada Detenida! -->

<!-- Mensaje flash ¡Error! -->
      <!-- Definimos si la variable "$_SESSION["error_start_day"]" existe -->
<?php if (isset($_SESSION["error_start_day"])): ?>
    <div class="container mt-4">
                                <!-- Definimos el contenido que tendrá la variable en este caso estilo -->
        <div class="alert alert-<?= $_SESSION["error_start_day"]["estilo"]?>  alert-dismissible fade show" role="alert">
                            <!-- Definimos el contenido que tendrá la variable en este caso estilo -->
            <i class="bi bi-<?= $_SESSION["error_start_day"]["icono"] ?>"></i>
            <strong>¡Error!</strong>, usted ya tiene una <strong>Jornada Iniciada.</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <!-- Destruimos la variable "$_SESSION["error_start_day"]" localmente -->
    <?php unset($_SESSION["error_start_day"]) ?>
<?php endif ?>
<!-- Mensaje flash Jornada Iniciada -->

<!-- Mensaje flash ¡Usuario Actualizado! -->
      <!-- Definimos si la variable "$_SESSION["error_start_day"]" existe -->
      <?php if (isset($_SESSION["update_data"])): ?>
    <div class="container mt-4">
                                <!-- Definimos el contenido que tendrá la variable en este caso estilo -->
        <div class="alert alert-<?= $_SESSION["update_data"]["estilo"]?>  alert-dismissible fade show" role="alert">
                            <!-- Definimos el contenido que tendrá la variable en este caso estilo -->
            <i class="bi bi-<?= $_SESSION["update_data"]["icono"] ?>"></i>
            <strong>¡Usuario Actualizado!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <!-- Destruimos la variable "$_SESSION["update_data"]" localmente -->
    <?php unset($_SESSION["update_data"]) ?>
<?php endif ?>
<!-- Mensaje flash Usuario Actualizado -->

<!-- Mensaje flash ¡Usuario Eliminado! -->
      <!-- Definimos si la variable "$_SESSION["delete_user"]" existe -->
      <?php if (isset($_SESSION["delete_user"])): ?>
    <div class="container mt-4">
                                <!-- Definimos el contenido que tendrá la variable en este caso estilo -->
        <div class="alert alert-<?= $_SESSION["delete_user"]["estilo"]?>  alert-dismissible fade show" role="alert">
                            <!-- Definimos el contenido que tendrá la variable en este caso estilo -->
            <i class="bi bi-<?= $_SESSION["delete_user"]["icono"] ?>"></i>
            <strong>¡Usuario Eliminado!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    </div>
    <!-- Destruimos la variable "$_SESSION["update_data"]" localmente -->
    <?php unset($_SESSION["delete_user"]) ?>
<?php endif ?>
<!-- Mensaje flash Usuario Eliminado -->
