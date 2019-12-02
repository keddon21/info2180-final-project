<?php
CREATE DATABASE schema;
USE schema;

DROP TABLE IF EXISTS Users;

CREATE TABLE Users(
    ID INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    FirstName VARCHAR(40) DEFAULT NULL,
    LastName VARCHAR(40) DEFAULT NULL,
    password VARCHAR(32) DEFAULT NULL,
    email VARCHAR(32) DEFAULT NULL,
    date_Joined DATE DEFAULT GETDATE()
);

CREATE TABLE Issues(
    id INT UNSIGNED NOT NULL PRIMARY KEY,
    title VARCHAR(50) DEFAULT NULL, 
    description_ VARCHAR(100) DEFAULT NULL,
    type_ VARCHAR(40) DEFAULT NULL,
    priority_ VARCHAR(40) DEFAULT NULL,
    status_ VARCHAR(30) DEFAULT 'Open',
    assigned_to VARCHAR(40) DEFAULT NULL,
    created_by VARCHAR(40) DEFAULT NULL,
    created DATE DEFAULT GETDATE(),
    updated DATE DEFAULT GETDATE()
);

INSERT INTO Users(password, email) VALUES (HASHBYTES('SHA1', 'password'), 'admin@bugme.com');
?>