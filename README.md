# Time Control

Esta es una Aplicación Web desarrollada para el control horario. La función de esta Aplicación Web es un control horario para los empleados!

# Índice

**Declaración de variables** [🔗](#declaración_de_variables)

**Declaración de IDs** [🔗](#declaración-de-ids)

**Base de Datos** [🔗](#base-de-datos)

**Apache** [🔗](#apache)

**Código PHP** [🔗](#código-php)


## Declaración de variables

*   **Direccion IP de la Base de Datos** = `$host`

*   **Nombre de la Base de Datos** = `$database`

*   **Nombre de usuario de la Base de Datos** `$name`

*   **Contrasena del usuario para conectarse a la base de Datos** = `$password`

*   **Conexion a al Base de Datos** = `$con`

*   **Fecha y Hora Actuales** = `$fecha_hora_actual`

*   **Hora Actual** = `$hora_actual`

*   **Fecha Actual** = `$fecha_actual`

*   **Fecha y Hora actuales para el registro de los usuarios** = `$registration_date_user`

*   **Consulta SQL para introducir los datos en la tabla *records*** = `$records`

*   **Asiciacion de *records* para asignar datos como fecha y hora actuales** = `$datos`

*   **Variable de Error** = `$error`

*   **Consulta SQL para introducir los datos en las tablas** `$statement`

*   **Guardar usuario** `$user`

*   **Consulta SQL para introducir los datos en las tablas** `$working_user_id`

*   **Consulta SQL para actualizar las horas de la jornada** `$total_hours`


## Declaración de IDs

*   **Nombre de Usuarios** = `user_name`

*   **Apellidos de Usuarios** = `user_surname`

*   **Correo electronico de Usuarios** = `user_email`

*   **Telefono de Usuarios** = `user_phone_number`

*   **ID de Empresa de Usuarios** = `user_id_business`

*   **Contraseña de Usuarios** = `user_password`

*   **Fecha de Registro de Usuarios** = `registration_date_user`

*   **Hora de Entrada** = `entry_hour`

*   **Hora de Salida** = `exit_hour`

*   **Estado de la Jornada** = `user_working`

*   **Numero total de horas y minutos invertidas en cada jornada** = `$total_hours`


## Base de Datos

```sql
DROP DATABASE IF EXISTS time_control;

CREATE DATABASE  time_control;

USE  time_control;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_name VARCHAR(255) DEFAULT NULL,
    user_surname VARCHAR(255) DEFAULT NULL,
    user_phone_number VARCHAR(255) DEFAULT NULL,
    user_id_business VARCHAR(255) DEFAULT NULL,
    registration_date_user TIMESTAMP NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
    user_email VARCHAR(255) UNIQUE DEFAULT NULL,
    user_working INT DEFAULT NULL,
    user_password VARCHAR(255) DEFAULT NULL
);

CREATE TABLE records (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT NOT NULL,
    entry_hour TIMESTAMP NULL DEFAULT NULL,
    exit_hour TIMESTAMP NULL DEFAULT NULL,
    total_hours VARCHAR(255) DEFAULT NULL,


    FOREIGN KEY (user_id) REFERENCES users(id)
);
```

* Eliminacion de la Base de Datos `time_control`, si existe.
* Creacion de la Base de Datos `time_control`
* Utilizar la Base de Datos
* Crear la tabla `users` y anadir todos los campos mencionados atras
* Crear la tabla `records` y anadir todos los campos mencionados atras

## Apache

La única configuración de Apache es modificar los mensajes de error para que estén definidos en el virtual host y mostrar los que queramos.

```conf
ErrorDocument 400 ./errors/400.php
ErrorDocument 401 ./errors/401.php
ErrorDocument 403 ./errors/403.php
ErrorDocument 404 ./errors/404.php
ErrorDocument 505 ./errors/405.php
```

## Código PHP
