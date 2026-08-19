<?php
$_SERVER['REMOTE_ADDR'] = '127.0.0.1';
$_SERVER['SCRIPT_NAME'] = '/tienda-tecnologia/api/index.php';
require_once 'api/includes/configuracion.php';
echo "Ver Productos: " . base_url('productos') . "\n";
echo "Assets: " . base_url('assets/css/estilos.css') . "\n";
echo "Raiz: " . base_url('') . "\n";
