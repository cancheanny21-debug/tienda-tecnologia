<?php
/**
 * Calcula la URL base del proyecto automáticamente.
 * Funciona en cualquier subdirectorio de XAMPP (ej: localhost/tienda-tecnologia/).
 */
if (!defined('BASE_URL')) {
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? 'https' : 'http';
    $host     = $_SERVER['HTTP_HOST'];
    // Obtiene el directorio del script que hizo el include, no el de este archivo
    $script   = $_SERVER['SCRIPT_NAME'];
    $dir      = rtrim(dirname($script), '/\\');
    define('BASE_URL', $protocol . '://' . $host . $dir . '/');
}
$base_url = BASE_URL;
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TechStore Ecuador - La mejor tecnología</title>
    <meta name="description" content="TechStore Ecuador: Encuentra laptops, smartphones, accesorios y más al mejor precio. Innovación y calidad al alcance de todos.">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600;800&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>assets/css/estilos.css">
</head>
<body class="bg-light">
