<nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
    <div class="container">
        <a class="navbar-brand fw-bold text-primary" href="<?= BASE_URL ?>index.php">
            <i class="bi bi-cpu"></i> TechStore
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>index.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>productos.php">Catálogo</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Categorías
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>categorias.php?cat=Laptops">Laptops</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>categorias.php?cat=Smartphones">Smartphones</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>categorias.php?cat=Accesorios">Accesorios</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>categorias.php?cat=Monitores">Monitores</a></li>
                        <li><a class="dropdown-item" href="<?= BASE_URL ?>categorias.php?cat=Componentes">Componentes</a></li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>nosotros.php">Nosotros</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?= BASE_URL ?>contacto.php">Contacto</a>
                </li>
            </ul>
            <form class="d-flex" action="<?= BASE_URL ?>buscar.php" method="GET">
                <input class="form-control me-2" type="search" name="q"
                    placeholder="Buscar productos..." aria-label="Buscar" required>
                <button class="btn btn-outline-primary" type="submit">
                    <i class="bi bi-search"></i>
                </button>
            </form>
        </div>
    </div>
</nav>
