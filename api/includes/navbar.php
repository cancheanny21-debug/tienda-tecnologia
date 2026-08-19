<!-- Barra de Navegación -->
<nav class="navbar navbar-expand-lg navbar-dark bg-primary-dark sticky-top shadow-sm">
    <div class="container">
        <a class="navbar-brand d-flex align-items-center" href="<?= BASE_URL ?>">
            <i class="fa-solid fa-microchip me-2 fs-3 text-info"></i>
            <span class="fw-bold"><?= SITE_NAME ?></span>
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>productos.php">Catálogo</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>nosotros.php">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>contacto.php">Contacto</a>
                </li>
            </ul>
            <div class="d-flex align-items-center">
                <a href="<?= BASE_URL ?>carrito.php" class="btn btn-outline-info position-relative">
                    <i class="fa-solid fa-cart-shopping"></i> Carrito
                    <span id="cart-badge" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger d-none">
                        0
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>
