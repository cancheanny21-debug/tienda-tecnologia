<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';

$mensaje_exito = "";
$mensaje_error = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recibir y sanear datos
    $nombre = htmlspecialchars(trim($_POST['nombre']));
    $correo = filter_var(trim($_POST['correo']), FILTER_SANITIZE_EMAIL);
    $asunto = htmlspecialchars(trim($_POST['asunto']));
    $mensaje = htmlspecialchars(trim($_POST['mensaje']));

    // Validación básica en PHP
    if (empty($nombre) || empty($correo) || empty($asunto) || empty($mensaje)) {
        $mensaje_error = "Todos los campos son obligatorios.";
    } elseif (!filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $mensaje_error = "El formato del correo no es válido.";
    } else {
        // En un entorno real, aquí se usaría mail() o PHPMailer para enviar el correo.
        // Para este simulador, asumiremos éxito directo.
        $mensaje_exito = "¡Gracias por contactarnos, $nombre! Hemos recibido tu mensaje y te responderemos pronto.";
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="text-center mb-5">
                <h1 class="fw-bold text-primary">Contáctanos</h1>
                <p class="text-muted fs-5">¿Tienes alguna duda o consulta? Escríbenos, estaremos encantados de ayudarte.</p>
            </div>

            <div class="card border-0 shadow-lg rounded-4 p-4 p-md-5">
                <?php if ($mensaje_exito): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle-fill me-2"></i> <?= $mensaje_exito ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <?php if ($mensaje_error): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="bi bi-exclamation-triangle-fill me-2"></i> <?= $mensaje_error ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                <?php endif; ?>

                <form action="contacto.php" method="POST">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label for="nombre" class="form-label fw-bold">Nombre Completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Ej. Juan Pérez" required>
                        </div>
                        <div class="col-md-6">
                            <label for="correo" class="form-label fw-bold">Correo Electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" placeholder="Ej. juan@correo.com" required>
                        </div>
                        <div class="col-12">
                            <label for="asunto" class="form-label fw-bold">Asunto</label>
                            <input type="text" class="form-control" id="asunto" name="asunto" placeholder="¿Sobre qué nos escribes?" required>
                        </div>
                        <div class="col-12">
                            <label for="mensaje" class="form-label fw-bold">Mensaje</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
                        </div>
                        <div class="col-12 text-end mt-4">
                            <button type="submit" class="btn btn-primary px-5 py-2 fw-bold"><i class="bi bi-send me-2"></i> Enviar Mensaje</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
