<?php
require_once 'config/conexion.php';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

// Obtener productos destacados (los primeros 4)
$stmt = $pdo->query("SELECT * FROM productos LIMIT 4");
$destacados = $stmt->fetchAll();
?>

<!-- Banner Principal -->
<section class="hero-section text-center">
    <div class="container position-relative z-1">
        <h1 class="hero-title">Descubre el Futuro Hoy</h1>
        <p class="lead mb-4 mx-auto text-light" style="max-width: 600px;">
            Encuentra la mejor tecnología, desde laptops de alto rendimiento hasta accesorios imprescindibles. Innovación en tus manos.
        </p>
        <a href="productos.php" class="btn btn-primary btn-lg px-5 py-3 rounded-pill shadow-lg">Ver Catálogo Completo</a>
    </div>
</section>

<!-- Sección de Productos Destacados -->
<section class="container py-5 mt-4">
    <div class="d-flex justify-content-between align-items-end mb-4">
        <div>
            <h2 class="fw-bold mb-0">Productos Destacados</h2>
            <p class="text-muted mb-0">Nuestra mejor selección para ti</p>
        </div>
        <a href="productos.php" class="btn btn-outline-primary d-none d-md-inline-block">Ver todos <i class="bi bi-arrow-right"></i></a>
    </div>

    <div class="row g-4">
        <?php foreach ($destacados as $prod): ?>
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="card product-card">
                    <div class="product-img-wrapper">
                        <span class="product-category-badge"><?= htmlspecialchars($prod['categoria']) ?></span>
                        <img src="<?= htmlspecialchars($prod['imagen']) ?>" alt="<?= htmlspecialchars($prod['nombre']) ?>" class="card-img-top">
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h3 class="product-title"><?= htmlspecialchars($prod['nombre']) ?></h3>
                        <p class="card-text text-muted small flex-grow-1">
                            <?= htmlspecialchars(substr($prod['descripcion'], 0, 60)) ?>...
                        </p>
                        <div class="d-flex justify-content-between align-items-center mt-3">
                            <span class="product-price">$<?= number_format($prod['precio'], 2) ?></span>
                            <a href="detalle.php?id=<?= $prod['id'] ?>" class="btn btn-sm btn-primary">Ver detalles</a>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    
    <div class="text-center mt-4 d-block d-md-none">
        <a href="productos.php" class="btn btn-outline-primary w-100">Ver todos los productos</a>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
