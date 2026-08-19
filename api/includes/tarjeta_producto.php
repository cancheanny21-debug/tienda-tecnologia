<?php
// Este archivo requiere que exista la variable $producto
if (!isset($producto)) return;
?>
<div class="col-md-4 col-lg-3 mb-4">
    <div class="card h-100 product-card shadow-sm border-0">
        <img src="<?= htmlspecialchars($producto['imagen']) ?>" class="card-img-top" alt="<?= htmlspecialchars($producto['nombre']) ?>" style="height: 200px; object-fit: cover;">
        <div class="card-body d-flex flex-column">
            <div class="d-flex justify-content-between mb-2">
                <span class="badge bg-info text-dark"><?= htmlspecialchars($producto['categoria']) ?></span>
                <span class="text-success fw-bold">$<?= number_format($producto['precio'], 2) ?></span>
            </div>
            <h5 class="card-title text-truncate" title="<?= htmlspecialchars($producto['nombre']) ?>"><?= htmlspecialchars($producto['nombre']) ?></h5>
            <p class="card-text text-muted small flex-grow-1" style="display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden;">
                <?= htmlspecialchars($producto['descripcion']) ?>
            </p>
            <div class="mt-auto">
                <a href="/producto?id=<?= $producto['id'] ?>" class="btn btn-outline-primary w-100 mb-2">Ver Detalles</a>
                <button class="btn btn-primary w-100 add-to-cart" 
                        data-id="<?= $producto['id'] ?>" 
                        data-nombre="<?= htmlspecialchars($producto['nombre']) ?>" 
                        data-precio="<?= $producto['precio'] ?>" 
                        data-imagen="<?= htmlspecialchars($producto['imagen']) ?>"
                        data-stock="<?= $producto['stock'] ?>">
                    <i class="fa-solid fa-cart-plus"></i> Agregar
                </button>
            </div>
        </div>
    </div>
</div>
