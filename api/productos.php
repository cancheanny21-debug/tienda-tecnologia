<?php
$titulo = 'Catálogo - TechStore Ecuador';
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'data/productos.php';
require_once 'includes/tarjeta_producto.php';

// Obtener parámetros GET para búsqueda, filtrado y ordenamiento
$busqueda = isset($_GET['buscar']) ? trim($_GET['buscar']) : '';
$categoria = isset($_GET['categoria']) ? $_GET['categoria'] : '';
$orden = isset($_GET['orden']) ? $_GET['orden'] : '';

// Filtrar productos
$productos_filtrados = array_filter($productos, function($p) use ($busqueda, $categoria) {
    // Filtrar por categoría
    if (!empty($categoria) && $categoria !== 'Todos' && $p['categoria'] !== $categoria) {
        return false;
    }
    // Filtrar por búsqueda (nombre o descripción)
    if (!empty($busqueda)) {
        $busqueda_lower = strtolower($busqueda);
        $nombre_lower = strtolower($p['nombre']);
        if (strpos($nombre_lower, $busqueda_lower) === false) {
            return false;
        }
    }
    return true;
});

// Ordenar productos
if ($orden === 'precio_asc') {
    usort($productos_filtrados, function($a, $b) {
        return $a['precio'] <=> $b['precio'];
    });
} elseif ($orden === 'precio_desc') {
    usort($productos_filtrados, function($a, $b) {
        return $b['precio'] <=> $a['precio'];
    });
}

// Obtener categorías únicas para el selector
$categorias = array_unique(array_column($productos, 'categoria'));
sort($categorias);
?>

<div class="container py-5">
    <h1 class="fw-bold mb-4">Catálogo de Productos</h1>
    
    <!-- Filtros y Búsqueda -->
    <div class="card shadow-sm mb-5">
        <div class="card-body">
            <form action="<?= base_url('productos') ?>" method="GET" class="row g-3 align-items-end">
                <div class="col-md-4">
                    <label for="buscar" class="form-label">Buscar producto</label>
                    <input type="text" class="form-control" id="buscar" name="buscar" value="<?= htmlspecialchars($busqueda) ?>" placeholder="Ej. Laptop">
                </div>
                <div class="col-md-3">
                    <label for="categoria" class="form-label">Categoría</label>
                    <select class="form-select" id="categoria" name="categoria">
                        <option value="Todos">Todas las categorías</option>
                        <?php foreach ($categorias as $cat): ?>
                            <option value="<?= htmlspecialchars($cat) ?>" <?= $categoria === $cat ? 'selected' : '' ?>><?= htmlspecialchars($cat) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="col-md-3">
                    <label for="orden" class="form-label">Ordenar por</label>
                    <select class="form-select" id="orden" name="orden">
                        <option value="">Relevancia</option>
                        <option value="precio_asc" <?= $orden === 'precio_asc' ? 'selected' : '' ?>>Precio: Menor a Mayor</option>
                        <option value="precio_desc" <?= $orden === 'precio_desc' ? 'selected' : '' ?>>Precio: Mayor a Menor</option>
                    </select>
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filtrar</button>
                </div>
            </form>
        </div>
    </div>

    <!-- Lista de productos -->
    <div class="row">
        <?php if (empty($productos_filtrados)): ?>
            <div class="col-12 text-center py-5">
                <div class="alert alert-info">
                    <i class="bi bi-info-circle fs-4 d-block mb-2"></i>
                    No encontramos productos que coincidan con tu búsqueda.
                </div>
                <a href="<?= base_url('productos') ?>" class="btn btn-outline-primary mt-3">Limpiar filtros</a>
            </div>
        <?php else: ?>
            <?php foreach ($productos_filtrados as $producto): ?>
                <?php mostrarTarjetaProducto($producto); ?>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
