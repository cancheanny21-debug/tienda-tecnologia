<?php
$titulo = 'Nosotros - TechStore Ecuador';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container py-5">
    <div class="row align-items-center mb-5">
        <div class="col-md-6 mb-4 mb-md-0">
            <h1 class="fw-bold mb-3">Sobre TechStore Ecuador</h1>
            <p class="lead">Somos un proyecto académico desarrollado para demostrar los principios fundamentales del desarrollo web Full Stack.</p>
            <p>El propósito de esta aplicación es integrar conocimientos de backend con PHP, frontend con HTML, CSS, y Bootstrap 5, junto con la gestión del estado del cliente mediante JavaScript puro y <code>localStorage</code>.</p>
        </div>
        <div class="col-md-6 text-center">
            <div class="p-5 bg-light rounded shadow-sm">
                <i class="bi bi-laptop text-primary" style="font-size: 5rem;"></i>
                <h3 class="mt-3">Tecnología al alcance</h3>
            </div>
        </div>
    </div>
    
    <div class="row mb-5">
        <div class="col-12">
            <h2 class="fw-bold border-bottom pb-2 mb-4">Tecnologías Utilizadas</h2>
        </div>
        <div class="col-md-3 col-6 mb-4 text-center">
            <div class="card border-0 shadow-sm h-100 py-3">
                <i class="bi bi-filetype-php fs-1 text-primary mb-2"></i>
                <h5 class="fw-bold">PHP 8</h5>
                <p class="small text-muted mb-0">Lógica de servidor y enrutamiento.</p>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4 text-center">
            <div class="card border-0 shadow-sm h-100 py-3">
                <i class="bi bi-bootstrap fs-1 text-purple" style="color: #7952b3;"></i>
                <h5 class="fw-bold">Bootstrap 5</h5>
                <p class="small text-muted mb-0">Diseño responsive y componentes.</p>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4 text-center">
            <div class="card border-0 shadow-sm h-100 py-3">
                <i class="bi bi-filetype-js fs-1 text-warning mb-2"></i>
                <h5 class="fw-bold">JavaScript</h5>
                <p class="small text-muted mb-0">Interacción y carrito con localStorage.</p>
            </div>
        </div>
        <div class="col-md-3 col-6 mb-4 text-center">
            <div class="card border-0 shadow-sm h-100 py-3">
                <i class="bi bi-cloud-arrow-up fs-1 text-dark mb-2"></i>
                <h5 class="fw-bold">Vercel</h5>
                <p class="small text-muted mb-0">Despliegue serverless de la aplicación.</p>
            </div>
        </div>
    </div>
    
    <div class="row">
        <div class="col-12">
            <h2 class="fw-bold border-bottom pb-2 mb-4">Equipo de Desarrollo</h2>
            <div class="card shadow-sm">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item d-flex align-items-center py-3">
                            <i class="bi bi-person-circle fs-3 text-secondary me-3"></i>
                            <span class="fs-5">Integrante 1: Darwin Cabezas</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center py-3">
                            <i class="bi bi-person-circle fs-3 text-secondary me-3"></i>
                            <span class="fs-5">Integrante 2: Anny Canche</span>
                        </li>
                        <li class="list-group-item d-flex align-items-center py-3">
                            <i class="bi bi-person-circle fs-3 text-secondary me-3"></i>
                            <span class="fs-5">Integrante 3: Mady Colobon</span>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
