<?php
/**
 * Muestra una tarjeta de producto reutilizable.
 * @param array $producto Arreglo asociativo con los datos del producto.
 */
function mostrarTarjetaProducto($producto) {
    // Validar datos básicos
    $id = htmlspecialchars($producto['id']);
    $nombre = htmlspecialchars($producto['nombre']);
    $categoria = htmlspecialchars($producto['categoria']);
    $precio = number_format($producto['precio'], 2);
    $stock = (int)$producto['stock'];
    // Imagen con fallback si está vacía
    $imagen = !empty($producto['imagen']) ? htmlspecialchars($producto['imagen']) : 'assets/img/placeholder.jpg';
    
    // Determinar si hay stock
    $hayStock = $stock > 0;
    $badgeStock = $hayStock ? '<span class="badge bg-success">En Stock</span>' : '<span class="badge bg-danger">Agotado</span>';
    ?>
    <div class="col-md-4 col-sm-6 mb-4">
        <div class="card h-100 shadow-sm tarjeta-producto">
            <!-- Contenedor de la imagen -->
            <div class="position-relative">
                <img src="<?= base_url($imagen) ?>" class="card-img-top img-fluid p-3" alt="<?= $nombre ?>" style="object-fit: contain; height: 200px;">
                <div class="position-absolute top-0 end-0 p-2">
                    <?= $badgeStock ?>
                </div>
            </div>
            
            <div class="card-body d-flex flex-column">
                <p class="text-muted small mb-1"><?= $categoria ?></p>
                <h5 class="card-title text-truncate" title="<?= $nombre ?>"><?= $nombre ?></h5>
                <h4 class="text-primary fw-bold mt-auto">$<?= $precio ?></h4>
            </div>
            
            <div class="card-footer bg-white border-top-0 d-flex justify-content-between">
                <a href="<?= base_url('producto?id=' . $id) ?>" class="btn btn-outline-secondary btn-sm">Ver detalles</a>
                
                <?php if ($hayStock): ?>
                    <!-- Botón para agregar al carrito, llama a la función JS -->
                    <button class="btn btn-primary btn-sm btn-agregar-carrito" 
                            data-id="<?= $id ?>" 
                            data-nombre="<?= $nombre ?>" 
                            data-precio="<?= $producto['precio'] ?>" 
                            data-imagen="<?= $imagen ?>"
                            data-stock="<?= $stock ?>">
                        <i class="bi bi-cart-plus"></i> Agregar
                    </button>
                <?php else: ?>
                    <button class="btn btn-secondary btn-sm" disabled>Agotado</button>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php
}
?>
