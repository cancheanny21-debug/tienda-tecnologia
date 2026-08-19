<?php
// Arreglo PHP que simula nuestra base de datos de productos.
// En un proyecto real, estos datos vendrían de una base de datos MySQL.
$productos = [
    [
        'id' => 1,
        'nombre' => 'Laptop Lenovo ThinkPad',
        'descripcion' => 'Laptop ideal para estudiantes y profesionales. Procesador Intel Core i5, 8GB RAM, 256GB SSD.',
        'categoria' => 'Laptops',
        'precio' => 650.00,
        'stock' => 15,
        'imagen' => 'assets/img/laptop-lenovo.jpg',
        'destacado' => true
    ],
    [
        'id' => 2,
        'nombre' => 'iPhone 13 Pro',
        'descripcion' => 'Teléfono inteligente de Apple con cámara triple, pantalla Super Retina XDR y chip A15 Bionic.',
        'categoria' => 'Celulares',
        'precio' => 999.99,
        'stock' => 8,
        'imagen' => 'assets/img/iphone.jpg',
        'destacado' => true
    ],
    [
        'id' => 3,
        'nombre' => 'Samsung Galaxy S22',
        'descripcion' => 'Smartphone Android con excelente cámara para fotos nocturnas y rendimiento de gama alta.',
        'categoria' => 'Celulares',
        'precio' => 850.00,
        'stock' => 12,
        'imagen' => 'assets/img/samsung.jpg',
        'destacado' => false
    ],
    [
        'id' => 4,
        'nombre' => 'Audífonos Sony WH-1000XM4',
        'descripcion' => 'Audífonos inalámbricos con cancelación de ruido líder en la industria y hasta 30 horas de batería.',
        'categoria' => 'Audífonos',
        'precio' => 349.99,
        'stock' => 20,
        'imagen' => 'assets/img/audifonos.jpg',
        'destacado' => true
    ],
    [
        'id' => 5,
        'nombre' => 'Teclado Mecánico Logitech G Pro',
        'descripcion' => 'Teclado diseñado para eSports con interruptores mecánicos avanzados y diseño compacto sin teclado numérico.',
        'categoria' => 'Teclados',
        'precio' => 129.99,
        'stock' => 25,
        'imagen' => 'assets/img/teclado.jpg',
        'destacado' => false
    ],
    [
        'id' => 6,
        'nombre' => 'Mouse Inalámbrico Razer DeathAdder V2',
        'descripcion' => 'Mouse ergonómico para juegos con sensor óptico de 20K DPI e interruptores ópticos de Razer.',
        'categoria' => 'Mouse',
        'precio' => 69.99,
        'stock' => 30,
        'imagen' => 'assets/img/mouse.jpg',
        'destacado' => false
    ],
    [
        'id' => 7,
        'nombre' => 'Monitor LG UltraGear 27"',
        'descripcion' => 'Monitor gaming IPS de 27 pulgadas, resolución 1440p, tasa de refresco de 144Hz y 1ms de tiempo de respuesta.',
        'categoria' => 'Monitores',
        'precio' => 399.99,
        'stock' => 10,
        'imagen' => 'assets/img/monitor.jpg',
        'destacado' => true
    ],
    [
        'id' => 8,
        'nombre' => 'Memoria USB SanDisk 128GB',
        'descripcion' => 'Unidad flash USB 3.0 para transferencias rápidas y almacenamiento portátil seguro.',
        'categoria' => 'Accesorios',
        'precio' => 19.99,
        'stock' => 50,
        'imagen' => 'assets/img/memoria-usb.jpg',
        'destacado' => false
    ]
];
?>
