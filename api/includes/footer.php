<!-- Pie de página reutilizable -->
<footer class="bg-dark text-light pt-5 pb-3 mt-auto">
    <div class="container">
        <div class="row">
            <!-- Columna 1: Información de la tienda -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold"><i class="bi bi-cpu"></i> <?= APP_NAME ?></h5>
                <p class="text-muted">Tu tienda de tecnología de confianza. Ofrecemos los mejores productos con calidad garantizada.</p>
            </div>
            
            <!-- Columna 2: Enlaces rápidos -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="<?= base_url('') ?>" class="text-muted text-decoration-none">Inicio</a></li>
                    <li><a href="<?= base_url('productos') ?>" class="text-muted text-decoration-none">Catálogo</a></li>
                    <li><a href="<?= base_url('nosotros') ?>" class="text-muted text-decoration-none">Sobre Nosotros</a></li>
                    <li><a href="<?= base_url('contacto') ?>" class="text-muted text-decoration-none">Contacto</a></li>
                </ul>
            </div>
            
            <!-- Columna 3: Información Académica -->
            <div class="col-md-4 mb-4">
                <h5 class="fw-bold">Proyecto Académico</h5>
                <p class="text-muted mb-1">Desarrollo y Despliegue de una Aplicación Básica en PHP.</p>
                <p class="text-muted">Integrantes: Darwin Cabezas, Anny Canche, Mady Colobon.</p>
            </div>
        </div>
        
        <hr class="border-secondary">
        
        <!-- Derechos reservados -->
        <div class="text-center text-muted">
            <p class="mb-0">&copy; <?= date('Y') ?> <?= APP_NAME ?>. Todos los derechos reservados.</p>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle (incluye Popper) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Archivo JS principal para el carrito con localStorage -->
<script src="<?= base_url('assets/js/app.js') ?>"></script>
</body>
</html>
