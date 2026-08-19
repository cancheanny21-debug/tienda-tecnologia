<footer class="bg-dark text-white pt-5 pb-4 mt-5">
    <div class="container text-center text-md-start">
        <div class="row text-center text-md-start">
            <div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold text-primary">TechStore</h5>
                <p>Tu destino número uno para la mejor tecnología. Innovación y calidad al alcance de todos.</p>
            </div>
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold">Enlaces</h5>
                <p><a href="<?= BASE_URL ?>index.php" class="text-white text-decoration-none">Inicio</a></p>
                <p><a href="<?= BASE_URL ?>productos.php" class="text-white text-decoration-none">Catálogo</a></p>
                <p><a href="<?= BASE_URL ?>nosotros.php" class="text-white text-decoration-none">Nosotros</a></p>
            </div>
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
                <h5 class="text-uppercase mb-4 fw-bold">Contacto</h5>
                <p><i class="bi bi-envelope me-3"></i> info@techstore.com</p>
                <p><i class="bi bi-phone me-3"></i> +1 234 567 890</p>
                <p><a href="<?= BASE_URL ?>contacto.php" class="text-white text-decoration-none"><i class="bi bi-chat-dots me-3"></i> Formulario</a></p>
            </div>
        </div>
        <hr class="mb-4">
        <div class="row align-items-center">
            <div class="col-md-7 col-lg-8">
                <p>&copy; <?php echo date('Y'); ?> Todos los derechos reservados por:
                    <strong class="text-primary">TechStore</strong>
                </p>
            </div>
            <div class="col-md-5 col-lg-4">
                <div class="text-center text-md-end">
                    <ul class="list-unstyled list-inline">
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="bi bi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="bi bi-twitter-x"></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="bi bi-instagram"></i></a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</footer>

<!-- Bootstrap 5 JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<!-- Custom JS -->
<script src="<?= BASE_URL ?>assets/js/script.js"></script>
</body>
</html>
