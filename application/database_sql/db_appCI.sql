DROP DATABASE IF EXISTS db_appCI;
CREATE DATABASE db_appCI CHARACTER SET utf8;
USE db_appCI;


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
INSERT INTO peliculas VALUES (1,'Armageddon 2','2014','Reino Unido','assets/peliculas/armagedon.jpg');
INSERT INTO localizaciones VALUES(1,'La película desarrollada en Almería fue una de las mejores del mundo','../assets/image.png','s',1,1);


SELECT * FROM localizaciones;
SELECT * FROM peliculas;
SELECT * FROM lugares;

SELECT lugares.nombre, peliculas.titulo,localizaciones.id, localizaciones.descripcion,
	   localizaciones.fotografia_src, localizaciones.publicada, 
        localizaciones.id_lugar, 
       localizaciones.id_pelicula 
       FROM
		localizaciones INNER JOIN peliculas ON
		localizaciones.id_pelicula = peliculas.id INNER JOIN lugares ON
        lugares.id = localizaciones.id_lugar;


	
            DELETE FROM localizaciones WHERE id>=1;
            
SELECT peliculas.id, peliculas.titulo FROM peliculas WHERE peliculas.id NOT IN (SELECT id_pelicula FROM localizaciones);

SELECT cartel_src FROM peliculas;

DELETE FROM peliculas WHERE id = 4;








