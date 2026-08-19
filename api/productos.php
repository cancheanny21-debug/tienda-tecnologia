<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';
require_once 'data/productos.php';

// Obtener parámetros de búsqueda y filtro
$busqueda = isset($_GET['q']) ? htmlspecialchars(trim($_GET['q'])) : '';
$categoriaFiltro = isset($_GET['categoria']) ? htmlspecialchars($_GET['categoria']) : '';
$orden = isset($_GET['orden']) ? htmlspecialchars($_GET['orden']) : '';

// Extraer categorías únicas para el filtro
$categorias = array_unique(array_column($productos, 'categoria'));
sort($categorias);

// Filtrar productos
$productosFiltrados = array_filter($productos, function($p) use ($busqueda, $categoriaFiltro) {
    $coincideBusqueda = empty($busqueda) || stripos($p['nombre'], $busqueda) !== false;
    $coincideCategoria = empty($categoriaFiltro) || $p['categoria'] === $categoriaFiltro;
    return $coincideBusqueda && $coincideCategoria;
});

// Ordenar productos
if (!empty($orden)) {
    usort($productosFiltrados, function($a, $b) use ($orden) {
        if ($orden === 'precio_asc') return $a['precio'] <=> $b['precio'];
        if ($orden === 'precio_desc') return $b['precio'] <=> $a['precio'];
        return 0;
    });
}
?>

<div class="container py-5 min-vh-100-custom">
    <div class="row mb-4 align-items-center">
        <div class="col-md-4 mb-3 mb-md-0">
            <h2 class="fw-bold m-0">Catálogo de Productos</h2>
        </div>
        <div class="col-md-8">
            <form action="/productos" method="GET" class="d-flex flex-column flex-md-row gap-2">
                <!-- Buscador -->
                <input type="text" name="q" class="form-control" placeholder="Buscar por nombre..." value="<?= $busqueda ?>">
                
                <!-- Filtro Categoría -->
                <select name="categoria" class="form-select w-auto">
                    <option value="">Todas las Categorías</option>
                    <?php foreach($categorias as $cat): ?>
                        <option value="<?= $cat ?>" <?= $categoriaFiltro === $cat ? 'selected' : '' ?>><?= $cat ?></option>
                    <?php endforeach; ?>
                </select>
                
                <!-- Ordenamiento -->
                <select name="orden" class="form-select w-auto">
                    <option value="">Ordenar por...</option>
                    <option value="precio_asc" <?= $orden === 'precio_asc' ? 'selected' : '' ?>>Menor Precio</option>
                    <option value="precio_desc" <?= $orden === 'precio_desc' ? 'selected' : '' ?>>Mayor Precio</option>
                </select>
                
                <button type="submit" class="btn btn-primary">Filtrar</button>
                <?php if(!empty($busqueda) || !empty($categoriaFiltro) || !empty($orden)): ?>
                    <a href="/productos" class="btn btn-outline-secondary">Limpiar</a>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <div class="row">
        <?php if(count($productosFiltrados) > 0): ?>
            <?php foreach($productosFiltrados as $producto): ?>
                <?php include 'includes/tarjeta_producto.php'; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12 text-center py-5">
                <div class="p-5 bg-white rounded shadow-sm border">
                    <i class="fa-solid fa-magnifying-glass fs-1 text-muted mb-3"></i>
                    <h3 class="fw-bold">No se encontraron resultados</h3>
                    <p class="text-muted">Intenta con otros términos de búsqueda o filtros.</p>
                    <a href="/productos" class="btn btn-primary mt-2">Ver todos los productos</a>
                </div>
            </div>
        <?php endif; ?>
    </div>
</div>

<?php require_once 'includes/footer.php'; ?>
