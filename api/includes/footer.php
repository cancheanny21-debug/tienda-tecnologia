<!-- Pie de página -->
<footer class="bg-primary-dark text-white pt-5 pb-3 mt-auto">
    <div class="container">
        <div class="row gy-4">
            <div class="col-md-4">
                <h5 class="fw-bold mb-3 d-flex align-items-center">
                    <i class="fa-solid fa-microchip me-2 text-info"></i><?= SITE_NAME ?>
                </h5>
                <p class="text-white-50">Tu tienda de tecnología de confianza en Ecuador. Ofrecemos los mejores productos a los mejores precios.</p>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-3">Enlaces Rápidos</h5>
                <ul class="list-unstyled">
                    <li><a href="/" class="text-white-50 text-decoration-none footer-link">Inicio</a></li>
                    <li><a href="/productos" class="text-white-50 text-decoration-none footer-link">Catálogo</a></li>
                    <li><a href="/nosotros" class="text-white-50 text-decoration-none footer-link">Nosotros</a></li>
                    <li><a href="/contacto" class="text-white-50 text-decoration-none footer-link">Contacto</a></li>
                </ul>
            </div>
            <div class="col-md-4">
                <h5 class="fw-bold mb-3">Contacto</h5>
                <ul class="list-unstyled text-white-50">
                    <li><i class="fa-solid fa-location-dot me-2"></i> Quito, Ecuador</li>
                    <li><i class="fa-solid fa-envelope me-2"></i> info@techstore.ec</li>
                    <li><i class="fa-solid fa-phone me-2"></i> +593 99 123 4567</li>
                </ul>
            </div>
        </div>
        <hr class="border-secondary mt-4 mb-3">
        <div class="text-center text-white-50">
            <small>&copy; <?= date('Y') ?> <?= SITE_NAME ?>. Proyecto Académico.</small>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Lógica del Carrito y App -->
<script src="/assets/js/app.js"></script>
</body>
</html>
