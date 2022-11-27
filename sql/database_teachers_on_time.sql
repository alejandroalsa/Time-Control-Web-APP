DROP DATABASE IF EXISTS teachers_on_time;

CREATE DATABASE  teachers_on_time;

USE  teachers_on_time;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_name VARCHAR(255),
    user_surname VARCHAR(255),
    user_phone_number VARCHAR(255),
    user_id_seneca VARCHAR(255),
    registration_date_user TIMESTAMP,
    user_email VARCHAR(255) UNIQUE,
    user_working INT,
    user_password VARCHAR(255)
);

CREATE TABLE records (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT NOT NULL,
    entry_hour VARCHAR(255),
    exit_hour VARCHAR(255),


    FOREIGN KEY (user_id) REFERENCES users(id)
);
