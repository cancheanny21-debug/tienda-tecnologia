<?php
require_once 'data/productos.php';

// Validar y obtener el ID
$id = isset($_GET['id']) ? filter_var($_GET['id'], FILTER_VALIDATE_INT) : false;
$producto_encontrado = null;

// Buscar el producto
if ($id !== false) {
    foreach ($productos as $p) {
        if ($p['id'] === $id) {
            $producto_encontrado = $p;
            break;
        }
    }
}

$titulo = $producto_encontrado ? htmlspecialchars($producto_encontrado['nombre']) . ' - TechStore' : 'Producto no encontrado';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container py-5">
    <?php if (!$producto_encontrado): ?>
        <div class="text-center py-5">
            <h2 class="text-danger">Error: Producto no encontrado</h2>
            <p class="lead">El producto que buscas no existe o ha sido eliminado.</p>
            <a href="<?= base_url('productos') ?>" class="btn btn-primary mt-3">Regresar al catálogo</a>
        </div>
    <?php else: ?>
        <div class="row">
            <!-- Imagen -->
            <div class="col-md-6 mb-4 text-center">
                <div class="border rounded p-4 bg-white shadow-sm">
                    <?php $imagen = !empty($producto_encontrado['imagen']) ? $producto_encontrado['imagen'] : 'assets/img/placeholder.jpg'; ?>
                    <img src="<?= base_url(htmlspecialchars($imagen)) ?>" class="img-fluid" alt="<?= htmlspecialchars($producto_encontrado['nombre']) ?>" style="max-height: 400px; object-fit: contain;">
                </div>
            </div>
            
            <!-- Detalles -->
            <div class="col-md-6">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= base_url('productos') ?>">Catálogo</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('productos?categoria=' . urlencode($producto_encontrado['categoria'])) ?>"><?= htmlspecialchars($producto_encontrado['categoria']) ?></a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($producto_encontrado['nombre']) ?></li>
                    </ol>
                </nav>
                
                <h1 class="fw-bold mb-3"><?= htmlspecialchars($producto_encontrado['nombre']) ?></h1>
                <h2 class="text-primary fw-bold mb-4">$<?= number_format($producto_encontrado['precio'], 2) ?></h2>
                
                <div class="mb-4">
                    <span class="badge bg-secondary"><?= htmlspecialchars($producto_encontrado['categoria']) ?></span>
                    <?php if ($producto_encontrado['stock'] > 0): ?>
                        <span class="badge bg-success ms-2">Stock: <?= (int)$producto_encontrado['stock'] ?> unidades</span>
                    <?php else: ?>
                        <span class="badge bg-danger ms-2">Agotado</span>
                    <?php endif; ?>
                </div>
                
                <p class="lead"><?= nl2br(htmlspecialchars($producto_encontrado['descripcion'])) ?></p>
                
                <hr class="my-4">
                
                <?php if ($producto_encontrado['stock'] > 0): ?>
                    <div class="d-flex align-items-center mb-3">
                        <label for="cantidad" class="me-3 fw-bold">Cantidad:</label>
                        <input type="number" id="cantidad-producto" class="form-control w-25 text-center" value="1" min="1" max="<?= (int)$producto_encontrado['stock'] ?>">
                    </div>
                    
                    <button class="btn btn-primary btn-lg w-100" id="btn-agregar-detalle"
                            data-id="<?= htmlspecialchars($producto_encontrado['id']) ?>"
                            data-nombre="<?= htmlspecialchars($producto_encontrado['nombre']) ?>"
                            data-precio="<?= $producto_encontrado['precio'] ?>"
                            data-imagen="<?= htmlspecialchars($imagen) ?>"
                            data-stock="<?= (int)$producto_encontrado['stock'] ?>">
                        <i class="bi bi-cart-plus"></i> Agregar al Carrito
                    </button>
                <?php else: ?>
                    <div class="alert alert-warning">
                        Este producto se encuentra actualmente agotado.
                    </div>
                    <button class="btn btn-secondary btn-lg w-100" disabled>Agotado</button>
                <?php endif; ?>
            </div>
        </div>
    <?php endif; ?>
</div>

<?php require_once 'includes/footer.php'; ?>
