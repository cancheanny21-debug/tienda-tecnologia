// Variables globales para el carrito
let carrito = JSON.parse(localStorage.getItem('techstore_carrito')) || [];

document.addEventListener('DOMContentLoaded', () => {
    actualizarBadgeCarrito();

    // Event listener para botones "Agregar al carrito"
    const botonesAgregar = document.querySelectorAll('.add-to-cart');
    botonesAgregar.forEach(boton => {
        boton.addEventListener('click', (e) => {
            const btn = e.currentTarget;
            const producto = {
                id: parseInt(btn.dataset.id),
                nombre: btn.dataset.nombre,
                precio: parseFloat(btn.dataset.precio),
                imagen: btn.dataset.imagen,
                stock: parseInt(btn.dataset.stock),
                cantidad: 1 // Por defecto 1 al agregar desde el catálogo
            };
            
            // Si hay un input de cantidad (en la vista de detalle)
            const inputCantidad = document.getElementById('cantidad-producto');
            if(inputCantidad) {
                producto.cantidad = parseInt(inputCantidad.value);
            }

            agregarAlCarrito(producto);
        });
    });

    // Validar formulario de contacto si existe
    const formContacto = document.getElementById('form-contacto');
    if(formContacto) {
        formContacto.addEventListener('submit', (e) => {
            if (!formContacto.checkValidity()) {
                e.preventDefault();
                e.stopPropagation();
            }
            formContacto.classList.add('was-validated');
        }, false);
    }
});

// Función para agregar al carrito
function agregarAlCarrito(productoNuevo) {
    const indice = carrito.findIndex(p => p.id === productoNuevo.id);
    
    if (indice !== -1) {
        // Ya existe, incrementar cantidad verificando stock
        let nuevaCantidad = carrito[indice].cantidad + productoNuevo.cantidad;
        if (nuevaCantidad > productoNuevo.stock) {
            alert(`No puedes agregar más de ${productoNuevo.stock} unidades de este producto.`);
            return;
        }
        carrito[indice].cantidad = nuevaCantidad;
    } else {
        // Nuevo producto
        if (productoNuevo.cantidad > productoNuevo.stock) {
            alert(`No puedes agregar más de ${productoNuevo.stock} unidades de este producto.`);
            return;
        }
        carrito.push(productoNuevo);
    }
    
    guardarCarrito();
    mostrarToast('Producto agregado al carrito');
}

// Guardar en localStorage y actualizar badge
function guardarCarrito() {
    localStorage.setItem('techstore_carrito', JSON.stringify(carrito));
    actualizarBadgeCarrito();
    
    // Si estamos en la página del carrito, actualizar la vista
    if (typeof renderizarCarrito === 'function') {
        renderizarCarrito();
    }
}

// Actualizar el número en el icono del carrito
function actualizarBadgeCarrito() {
    const badge = document.getElementById('cart-badge');
    const totalItems = carrito.reduce((total, p) => total + p.cantidad, 0);
    
    if (totalItems > 0) {
        badge.textContent = totalItems;
        badge.classList.remove('d-none');
    } else {
        badge.classList.add('d-none');
    }
}

// Mostrar alerta tipo Toast
function mostrarToast(mensaje) {
    // Si ya existe un contenedor, usarlo, sino crearlo
    let toastContainer = document.getElementById('toast-container');
    if (!toastContainer) {
        toastContainer = document.createElement('div');
        toastContainer.id = 'toast-container';
        toastContainer.className = 'position-fixed bottom-0 end-0 p-3';
        toastContainer.style.zIndex = '11';
        document.body.appendChild(toastContainer);
    }

    const toastHTML = `
        <div class="toast align-items-center text-bg-success border-0" role="alert" aria-live="assertive" aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <i class="fa-solid fa-check-circle me-2"></i> ${mensaje}
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
            </div>
        </div>
    `;
    
    toastContainer.insertAdjacentHTML('beforeend', toastHTML);
    const toastElement = toastContainer.lastElementChild;
    const toast = new bootstrap.Toast(toastElement, { delay: 3000 });
    toast.show();
    
    // Limpiar del DOM luego de ocultar
    toastElement.addEventListener('hidden.bs.toast', () => {
        toastElement.remove();
    });
}
