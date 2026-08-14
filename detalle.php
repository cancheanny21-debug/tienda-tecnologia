<?php
require_once 'config/conexion.php';

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header("Location: productos.php");
    exit;
}

$id = (int) $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM productos WHERE id = :id");
$stmt->execute(['id' => $id]);
$producto = $stmt->fetch();

if (!$producto) {
    // Si no existe, redirigir
    header("Location: productos.php");
    exit;
}

require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container py-5">
    <nav aria-label="breadcrumb" class="mb-4">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php" class="text-decoration-none">Inicio</a></li>
            <li class="breadcrumb-item"><a href="productos.php" class="text-decoration-none">Catálogo</a></li>
            <li class="breadcrumb-item"><a href="categorias.php?cat=<?= urlencode($producto['categoria']) ?>" class="text-decoration-none"><?= htmlspecialchars($producto['categoria']) ?></a></li>
            <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($producto['nombre']) ?></li>
        </ol>
    </nav>

    <div class="row g-5 align-items-center">
        <div class="col-md-6">
            <img src="<?= htmlspecialchars($producto['imagen']) ?>" class="img-fluid product-detail-img w-100" alt="<?= htmlspecialchars($producto['nombre']) ?>">
        </div>
        <div class="col-md-6">
            <span class="badge bg-primary mb-2 px-3 py-2 fs-6"><?= htmlspecialchars($producto['categoria']) ?></span>
            <h1 class="fw-bold mb-3"><?= htmlspecialchars($producto['nombre']) ?></h1>
            <h2 class="text-primary fw-bold mb-4">$<?= number_format($producto['precio'], 2) ?></h2>
            
            <h5 class="fw-bold mt-4">Descripción del Producto</h5>
            <p class="text-muted" style="line-height: 1.8;">
                <?= nl2br(htmlspecialchars($producto['descripcion'])) ?>
            </p>
            
            <hr class="my-4">
            
            <div class="d-flex align-items-center gap-3 mb-4">
                <span class="text-muted"><i class="bi bi-box-seam me-2"></i> Stock disponible: <strong class="<?= $producto['stock'] > 0 ? 'text-success' : 'text-danger' ?>"><?= $producto['stock'] ?> unidades</strong></span>
            </div>

            <div class="d-flex gap-3 mt-4">
                <a href="productos.php" class="btn btn-outline-secondary px-4 py-2"><i class="bi bi-arrow-left me-2"></i> Regresar al Catálogo</a>
                <button class="btn btn-primary px-5 py-2 fw-bold shadow-sm" <?= $producto['stock'] == 0 ? 'disabled' : '' ?>><i class="bi bi-cart-plus me-2"></i> Añadir al carrito</button>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
