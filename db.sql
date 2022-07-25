CREATE DATABASE prueba_tecnica;
USE prueba_tecnica;

CREATE TABLE usuarios(
id              int(255) auto_increment not null,
nombre          varchar(100) not null,
CONSTRAINT pk_usuarios PRIMARY KEY(id),
)ENGINE=InnoDb;

CREATE TABLE peliculas(
id              int(255) auto_increment NOT NULL,
nombre          varchar(100) not null,
sinopsis        varchar(255) not null,
precioUnitario  int(255) not null,
genero          varchar(255) not null,
fechaEstreno    date not null,
CONSTRAINT pk_peliculas PRIMARY KEY(id)
)ENGINE=InnoDb;

CREATE TABLE alquiler(
id              int(255) auto_increment not null,
usuario_id      int(255) not null,
pelicula_id     int(255) not null,
valorTotal      int(255) not null,
fechaInicio     date not null,
fechaFin        date not null,
CONSTRAINT pk_alquiler PRIMARY KEY(id)
)ENGINE=InnoDb;