<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<!-- Hero Nosotros -->
<section class="bg-primary-dark text-white py-5 text-center">
    <div class="container py-4">
        <h1 class="display-4 fw-bold">Sobre <?= SITE_NAME ?></h1>
        <p class="lead text-white-50 mx-auto" style="max-width: 600px;">
            Descubre más sobre nuestro proyecto académico y el equipo detrás de esta aplicación web de comercio electrónico.
        </p>
    </div>
</section>

<div class="container py-5 min-vh-100-custom">
    <div class="row align-items-center mb-5 pb-5 border-bottom">
        <div class="col-md-6 mb-4 mb-md-0">
            <h2 class="fw-bold mb-3">Propósito del Proyecto</h2>
            <p class="text-muted fs-5">
                <?= SITE_NAME ?> es una aplicación web desarrollada como parte de un proyecto académico para demostrar los fundamentos del desarrollo web moderno utilizando <strong>PHP nativo</strong>, HTML5, CSS3, Bootstrap 5 y JavaScript puro.
            </p>
            <p class="text-muted fs-5">
                El objetivo principal es implementar un sistema de catálogo y carrito de compras funcional que mantenga su estado (a través de <code>localStorage</code>) en una arquitectura <em>serverless</em> preparada para su despliegue público en <strong>Vercel</strong>.
            </p>
            <ul class="list-unstyled mt-4 fs-5">
                <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Desarrollo Modular en PHP</li>
                <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Diseño 100% Responsive</li>
                <li class="mb-2"><i class="fa-solid fa-check text-success me-2"></i> Despliegue en Vercel</li>
            </ul>
        </div>
        <div class="col-md-6 text-center">
            <img src="https://images.unsplash.com/photo-1522071820081-009f0129c71c?auto=format&fit=crop&w=800&q=80" alt="Equipo de Desarrollo" class="img-fluid rounded-4 shadow">
        </div>
    </div>

    <!-- Integrantes -->
    <div class="text-center mb-5">
        <h2 class="fw-bold mb-2">Equipo de Desarrollo</h2>
        <p class="text-muted">Desarrolladores Web Full Stack responsables de este proyecto.</p>
    </div>

    <div class="row justify-content-center text-center g-4">
        <!-- Integrante 1 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 py-4 transition hover-lift">
                <div class="card-body">
                    <div class="d-inline-flex align-items-center justify-content-center bg-primary text-white rounded-circle mb-3" style="width: 80px; height: 80px; font-size: 32px;">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h4 class="fw-bold mb-1">Darwin Cabezas</h4>
                    <p class="text-primary mb-3">Desarrollador Backend</p>
                    <p class="text-muted small px-3">Especialista en lógica PHP, estructura de datos y configuración de despliegue serverless.</p>
                </div>
            </div>
        </div>

        <!-- Integrante 2 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 py-4 transition hover-lift">
                <div class="card-body">
                    <div class="d-inline-flex align-items-center justify-content-center bg-info text-dark rounded-circle mb-3" style="width: 80px; height: 80px; font-size: 32px;">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h4 class="fw-bold mb-1">Anny Canche</h4>
                    <p class="text-info mb-3 fw-semibold">Desarrolladora Frontend</p>
                    <p class="text-muted small px-3">Encargada del diseño UI/UX, implementación de Bootstrap y estilos dinámicos CSS.</p>
                </div>
            </div>
        </div>

        <!-- Integrante 3 -->
        <div class="col-md-4">
            <div class="card border-0 shadow-sm h-100 py-4 transition hover-lift">
                <div class="card-body">
                    <div class="d-inline-flex align-items-center justify-content-center bg-success text-white rounded-circle mb-3" style="width: 80px; height: 80px; font-size: 32px;">
                        <i class="fa-solid fa-user"></i>
                    </div>
                    <h4 class="fw-bold mb-1">Mady Colobon</h4>
                    <p class="text-success mb-3">Lógica JavaScript & QA</p>
                    <p class="text-muted small px-3">Desarrollo del carrito de compras con localStorage, validaciones y pruebas de calidad.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.hover-lift {
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}
.hover-lift:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 30px rgba(0,0,0,0.1) !important;
}
</style>

<?php require_once 'includes/footer.php'; ?>
