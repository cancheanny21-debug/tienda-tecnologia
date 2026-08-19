<?php
require_once 'config/conexion.php';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

// Obtener todos los productos
$stmt = $pdo->query("SELECT * FROM productos ORDER BY id DESC");
$productos = $stmt->fetchAll();
?>

<div class="container py-5">
    <div class="mb-5 text-center">
        <h1 class="fw-bold">Catálogo de Productos</h1>
        <p class="text-muted">Explora toda nuestra gama de dispositivos tecnológicos</p>
    </div>

    <div class="row g-4">
        <?php if(count($productos) > 0): ?>
            <?php foreach ($productos as $prod): ?>
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <div class="card product-card">
                        <div class="product-img-wrapper">
                            <span class="product-category-badge"><?= htmlspecialchars($prod['categoria']) ?></span>
                            <img src="<?= htmlspecialchars($prod['imagen']) ?>" alt="<?= htmlspecialchars($prod['nombre']) ?>">
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h3 class="product-title"><?= htmlspecialchars($prod['nombre']) ?></h3>
                            <p class="card-text text-muted small flex-grow-1">
                                <?= htmlspecialchars(substr($prod['descripcion'], 0, 80)) ?>...
                            </p>
                            <div class="d-flex justify-content-between align-items-center mt-3">
                                <span class="product-price">$<?= number_format($prod['precio'], 2) ?></span>
                                <a href="<?= BASE_URL ?>detalle.php?id=<?= $prod['id'] ?>" class="btn btn-sm btn-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                <h3 class="mt-3">No hay productos disponibles</h3>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
