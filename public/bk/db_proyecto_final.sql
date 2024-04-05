drop database if exists db_proyecto_final;
create database db_proyecto_final;
use db_proyecto_final;

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    provider_id VARCHAR(255) NOT NULL,
    avatar VARCHAR(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    telefono VARCHAR(255),
    direccion VARCHAR(255),
    password VARCHAR(300)
);

CREATE TABLE marcas (
 id_marca INT AUTO_INCREMENT PRIMARY KEY,
 nombre varchar(255) NOT NULL
);

CREATE TABLE modelos (
 id_modelo INT AUTO_INCREMENT PRIMARY KEY,
 nombre varchar(255) NOT NULL
);

CREATE TABLE estilos (
 id_estilo INT AUTO_INCREMENT PRIMARY KEY,
 nombre varchar(255) NOT NULL
);

CREATE TABLE color_interior (
 id_color_interior INT AUTO_INCREMENT PRIMARY KEY,
 nombre varchar(255) NOT NULL
);

CREATE TABLE color_exterior (
 id_color_exterior INT AUTO_INCREMENT PRIMARY KEY,
 nombre varchar(255) NOT NULL
);


CREATE TABLE vehiculos (
    id_vehiculo INT AUTO_INCREMENT PRIMARY KEY,
    id_usuario INT,
    id_marca INT,
    id_estilo INT,
    id_color_interior INT,
    id_color_exterior INT,
    transmision VARCHAR(50),
    cilindraje DECIMAL(10, 2),
    combustible VARCHAR(50),
    recibe BIT,
    cantidad_puertas INT,
    año INT,
    precio DECIMAL(18, 2),
    fecha_ingreso_sistema DATE,
    modelo varchar(300),
    vendido BIT,
    FOREIGN KEY (id_usuario) REFERENCES users(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_marca) REFERENCES marcas(id_marca) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_estilo) REFERENCES estilos(id_estilo) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_color_interior) REFERENCES color_interior(id_color_interior) ON UPDATE CASCADE ON DELETE CASCADE,
    FOREIGN KEY (id_color_exterior) REFERENCES color_exterior(id_color_exterior) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE favoritos (
  id_vehiculo INT,
  id_usuario INT,
  FOREIGN KEY (id_vehiculo) REFERENCES vehiculos(id_vehiculo) ON UPDATE CASCADE ON DELETE CASCADE,
  FOREIGN KEY (id_usuario) REFERENCES users(id_usuario) ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE imagenes (
  id_imagen INT AUTO_INCREMENT PRIMARY KEY,
  id_vehiculo INT,
  imagen_url varchar(1500) NOT NULL,
  FOREIGN KEY (id_vehiculo) REFERENCES vehiculos(id_vehiculo) ON UPDATE CASCADE ON DELETE CASCADE
);


INSERT INTO marcas (nombre) VALUES ('Audi');
INSERT INTO marcas (nombre) VALUES ('BMW');
INSERT INTO marcas (nombre) VALUES ('BYD');
INSERT INTO marcas (nombre) VALUES ('Changan');
INSERT INTO marcas (nombre) VALUES ('Chery');
INSERT INTO marcas (nombre) VALUES ('Chevrolet');
INSERT INTO marcas (nombre) VALUES ('Citroen');
INSERT INTO marcas (nombre) VALUES ('Dodge');
INSERT INTO marcas (nombre) VALUES ('Fiat');
INSERT INTO marcas (nombre) VALUES ('Ford');
INSERT INTO marcas (nombre) VALUES ('Fuso');
INSERT INTO marcas (nombre) VALUES ('Geely');
INSERT INTO marcas (nombre) VALUES ('Hino');
INSERT INTO marcas (nombre) VALUES ('Honda');
INSERT INTO marcas (nombre) VALUES ('Hyundai');
INSERT INTO marcas (nombre) VALUES ('Isuzu');
INSERT INTO marcas (nombre) VALUES ('JAC');
INSERT INTO marcas (nombre) VALUES ('Jaguar');
INSERT INTO marcas (nombre) VALUES ('Jeep');
INSERT INTO marcas (nombre) VALUES ('JMC');
INSERT INTO marcas (nombre) VALUES ('Kia');
INSERT INTO marcas (nombre) VALUES ('Land Rover');
INSERT INTO marcas (nombre) VALUES ('Lexus');
INSERT INTO marcas (nombre) VALUES ('Mazda');
INSERT INTO marcas (nombre) VALUES ('Mercedes Benz');
INSERT INTO marcas (nombre) VALUES ('MG');
INSERT INTO marcas (nombre) VALUES ('Mitsubishi');
INSERT INTO marcas (nombre) VALUES ('Nissan');
INSERT INTO marcas (nombre) VALUES ('Peugeot');
INSERT INTO marcas (nombre) VALUES ('Porsche');
INSERT INTO marcas (nombre) VALUES ('RAM');
INSERT INTO marcas (nombre) VALUES ('Renault');
INSERT INTO marcas (nombre) VALUES ('Ssang Yong');
INSERT INTO marcas (nombre) VALUES ('Suzuki');
INSERT INTO marcas (nombre) VALUES ('Toyota');
INSERT INTO marcas (nombre) VALUES ('Volkswagen');
INSERT INTO marcas (nombre) VALUES ('Volvo');
INSERT INTO marcas (nombre) VALUES ('ZNA (DongFeng)');

INSERT INTO estilos (nombre) VALUES
  ('Sedán'),
  ('Station Wagon'),
  ('Hatchback'),
  ('Pickup 4x2'),
  ('Pickup 4x4'),
  ('Pánel'),
  ('Microbús/Minivan'),
  ('SUV/Crossover 4x2'),
  ('SUV/Crossover 4x4'),
  ('Camión');
  
  
  INSERT INTO color_exterior (nombre) VALUES
    ('Rojo'),
    ('Azul'),
    ('Blanco'),
    ('Negro'),
    ('Plateado'),
    ('Gris'),
    ('Verde'),
    ('Amarillo'),
    ('Naranja'),
    ('Marrón');
    
    INSERT INTO color_interior (nombre) VALUES
    ('Negro'),
    ('Gris'),
    ('Beige'),
    ('Marrón'),
    ('Rojo');
 
