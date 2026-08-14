CREATE DATABASE IF NOT EXISTS tecnologia;
USE tecnologia;

CREATE TABLE IF NOT EXISTS productos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    descripcion TEXT NOT NULL,
    precio DECIMAL(10, 2) NOT NULL,
    categoria VARCHAR(50) NOT NULL,
    imagen VARCHAR(255) NOT NULL,
    stock INT NOT NULL DEFAULT 0
);

INSERT INTO productos (nombre, descripcion, precio, categoria, imagen, stock) VALUES
('Laptop Pro X', 'Potente laptop para desarrollo y gaming con 32GB RAM y RTX 4080.', 1999.99, 'Laptops', 'assets/img/laptop.jpg', 15),
('Smartphone Z Fold', 'Teléfono plegable de última generación con cámara de 108MP.', 1299.00, 'Smartphones', 'assets/img/smartphone.jpg', 25),
('Auriculares Sonus NC', 'Auriculares inalámbricos con cancelación de ruido activa superior.', 299.50, 'Accesorios', 'assets/img/accesorio.jpg', 50),
('Monitor Ultrawide 4K', 'Monitor curvo de 34 pulgadas ideal para productividad y juegos.', 799.99, 'Monitores', 'assets/img/monitor.jpg', 10),
('GPU RTX 5090', 'Tarjeta gráfica de alto rendimiento para gaming en 4K y diseño 3D.', 1599.99, 'Componentes', 'assets/img/componente.jpg', 5);
