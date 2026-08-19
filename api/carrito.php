<?php
require_once 'includes/header.php';
require_once 'includes/navbar.php';
?>

<div class="container py-5 min-vh-100-custom">
    <h2 class="fw-bold mb-4"><i class="fa-solid fa-cart-shopping me-2 text-primary"></i> Tu Carrito de Compras</h2>

    <!-- Contenedor donde JS renderizará los productos -->
    <div id="carrito-container">
        <!-- Renderizado inicial (Cargando) -->
        <div class="text-center py-5">
            <div class="spinner-border text-primary" role="status">
                <span class="visually-hidden">Cargando...</span>
            </div>
            <p class="mt-2 text-muted">Cargando carrito...</p>
        </div>
    </div>
</div>

<script>
// Función principal para renderizar el carrito
function renderizarCarrito() {
    const container = document.getElementById('carrito-container');
    
    if (!carrito || carrito.length === 0) {
        container.innerHTML = `
            <div class="text-center py-5 bg-white rounded shadow-sm border">
                <i class="fa-solid fa-cart-arrow-down fs-1 text-muted mb-3"></i>
                <h3 class="fw-bold">Tu carrito está vacío</h3>
                <p class="text-muted">Parece que aún no has agregado ningún producto.</p>
                <a href="/productos" class="btn btn-primary mt-2">Explorar Productos</a>
            </div>
        `;
        return;
    }

    let html = `
        <div class="row">
            <div class="col-lg-8">
                <div class="card shadow-sm border-0 mb-4">
                    <div class="card-body p-0">
                        <ul class="list-group list-group-flush">
    `;

    let subtotal = 0;

    carrito.forEach((p, index) => {
        const totalProducto = p.precio * p.cantidad;
        subtotal += totalProducto;
        
        html += `
            <li class="list-group-item p-4">
                <div class="row align-items-center">
                    <div class="col-md-2 col-4 mb-3 mb-md-0">
                        <img src="${p.imagen}" alt="${p.nombre}" class="img-fluid rounded">
                    </div>
                    <div class="col-md-4 col-8 mb-3 mb-md-0">
                        <h5 class="fw-bold mb-1">${p.nombre}</h5>
                        <p class="text-success fw-bold mb-0">$${p.precio.toFixed(2)}</p>
                    </div>
                    <div class="col-md-4 col-8 d-flex align-items-center justify-content-center justify-content-md-start">
                        <div class="input-group" style="width: 130px;">
                            <button class="btn btn-outline-secondary btn-sm" onclick="modificarCantidad(${p.id}, -1)">-</button>
                            <input type="text" class="form-control form-control-sm text-center bg-white" value="${p.cantidad}" readonly>
                            <button class="btn btn-outline-secondary btn-sm" onclick="modificarCantidad(${p.id}, 1)">+</button>
                        </div>
                    </div>
                    <div class="col-md-2 col-4 text-end">
                        <p class="fw-bold mb-2">$${totalProducto.toFixed(2)}</p>
                        <button class="btn btn-sm btn-outline-danger" onclick="eliminarProducto(${p.id})">
                            <i class="fa-solid fa-trash-can"></i>
                        </button>
                    </div>
                </div>
            </li>
        `;
    });

    // Calcular totales (IVA 15% como ejemplo para Ecuador)
    const iva = subtotal * 0.15;
    const total = subtotal + iva;

    html += `
                        </ul>
                    </div>
                </div>
                <div class="text-start mb-4">
                    <button class="btn btn-outline-danger" onclick="vaciarCarrito()">
                        <i class="fa-solid fa-trash-can me-2"></i> Vaciar Carrito
                    </button>
                </div>
            </div>
            
            <div class="col-lg-4">
                <div class="card shadow-sm border-0 bg-light">
                    <div class="card-body p-4">
                        <h4 class="fw-bold mb-4">Resumen de Compra</h4>
                        
                        <div class="d-flex justify-content-between mb-2">
                            <span class="text-muted">Subtotal</span>
                            <span class="fw-semibold">$${subtotal.toFixed(2)}</span>
                        </div>
                        <div class="d-flex justify-content-between mb-3">
                            <span class="text-muted">IVA (15%)</span>
                            <span class="fw-semibold">$${iva.toFixed(2)}</span>
                        </div>
                        
                        <hr class="my-3 border-secondary">
                        
                        <div class="d-flex justify-content-between mb-4">
                            <span class="fs-5 fw-bold">Total</span>
                            <span class="fs-5 fw-bold text-success">$${total.toFixed(2)}</span>
                        </div>
                        
                        <button class="btn btn-primary btn-lg w-100" onclick="alert('Funcionalidad de pago no implementada. ¡Gracias por probar el proyecto!')">
                            <i class="fa-solid fa-credit-card me-2"></i> Proceder al Pago
                        </button>
                    </div>
                </div>
            </div>
        </div>
    `;

    container.innerHTML = html;
}

// Funciones para manipular el carrito desde esta vista
function modificarCantidad(id, cambio) {
    const indice = carrito.findIndex(p => p.id === id);
    if (indice !== -1) {
        let nuevaCantidad = carrito[indice].cantidad + cambio;
        
        if (nuevaCantidad > carrito[indice].stock) {
            alert(`No puedes agregar más unidades. El stock máximo es ${carrito[indice].stock}.`);
            return;
        }
        
        if (nuevaCantidad > 0) {
            carrito[indice].cantidad = nuevaCantidad;
            guardarCarrito(); // Llama a la funcion de app.js y recarga la vista
        } else if (nuevaCantidad === 0) {
            eliminarProducto(id);
        }
    }
}

function eliminarProducto(id) {
    if(confirm('¿Estás seguro de eliminar este producto del carrito?')) {
        carrito = carrito.filter(p => p.id !== id);
        guardarCarrito();
    }
}

function vaciarCarrito() {
    if(confirm('¿Estás seguro de vaciar todo el carrito?')) {
        carrito = [];
        guardarCarrito();
    }
}

// Renderizar al cargar la página
document.addEventListener('DOMContentLoaded', () => {
    renderizarCarrito();
});
</script>

<?php require_once 'includes/footer.php'; ?>
