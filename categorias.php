<?php
require_once 'config/conexion.php';

$categoria = isset($_GET['cat']) ? $_GET['cat'] : '';

// Validar categoría para evitar consultas vacías y mejorar seguridad
$categorias_validas = ['Laptops', 'Smartphones', 'Accesorios', 'Monitores', 'Componentes'];

if (!in_array($categoria, $categorias_validas)) {
    // Si la categoría no es válida o está vacía, mostrar error o redirigir
    $productos = [];
    $mensaje = "Categoría no válida seleccionada.";
} else {
    $stmt = $pdo->prepare("SELECT * FROM productos WHERE categoria = :categoria ORDER BY id DESC");
    $stmt->execute(['categoria' => $categoria]);
    $productos = $stmt->fetchAll();
    $mensaje = "";
}

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container py-5">
    <div class="mb-5 text-center">
        <h1 class="fw-bold">Categoría: <?= htmlspecialchars($categoria ?: 'Desconocida') ?></h1>
        <p class="text-muted">Explora los mejores productos en esta categoría</p>
    </div>

    <?php if($mensaje): ?>
        <div class="alert alert-warning text-center"><?= $mensaje ?></div>
    <?php endif; ?>

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
        <?php elseif(!$mensaje): ?>
            <div class="col-12 text-center py-5">
                <i class="bi bi-inbox text-muted" style="font-size: 3rem;"></i>
                <h3 class="mt-3">Aún no hay productos en esta categoría</h3>
                <a href="<?= BASE_URL ?>productos.php" class="btn btn-outline-primary mt-3">Ver todo el catálogo</a>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
