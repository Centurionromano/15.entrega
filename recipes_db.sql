-- Crear la base de datos
CREATE DATABASE IF NOT EXISTS recipes_db;

USE recipes_db;

-- Crear tabla de usuarios
CREATE TABLE IF NOT EXISTS users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL
);

-- Crear tabla de recetas
CREATE TABLE IF NOT EXISTS recipes (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,               -- Campo para el nombre de la receta
    image_url VARCHAR(255),                   -- Campo para la URL de la imagen
    type ENUM('desayuno', 'comida', 'cena', 'postre') NOT NULL, -- Tipo de receta (Desayuno, Comida, Cena, Postre)
    ingredients TEXT NOT NULL,                -- Ingredientes de la receta
    instructions TEXT NOT NULL,               -- Instrucciones de la receta
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP -- Fecha de creación de la receta
);

-- Insertar usuario de ejemplo (admin)
INSERT INTO users (username, password) VALUES ('admin', PASSWORD('admin123'));

-- Datos de ejemplo para insertar en la tabla de recetas
INSERT INTO recipes (name, image_url, type, ingredients, instructions) VALUES
('Tortilla Española', 'images/tortilla_espanola.jpg', 'desayuno', 'Huevos, Patatas, Cebolla, Aceite de oliva', 'Pelar y cortar las patatas y cebolla. Freír en aceite. Batir los huevos y añadir las patatas. Cocinar en sartén hasta dorarse.'),
('Ensalada César', 'images/ensalada_cesar.jpg', 'comida', 'Lechuga, Pollo, Aderezo César, Croutons', 'Mezclar la lechuga con el pollo cocido. Añadir el aderezo y los croutons. Servir frío.'),
('Sopa de Pollo', 'images/sopa_pollo.jpg', 'cena', 'Pollo, Zanahorias, Apio, Caldo de pollo', 'Hervir el pollo en agua con zanahorias y apio. Colar y servir caliente.'),
('Pastel de Manzana', 'images/pastel_manzana.jpg', 'postre', 'Manzanas, Azúcar, Harina, Mantequilla', 'Cortar las manzanas y mezclarlas con azúcar. Hornear con la mezcla de masa.');

-- Mostrar la estructura de la tabla
DESCRIBE recipes;
