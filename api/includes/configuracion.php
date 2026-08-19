<?php
// Configuración global del sitio
define('SITE_NAME', 'TechStore Ecuador');

// Calcula la URL base automáticamente para funcionar en XAMPP (subdirectorio)
// y en Vercel (raíz). Ejemplo local: http://localhost/tienda-tecnologia/api/
if (!defined('BASE_URL')) {
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
    $host     = $_SERVER['HTTP_HOST'];
    $dir      = rtrim(dirname($_SERVER['SCRIPT_NAME']), '/\\');
    define('BASE_URL', $protocol . '://' . $host . $dir . '/');
}

define('SITE_URL', BASE_URL);
?>
