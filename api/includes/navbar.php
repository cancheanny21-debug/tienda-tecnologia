<!-- Barra de navegación principal -->
<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top shadow-sm">
    <div class="container">
        <!-- Logotipo / Nombre de la tienda -->
        <a class="navbar-brand fw-bold" href="<?= base_url('') ?>">
            <i class="bi bi-cpu"></i> <?= APP_NAME ?>
        </a>
        
        <!-- Botón para versión móvil -->
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarPrincipal" aria-controls="navbarPrincipal" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        <!-- Enlaces de navegación -->
        <div class="collapse navbar-collapse" id="navbarPrincipal">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('') ?>">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('productos') ?>">Productos</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('nosotros') ?>">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= base_url('contacto') ?>">Contacto</a>
                </li>
            </ul>
            
            <!-- Carrito de compras -->
            <div class="d-flex">
                <a href="<?= base_url('carrito') ?>" class="btn btn-outline-light position-relative">
                    <i class="bi bi-cart3"></i> Carrito
                    <span id="contador-carrito" class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        0
                    </span>
                </a>
            </div>
        </div>
    </div>
</nav>
