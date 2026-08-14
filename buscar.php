<?php
require_once 'config/conexion.php';

$query = isset($_GET['q']) ? trim($_GET['q']) : '';
$productos = [];

if ($query !== '') {
    // Buscar por nombre o descripción (parcial)
    $stmt = $pdo->prepare("SELECT * FROM productos WHERE nombre LIKE :q OR descripcion LIKE :q ORDER BY id DESC");
    $searchTerm = "%$query%";
    $stmt->execute(['q' => $searchTerm]);
    $productos = $stmt->fetchAll();
}

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container py-5">
    <div class="mb-5">
        <h1 class="fw-bold">Resultados de búsqueda</h1>
        <?php if ($query !== ''): ?>
            <p class="text-muted fs-5">Has buscado: <strong>"<?= htmlspecialchars($query) ?>"</strong></p>
            <p class="text-primary"><?= count($productos) ?> resultado(s) encontrado(s)</p>
        <?php else: ?>
            <div class="alert alert-info">Por favor, ingresa un término de búsqueda en la barra superior.</div>
        <?php endif; ?>
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
                                <a href="detalle.php?id=<?= $prod['id'] ?>" class="btn btn-sm btn-primary">Ver detalles</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php elseif($query !== ''): ?>
            <div class="col-12 text-center py-5">
                <i class="bi bi-search text-muted" style="font-size: 3rem;"></i>
                <h3 class="mt-3">No encontramos nada para "<?= htmlspecialchars($query) ?>"</h3>
                <p class="text-muted">Intenta buscar con otros términos o palabras clave.</p>
                <a href="productos.php" class="btn btn-outline-primary mt-3">Volver al catálogo</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
