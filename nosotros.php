<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-lg-6 mb-4 mb-lg-0 text-center">
            <!-- Imagen generada representativa de la empresa o equipo -->
            <img src="https://images.unsplash.com/photo-1553877522-43269d4ea984?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" alt="Nuestro Equipo" class="img-fluid rounded-4 shadow-lg">
        </div>
        <div class="col-lg-6">
            <h1 class="fw-bold mb-4 text-primary">Sobre TechStore</h1>
            <p class="lead text-muted" style="line-height: 1.8;">
                En TechStore, somos apasionados por la tecnología. Desde nuestra fundación, nos hemos dedicado a traer los mejores equipos y accesorios al mercado, asegurando que nuestros clientes siempre estén a la vanguardia.
            </p>
            <p class="text-muted" style="line-height: 1.8;">
                Trabajamos de la mano con las marcas líderes a nivel mundial para garantizar productos de alta calidad, durabilidad y con el mejor rendimiento. Tu satisfacción es nuestra principal métrica de éxito.
            </p>
        </div>
    </div>

    <div class="row g-4 text-center mt-5">
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 rounded-4" style="background-color: var(--white);">
                <i class="bi bi-bullseye text-primary mb-3" style="font-size: 3rem;"></i>
                <h3 class="fw-bold">Misión</h3>
                <p class="text-muted mt-3">
                    Proveer soluciones tecnológicas innovadoras y de alta calidad que mejoren la vida y productividad de nuestros clientes, ofreciendo una experiencia de compra excepcional.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 rounded-4" style="background-color: var(--white);">
                <i class="bi bi-eye text-primary mb-3" style="font-size: 3rem;"></i>
                <h3 class="fw-bold">Visión</h3>
                <p class="text-muted mt-3">
                    Ser la plataforma líder en venta de tecnología a nivel nacional, reconocida por nuestra excelencia en servicio al cliente y nuestro extenso catálogo de productos premium.
                </p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card h-100 border-0 shadow-sm p-4 rounded-4" style="background-color: var(--white);">
                <i class="bi bi-heart text-primary mb-3" style="font-size: 3rem;"></i>
                <h3 class="fw-bold">Valores</h3>
                <ul class="list-unstyled text-muted mt-3">
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Innovación constante</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Transparencia total</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Compromiso con el cliente</li>
                    <li class="mb-2"><i class="bi bi-check-circle-fill text-success me-2"></i> Calidad garantizada</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
