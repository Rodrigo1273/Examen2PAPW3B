CREATE DATABASE IF NOT EXISTS Libreria;

USE Libreria;
drop database libreria;
CREATE TABLE IF NOT EXISTS Autores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    apellido VARCHAR(50) NOT NULL,
    fecha_nacimiento DATE NOT NULL
);

CREATE TABLE IF NOT EXISTS Libros (
    id INT AUTO_INCREMENT PRIMARY KEY,
    titulo VARCHAR(100) NOT NULL,
    fecha_publicacion DATE NOT NULL,
    autor_id INT,
    precio DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (autor_id) REFERENCES Autores(id)
);
INSERT INTO Autores (nombre, apellido, fecha_nacimiento) VALUES 
('Gabriel', 'García Márquez', '1927-03-06'),
('Isabel', 'Allende', '1942-08-02'),
('Mario', 'Vargas Llosa', '1936-03-28');

INSERT INTO Libros (titulo, fecha_publicacion, autor_id, precio) VALUES 
('Cien Años de Soledad', '1967-05-30', 1, 19.99),
('La Casa de los Espíritus', '1982-01-01', 2, 17.99),
('La Ciudad y los Perros', '1963-01-01', 3, 15.99);

DELIMITER //

CREATE PROCEDURE InsertarAutor(IN p_nombre VARCHAR(50), IN p_apellido VARCHAR(50), IN p_fecha_nacimiento DATE)
BEGIN
    -- Validaciones
    IF p_nombre = '' OR p_apellido = '' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El nombre y apellido no pueden estar vacíos';
    ELSE
        INSERT INTO Autores (nombre, apellido, fecha_nacimiento) VALUES (p_nombre, p_apellido, p_fecha_nacimiento);
    END IF;
END //

CREATE PROCEDURE InsertarLibro(IN p_titulo VARCHAR(100), IN p_fecha_publicacion DATE, IN p_autor_id INT, IN p_precio DECIMAL(10, 2))
BEGIN
    -- Validaciones
    IF p_titulo = '' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El título no puede estar vacío';
    ELSE
        INSERT INTO Libros (titulo, fecha_publicacion, autor_id, precio) VALUES (p_titulo, p_fecha_publicacion, p_autor_id, p_precio);
    END IF;
END //

CREATE PROCEDURE ActualizarAutor(IN p_id INT, IN p_nombre VARCHAR(50), IN p_apellido VARCHAR(50), IN p_fecha_nacimiento DATE)
BEGIN
    -- Validaciones
    IF p_nombre = '' OR p_apellido = '' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El nombre y apellido no pueden estar vacíos';
    ELSE
        UPDATE Autores SET nombre = p_nombre, apellido = p_apellido, fecha_nacimiento = p_fecha_nacimiento WHERE id = p_id;
    END IF;
END //

CREATE PROCEDURE ActualizarLibro(IN p_id INT, IN p_titulo VARCHAR(100), IN p_fecha_publicacion DATE, IN p_autor_id INT, IN p_precio DECIMAL(10, 2))
BEGIN
    -- Validaciones
    IF p_titulo = '' THEN
        SIGNAL SQLSTATE '45000' SET MESSAGE_TEXT = 'El título no puede estar vacío';
    ELSE
        UPDATE Libros SET titulo = p_titulo, fecha_publicacion = p_fecha_publicacion, autor_id = p_autor_id, precio = p_precio WHERE id = p_id;
    END IF;
END //

CREATE PROCEDURE MostrarAutores()
BEGIN
    SELECT * FROM Autores;
END //

CREATE PROCEDURE MostrarLibros()
BEGIN
    SELECT * FROM Libros;
END //

CREATE PROCEDURE EliminarAutor(IN p_id INT)
BEGIN
    DELETE FROM Autores WHERE id = p_id;
END //

CREATE PROCEDURE EliminarLibro(IN p_id INT)
BEGIN
    DELETE FROM Libros WHERE id = p_id;
END //

DELIMITER //

CREATE PROCEDURE BuscarLibrosPorTitulo(IN p_titulo VARCHAR(100))
BEGIN
    SELECT L.*, A.nombre, A.apellido
    FROM Libros L
    JOIN Autores A ON L.autor_id = A.id
    WHERE p_titulo IS NULL OR L.titulo LIKE CONCAT('%', p_titulo, '%');
END //

DELIMITER ;
DELIMITER //

CREATE PROCEDURE BuscarLibrosPorAutor(IN p_autor VARCHAR(100))
BEGIN
    SELECT L.*, A.nombre, A.apellido
    FROM Libros L
    JOIN Autores A ON L.autor_id = A.id
    WHERE p_autor IS NULL OR CONCAT(A.nombre, ' ', A.apellido) LIKE CONCAT('%', p_autor, '%');
END //

DELIMITER ;




DROP PROCEDURE IF EXISTS InsertarAutor;
DROP PROCEDURE IF EXISTS InsertarLibro;
DROP PROCEDURE IF EXISTS ActualizarAutor;
DROP PROCEDURE IF EXISTS ActualizarLibro;
DROP PROCEDURE IF EXISTS MostrarAutores;
DROP PROCEDURE IF EXISTS MostrarLibros;
DROP PROCEDURE IF EXISTS EliminarAutor;
DROP PROCEDURE IF EXISTS EliminarLibro;
DROP PROCEDURE IF EXISTS BuscarLibros;

SHOW TABLES;
