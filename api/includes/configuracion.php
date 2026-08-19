<?php
// Archivo de configuración básica
define('APP_NAME', 'TechStore Ecuador');
define('APP_VERSION', '1.0.0');

// URL base para los enlaces
$base_url = '/';

// Función auxiliar para generar URLs correctas
function base_url($path = '') {
    // Detectar si estamos en localhost (XAMPP o servidor local de PHP) usando HTTP_HOST
    $host = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : '';
    $es_localhost = (strpos($host, 'localhost') !== false || strpos($host, '127.0.0.1') !== false);
    
    if (!$es_localhost) {
        // En Vercel usamos rutas limpias desde la raíz
        return '/' . ltrim($path, '/');
    }
    
    // Lógica para XAMPP / Localhost sin .htaccess
    $base_dir = str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME']));
    $is_asset = strpos($path, 'assets/') === 0;
    
    if ($is_asset) {
        // Si es un asset (CSS/JS/IMG), debe apuntar a la raíz del proyecto, fuera de api/
        if (substr($base_dir, -4) === '/api') {
            $base_dir = substr($base_dir, 0, -4);
        }
    } else {
        // Si es un enlace de página y estamos en local, forzamos que apunte a la carpeta api/
        if (substr($base_dir, -4) !== '/api') {
            $base_dir = rtrim($base_dir, '/') . '/api';
        }
        
        // Agregamos .php si no lo tiene (para que XAMPP encuentre el archivo)
        if ($path !== '' && strpos($path, '.php') === false) {
            if (strpos($path, '?') !== false) {
                $path = str_replace('?', '.php?', $path);
            } else {
                $path .= '.php';
            }
        }
    }
    
    // Limpiar barras duplicadas
    if ($base_dir === '/' || $base_dir === '\\') {
        $base_dir = '';
    }
    
    return rtrim($base_dir, '/') . '/' . ltrim($path, '/');
}
?>
