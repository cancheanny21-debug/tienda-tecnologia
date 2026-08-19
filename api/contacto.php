<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';

$mensajeEnviado = false;
$error = false;

// Procesamiento básico del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Aplicar htmlspecialchars para evitar XSS
    $nombre = isset($_POST['nombre']) ? htmlspecialchars(trim($_POST['nombre'])) : '';
    $correo = isset($_POST['correo']) ? filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL) : '';
    $asunto = isset($_POST['asunto']) ? htmlspecialchars(trim($_POST['asunto'])) : '';
    $mensaje = isset($_POST['mensaje']) ? htmlspecialchars(trim($_POST['mensaje'])) : '';

    // Validación básica en servidor
    if (!empty($nombre) && !empty($correo) && !empty($asunto) && !empty($mensaje) && filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        // En un caso real aquí enviaríamos un email con mail() o un servicio SMTP.
        // Para este proyecto académico, solo simulamos éxito.
        $mensajeEnviado = true;
    } else {
        $error = true;
    }
}
?>

<div class="container py-5 min-vh-100-custom">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            
            <div class="text-center mb-5">
                <h2 class="fw-bold">Contáctanos</h2>
                <p class="text-muted">¿Tienes alguna duda o consulta? Escríbenos y te responderemos lo antes posible.</p>
            </div>

            <?php if ($mensajeEnviado): ?>
                <div class="alert alert-success d-flex align-items-center shadow-sm p-4 rounded-4 mb-4" role="alert">
                    <i class="fa-solid fa-circle-check fs-1 me-4"></i>
                    <div>
                        <h4 class="alert-heading fw-bold mb-1">¡Mensaje enviado con éxito!</h4>
                        <p class="mb-0">Gracias por contactarnos, <strong><?= $nombre ?></strong>. Hemos recibido tu mensaje sobre "<em><?= $asunto ?></em>". Nos comunicaremos contigo pronto a <?= $correo ?>.</p>
                    </div>
                </div>
                <div class="text-center">
                    <a href="/" class="btn btn-primary px-4">Volver al Inicio</a>
                </div>
            <?php else: ?>
                
                <?php if ($error): ?>
                    <div class="alert alert-danger shadow-sm mb-4" role="alert">
                        <i class="fa-solid fa-triangle-exclamation me-2"></i> Por favor, completa todos los campos correctamente.
                    </div>
                <?php endif; ?>

                <div class="card border-0 shadow-sm rounded-4 overflow-hidden">
                    <div class="card-body p-5">
                        <form id="form-contacto" action="/contacto" method="POST" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="nombre" class="form-label fw-semibold">Nombre Completo</label>
                                    <input type="text" class="form-control form-control-lg bg-light" id="nombre" name="nombre" required placeholder="Ej. Juan Pérez">
                                    <div class="invalid-feedback">Por favor ingresa tu nombre.</div>
                                </div>
                                
                                <div class="col-md-6">
                                    <label for="correo" class="form-label fw-semibold">Correo Electrónico</label>
                                    <input type="email" class="form-control form-control-lg bg-light" id="correo" name="correo" required placeholder="ejemplo@correo.com">
                                    <div class="invalid-feedback">Por favor ingresa un correo válido.</div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="asunto" class="form-label fw-semibold">Asunto</label>
                                    <input type="text" class="form-control form-control-lg bg-light" id="asunto" name="asunto" required placeholder="¿Sobre qué nos quieres consultar?">
                                    <div class="invalid-feedback">El asunto es obligatorio.</div>
                                </div>
                                
                                <div class="col-12">
                                    <label for="mensaje" class="form-label fw-semibold">Mensaje</label>
                                    <textarea class="form-control form-control-lg bg-light" id="mensaje" name="mensaje" rows="5" required placeholder="Escribe tu mensaje aquí..."></textarea>
                                    <div class="invalid-feedback">El mensaje no puede estar vacío.</div>
                                </div>
                                
                                <div class="col-12 mt-4 text-end">
                                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                                        <i class="fa-solid fa-paper-plane me-2"></i> Enviar Mensaje
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            <?php endif; ?>
            
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
