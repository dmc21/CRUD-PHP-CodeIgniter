/*DROP DATABASE IF EXISTS db_appCI;
CREATE DATABASE db_appCI CHARACTER SET utf8;
USE db_appCI;*/


CREATE TABLE usuarios(
	idusuario INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellidos VARCHAR (75) NOT NULL,
    email VARCHAR(75) NOT NULL,
    nick VARCHAR(75) NOT NULL,
    passwd VARCHAR(75) NOT NULL
);

CREATE TABLE lugares(
	id INT UNSIGNED PRIMARY KEY,
    nombre VARCHAR(75) NOT NULL, -- LUGAR DE PRODUCCION
    descripcion VARCHAR(1024) NOT NULL, -- DESCRIPCIÓN DEL LUGAR
    longitud DOUBLE NOT NULL, -- 
    latitud DOUBLE NOT NULL
);

CREATE TABLE peliculas(
	id INT UNSIGNED PRIMARY KEY,
    titulo VARCHAR(75) NOT NULL,
    anio INT NOT NULL,
    pais VARCHAR(75) NOT NULL,
    cartel_src VARCHAR(150)
);

CREATE TABLE localizaciones(
	id INT UNSIGNED PRIMARY KEY,
	descripcion VARCHAR(1024) NOT NULL,
    fotografia_src VARCHAR(150),
    publicada VARCHAR(1) NOT NULL,
    id_lugar INT UNSIGNED NOT NULL,
    id_pelicula INT UNSIGNED NOT NULL
);

INSERT INTO usuarios VALUES (1,'david','mora','dan@gmail.com','dmora','123');








