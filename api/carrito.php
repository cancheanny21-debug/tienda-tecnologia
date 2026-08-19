<?php
$titulo = 'Carrito de Compras - TechStore Ecuador';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container py-5">
    <h1 class="fw-bold mb-4"><i class="bi bi-cart3"></i> Tu Carrito de Compras</h1>
    
    <div class="row">
        <!-- Columna de productos (generada dinámicamente por JS) -->
        <div class="col-lg-8 mb-4">
            <div class="card shadow-sm">
                <div class="card-body" id="contenedor-carrito">
                    <!-- Mensaje mientras carga o si está vacío -->
                    <div class="text-center py-4" id="mensaje-carrito-vacio">
                        <i class="bi bi-cart-x text-muted" style="font-size: 3rem;"></i>
                        <p class="lead mt-3">Tu carrito está vacío.</p>
                        <a href="<?= base_url('productos') ?>" class="btn btn-primary mt-2">Ir al catálogo</a>
                    </div>
                    
                    <!-- Aquí se insertan los productos vía JavaScript -->
                    <div id="lista-productos-carrito" style="display: none;">
                        <ul class="list-group list-group-flush" id="items-carrito">
                            <!-- JS inyecta los li aquí -->
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Columna de resumen (Actualizada por JS) -->
        <div class="col-lg-4">
            <div class="card shadow-sm sticky-top" style="top: 80px;">
                <div class="card-header bg-light fw-bold">
                    Resumen de Compra
                </div>
                <div class="card-body">
                    <div class="d-flex justify-content-between mb-3">
                        <span>Productos (<span id="resumen-cantidad">0</span>)</span>
                        <span id="resumen-subtotal">$0.00</span>
                    </div>
                    <div class="d-flex justify-content-between mb-3">
                        <span>Envío</span>
                        <span class="text-success">Gratis</span>
                    </div>
                    <hr>
                    <div class="d-flex justify-content-between mb-4">
                        <strong class="fs-5">Total</strong>
                        <strong class="fs-5 text-primary" id="resumen-total">$0.00</strong>
                    </div>
                    
                    <button class="btn btn-success w-100 mb-2" id="btn-procesar-compra" disabled>
                        Proceder al pago
                    </button>
                    <button class="btn btn-outline-danger w-100" id="btn-vaciar-carrito" disabled>
                        Vaciar Carrito
                    </button>
                    
                    <div class="mt-3 small text-muted text-center">
                        <i class="bi bi-shield-check"></i> Proyecto académico. No se realizan cobros reales.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
