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
    user_password VARCHAR(255) DEFAULT NULL,
    user_admin INT(1) DEFAULT NULL
);

CREATE TABLE records (
    id INT AUTO_INCREMENT PRIMARY KEY NOT NULL,
    user_id INT NOT NULL,
    entry_hour DATETIME NULL DEFAULT NULL,
    exit_hour DATETIME NULL DEFAULT NULL,
    total_hours TIME DEFAULT NULL,
    total_seconds INT(255) DEFAULT NULL,
    total_remuneration DECIMAL(4,2) DEFAULT NULL,

    FOREIGN KEY (user_id) REFERENCES users(id)
);
