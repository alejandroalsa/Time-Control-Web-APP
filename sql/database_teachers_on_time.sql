DROP DATABASE IF EXISTS teachers_on_time2;

CREATE DATABASE  teachers_on_time2;

USE  teachers_on_time2;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_name VARCHAR(255) DEFAULT NULL,
    user_surname VARCHAR(255) DEFAULT NULL,
    user_phone_number VARCHAR(255) DEFAULT NULL,
    user_id_seneca VARCHAR(255) DEFAULT NULL,
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
