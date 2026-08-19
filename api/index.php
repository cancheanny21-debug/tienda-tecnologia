<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'data/productos.php';

// Obtener 4 productos destacados (los primeros 4 para este ejemplo)
$productos_destacados = array_slice($productos, 0, 4);
?>

<!-- Hero Section -->
<section class="hero-section text-center">
    <div class="container hero-content">
        <h1 class="display-4 fw-bold mb-4">Descubre el Futuro con <?= SITE_NAME ?></h1>
        <p class="lead mb-5 mx-auto" style="max-width: 700px;">
            Encuentra la mejor tecnología con precios increíbles. Desde laptops potentes hasta los smartphones más avanzados, todo a un clic de distancia.
        </p>
        <a href="/productos" class="btn btn-info btn-lg text-dark fw-bold px-5 rounded-pill shadow-lg">Ver Productos</a>
    </div>
</section>

<!-- Beneficios -->
<section class="py-5 bg-white">
    <div class="container">
        <div class="row text-center gy-4">
            <div class="col-md-4">
                <div class="p-4 rounded-3 bg-light h-100 shadow-sm transition">
                    <i class="fa-solid fa-truck-fast text-primary fs-1 mb-3"></i>
                    <h4 class="fw-bold">Envío Rápido</h4>
                    <p class="text-muted">Envíos a todo el país en 24-48 horas laborables.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-3 bg-light h-100 shadow-sm transition">
                    <i class="fa-solid fa-shield-halved text-success fs-1 mb-3"></i>
                    <h4 class="fw-bold">Garantía Segura</h4>
                    <p class="text-muted">Todos nuestros productos incluyen 1 año de garantía.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="p-4 rounded-3 bg-light h-100 shadow-sm transition">
                    <i class="fa-solid fa-headset text-info fs-1 mb-3"></i>
                    <h4 class="fw-bold">Soporte 24/7</h4>
                    <p class="text-muted">Atención al cliente siempre disponible para ayudarte.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Productos Destacados -->
<section class="py-5 bg-light min-vh-100-custom">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Productos Destacados</h2>
        <div class="row">
            <?php foreach($productos_destacados as $producto): ?>
                <?php include 'includes/tarjeta_producto.php'; ?>
            <?php endforeach; ?>
        </div>
        <div class="text-center mt-4">
            <a href="/productos" class="btn btn-outline-primary px-4">Ver Catálogo Completo</a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
