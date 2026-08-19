<?php
$titulo = 'Contacto - TechStore Ecuador';
require_once 'includes/header.php';
require_once 'includes/navbar.php';

// Variables para mensajes
$mensaje_exito = '';
$errores = [];

// Procesar formulario mediante POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Validar y sanear campos
    $nombre = isset($_POST['nombre']) ? trim($_POST['nombre']) : '';
    $correo = isset($_POST['correo']) ? trim($_POST['correo']) : '';
    $asunto = isset($_POST['asunto']) ? trim($_POST['asunto']) : '';
    $mensaje = isset($_POST['mensaje']) ? trim($_POST['mensaje']) : '';
    
    if (empty($nombre)) {
        $errores[] = 'El nombre es obligatorio.';
    }
    
    if (empty($correo) || !filter_var($correo, FILTER_VALIDATE_EMAIL)) {
        $errores[] = 'Por favor, ingrese un correo electrónico válido.';
    }
    
    if (empty($asunto)) {
        $errores[] = 'El asunto es obligatorio.';
    }
    
    if (empty($mensaje)) {
        $errores[] = 'El mensaje no puede estar vacío.';
    }
    
    // Si no hay errores, simulamos el envío exitoso
    if (empty($errores)) {
        // En una app real, aquí se usaría mail() o una librería como PHPMailer.
        // Aquí solo mostramos el mensaje de éxito.
        $mensaje_exito = 'Mensaje recibido correctamente. Gracias por contactarnos, ' . htmlspecialchars($nombre) . '.';
    }
}
?>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1 class="fw-bold mb-4 text-center">Contáctanos</h1>
            
            <?php if (!empty($mensaje_exito)): ?>
                <div class="alert alert-success shadow-sm">
                    <i class="bi bi-check-circle-fill me-2"></i>
                    <?= $mensaje_exito ?>
                </div>
            <?php endif; ?>
            
            <?php if (!empty($errores)): ?>
                <div class="alert alert-danger shadow-sm">
                    <ul class="mb-0">
                        <?php foreach ($errores as $error): ?>
                            <li><?= htmlspecialchars($error) ?></li>
                        <?php endforeach; ?>
                    </ul>
                </div>
            <?php endif; ?>
            
            <div class="card shadow-sm">
                <div class="card-body p-4">
                    <form action="<?= base_url('contacto') ?>" method="POST" id="form-contacto">
                        <div class="mb-3">
                            <label for="nombre" class="form-label fw-bold">Nombre completo</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" required value="<?= isset($nombre) && empty($mensaje_exito) ? htmlspecialchars($nombre) : '' ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="correo" class="form-label fw-bold">Correo electrónico</label>
                            <input type="email" class="form-control" id="correo" name="correo" required value="<?= isset($correo) && empty($mensaje_exito) ? htmlspecialchars($correo) : '' ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="asunto" class="form-label fw-bold">Asunto</label>
                            <input type="text" class="form-control" id="asunto" name="asunto" required value="<?= isset($asunto) && empty($mensaje_exito) ? htmlspecialchars($asunto) : '' ?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="mensaje" class="form-label fw-bold">Mensaje</label>
                            <textarea class="form-control" id="mensaje" name="mensaje" rows="5" required><?= isset($mensaje) && empty($mensaje_exito) ? htmlspecialchars($mensaje) : '' ?></textarea>
                        </div>
                        
                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary btn-lg">
                                <i class="bi bi-send me-2"></i> Enviar mensaje
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <div class="mt-5 text-center">
                <h5>Otras formas de contacto</h5>
                <p class="text-muted"><i class="bi bi-envelope"></i> info@techstore.edu.ec | <i class="bi bi-telephone"></i> +593 99 123 4567</p>
            </div>
        </div>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
