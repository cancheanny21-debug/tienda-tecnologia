<?php
$titulo = 'Inicio - TechStore Ecuador';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'data/productos.php';
require_once 'includes/tarjeta_producto.php';
?>

<!-- Sección Hero -->
<section class="hero-section bg-primary text-white text-center py-5">
    <div class="container py-5">
        <h1 class="display-4 fw-bold">Bienvenido a TechStore Ecuador</h1>
        <p class="lead mb-4">Tu destino confiable para los mejores productos tecnológicos.</p>
    </div>
</section>

<!-- Beneficios -->
<section class="py-5 bg-light">
    <div class="container">
        <div class="row text-center">
            <div class="col-md-3 mb-4">
                <div class="p-3">
                    <i class="bi bi-star-fill text-warning fs-1 mb-3"></i>
                    <h5>Productos de calidad</h5>
                    <p class="text-muted">Garantía en todos nuestros artículos.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-3">
                    <i class="bi bi-tags-fill text-primary fs-1 mb-3"></i>
                    <h5>Precios competitivos</h5>
                    <p class="text-muted">Las mejores ofertas del mercado.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-3">
                    <i class="bi bi-headset text-success fs-1 mb-3"></i>
                    <h5>Atención al cliente</h5>
                    <p class="text-muted">Soporte técnico y asesoría experta.</p>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="p-3">
                    <i class="bi bi-lightning-charge-fill text-danger fs-1 mb-3"></i>
                    <h5>Compra fácil y rápida</h5>
                    <p class="text-muted">Proceso optimizado y seguro.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Productos Destacados -->
<section class="py-5">
    <div class="container">
        <h2 class="text-center fw-bold mb-5">Productos Destacados</h2>
        <div class="row">
            <?php
            $contador = 0;
            foreach ($productos as $producto) {
                if ($producto['destacado'] && $contador < 3) {
                    mostrarTarjetaProducto($producto);
                    $contador++;
                }
            }
            ?>
        </div>
        <div class="text-center mt-4">
            <a href="<?= base_url('productos') ?>" class="btn btn-outline-primary">Ver catálogo completo</a>
        </div>
    </div>
</section>

<?php require_once 'includes/footer.php'; ?>
