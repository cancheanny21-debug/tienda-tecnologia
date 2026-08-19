<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'data/productos.php';

$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$productoActual = null;

foreach($productos as $p) {
    if($p['id'] === $id) {
        $productoActual = $p;
        break;
    }
}
?>

<div class="container py-5 min-vh-100-custom">
    <?php if($productoActual): ?>
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="/">Inicio</a></li>
                <li class="breadcrumb-item"><a href="/productos">Catálogo</a></li>
                <li class="breadcrumb-item active" aria-current="page"><?= htmlspecialchars($productoActual['nombre']) ?></li>
            </ol>
        </nav>

        <div class="row bg-white rounded-4 shadow-sm overflow-hidden border">
            <div class="col-md-6 p-0">
                <img src="<?= htmlspecialchars($productoActual['imagen']) ?>" alt="<?= htmlspecialchars($productoActual['nombre']) ?>" class="img-fluid w-100 h-100 object-fit-cover" style="min-height: 400px;">
            </div>
            <div class="col-md-6 p-5 d-flex flex-column justify-content-center">
                <span class="badge bg-info text-dark mb-2 align-self-start fs-6"><?= htmlspecialchars($productoActual['categoria']) ?></span>
                <h1 class="fw-bold mb-3"><?= htmlspecialchars($productoActual['nombre']) ?></h1>
                <h2 class="text-success fw-bold mb-4">$<?= number_format($productoActual['precio'], 2) ?></h2>
                
                <p class="text-muted fs-5 mb-4">
                    <?= htmlspecialchars($productoActual['descripcion']) ?>
                </p>

                <div class="mb-4">
                    <p class="mb-1 fw-semibold text-secondary">
                        <i class="fa-solid fa-box text-primary me-2"></i> Stock Disponible: <span id="stock-disponible"><?= $productoActual['stock'] ?></span> unidades
                    </p>
                </div>

                <div class="d-flex align-items-center gap-3 mt-auto">
                    <div style="width: 100px;">
                        <input type="number" id="cantidad-producto" class="form-control form-control-lg text-center" value="1" min="1" max="<?= $productoActual['stock'] ?>">
                    </div>
                    <button class="btn btn-primary btn-lg flex-grow-1 add-to-cart" 
                            data-id="<?= $productoActual['id'] ?>" 
                            data-nombre="<?= htmlspecialchars($productoActual['nombre']) ?>" 
                            data-precio="<?= $productoActual['precio'] ?>" 
                            data-imagen="<?= htmlspecialchars($productoActual['imagen']) ?>"
                            data-stock="<?= $productoActual['stock'] ?>">
                        <i class="fa-solid fa-cart-plus me-2"></i> Agregar al Carrito
                    </button>
                </div>
            </div>
        </div>
    <?php else: ?>
        <div class="text-center py-5">
            <div class="p-5 bg-white rounded shadow-sm border">
                <i class="fa-solid fa-triangle-exclamation fs-1 text-warning mb-3"></i>
                <h2 class="fw-bold">Producto no encontrado</h2>
                <p class="text-muted">El producto que buscas no existe o ha sido eliminado.</p>
                <a href="/productos" class="btn btn-primary mt-3">Volver al Catálogo</a>
            </div>
        </div>
    <?php endif; ?>
</div>

<!-- Pequeño script para validar la cantidad máxima antes de agregar -->
<script>
document.addEventListener('DOMContentLoaded', () => {
    const inputCantidad = document.getElementById('cantidad-producto');
    if(inputCantidad) {
        inputCantidad.addEventListener('change', (e) => {
            let max = parseInt(e.target.max);
            let val = parseInt(e.target.value);
            if(val > max) e.target.value = max;
            if(val < 1) e.target.value = 1;
        });
    }
});
</script>

<?php require_once 'includes/footer.php'; ?>
