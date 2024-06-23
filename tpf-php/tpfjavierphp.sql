CREATE DATABASE IF NOT EXISTS tpfjavierphp;

USE tpfjavierphp;

CREATE TABLE IF NOT EXISTS users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (60) NOT NULL,
    surename VARCHAR (60) NOT NULL,
    email VARCHAR (100) NOT NULL UNIQUE,
    username VARCHAR (100) NOT NULL UNIQUE,
    password VARCHAR (255) NOT NULL,
    imagen TEXT DEFAULT 'http://localhost/tpf-php/assets/images/pngtree-users.png',
    activo INT DEFAULT 1
);

CREATE TABLE IF NOT EXISTS productos(
    id INT PRIMARY KEY AUTO_INCREMENT,
    servicio VARCHAR (60),
    imagen TEXT,
    precio DECIMAL (8,2)
);

INSERT INTO productos VALUES(NULL,'LANDING PAGE','../assets/images/gestioncheck-mac.webp',45000.00),
(NULL,'P&Aacute;GINA WEB','../assets/images/gestioncheck-mac.webp',65000.00),
(NULL,'SITIO WEB','../assets/images/gestioncheck-mac.webp',85000.00);
