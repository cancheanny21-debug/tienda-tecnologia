/**
 * Lógica en JavaScript para el Carrito de Compras usando localStorage
 */

// Esperar a que el DOM esté completamente cargado
document.addEventListener('DOMContentLoaded', () => {
    // Inicializar variables
    let carrito = JSON.parse(localStorage.getItem('techstore_carrito')) || [];
    
    // Elementos del DOM generales
    const contadorCarrito = document.getElementById('contador-carrito');
    
    // Actualizar el contador del carrito en todas las páginas
    actualizarContador();
    
    // --- LÓGICA PARA AGREGAR AL CARRITO (Desde tarjetas de producto) ---
    const botonesAgregar = document.querySelectorAll('.btn-agregar-carrito');
    botonesAgregar.forEach(boton => {
        boton.addEventListener('click', (e) => {
            const producto = {
                id: boton.dataset.id,
                nombre: boton.dataset.nombre,
                precio: parseFloat(boton.dataset.precio),
                imagen: boton.dataset.imagen,
                stock: parseInt(boton.dataset.stock),
                cantidad: 1
            };
            agregarAlCarrito(producto);
        });
    });

    // --- LÓGICA PARA AGREGAR AL CARRITO (Desde detalle de producto) ---
    const btnAgregarDetalle = document.getElementById('btn-agregar-detalle');
    if (btnAgregarDetalle) {
        btnAgregarDetalle.addEventListener('click', () => {
            const inputCantidad = document.getElementById('cantidad-producto');
            let cantidadSeleccionada = parseInt(inputCantidad.value);
            const stock = parseInt(btnAgregarDetalle.dataset.stock);
            
            // Validación de cantidad
            if (isNaN(cantidadSeleccionada) || cantidadSeleccionada < 1) {
                cantidadSeleccionada = 1;
            } else if (cantidadSeleccionada > stock) {
                cantidadSeleccionada = stock;
                alert(`Solo hay ${stock} unidades disponibles.`);
            }

            const producto = {
                id: btnAgregarDetalle.dataset.id,
                nombre: btnAgregarDetalle.dataset.nombre,
                precio: parseFloat(btnAgregarDetalle.dataset.precio),
                imagen: btnAgregarDetalle.dataset.imagen,
                stock: stock,
                cantidad: cantidadSeleccionada
            };
            
            agregarAlCarrito(producto, true); // true para indicar que viene con cantidad específica
        });
    }

    // --- LÓGICA PARA LA PÁGINA DEL CARRITO ---
    const contenedorCarrito = document.getElementById('contenedor-carrito');
    if (contenedorCarrito) {
        renderizarCarrito();
        
        // Botón vaciar carrito
        const btnVaciar = document.getElementById('btn-vaciar-carrito');
        if (btnVaciar) {
            btnVaciar.addEventListener('click', () => {
                if (confirm('¿Estás seguro de vaciar el carrito?')) {
                    carrito = [];
                    guardarCarrito();
                    renderizarCarrito();
                }
            });
        }
        
        // Botón procesar compra (simulado)
        const btnProcesar = document.getElementById('btn-procesar-compra');
        if (btnProcesar) {
            btnProcesar.addEventListener('click', () => {
                alert('¡Compra simulada con éxito! (Proyecto Académico)');
                carrito = [];
                guardarCarrito();
                renderizarCarrito();
            });
        }
    }

    // --- LÓGICA DE VALIDACIÓN DE FORMULARIO DE CONTACTO ---
    const formContacto = document.getElementById('form-contacto');
    if (formContacto) {
        formContacto.addEventListener('submit', function(event) {
            const email = document.getElementById('correo').value;
            // Validación simple JS
            if (!email.includes('@') || !email.includes('.')) {
                alert('Por favor, ingresa un correo válido.');
                event.preventDefault();
            }
        });
    }

    // --- FUNCIONES CORE DEL CARRITO ---
    
    function agregarAlCarrito(producto, reemplazarCantidad = false) {
        // Verificar si ya existe
        const indiceExiste = carrito.findIndex(p => p.id === producto.id);
        
        if (indiceExiste !== -1) {
            // Si ya existe
            let nuevaCantidad = reemplazarCantidad ? 
                                producto.cantidad : 
                                carrito[indiceExiste].cantidad + 1;
            
            // Validar contra el stock
            if (nuevaCantidad > carrito[indiceExiste].stock) {
                alert(`No puedes agregar más. El stock máximo es ${carrito[indiceExiste].stock}.`);
                nuevaCantidad = carrito[indiceExiste].stock;
            }
            
            carrito[indiceExiste].cantidad = nuevaCantidad;
        } else {
            // Si es nuevo
            carrito.push(producto);
        }
        
        guardarCarrito();
        // Alerta eliminada
    }

    function guardarCarrito() {
        localStorage.setItem('techstore_carrito', JSON.stringify(carrito));
        actualizarContador();
    }

    function actualizarContador() {
        if (contadorCarrito) {
            const totalItems = carrito.reduce((total, prod) => total + prod.cantidad, 0);
            contadorCarrito.textContent = totalItems;
        }
    }

    function renderizarCarrito() {
        const mensajeVacio = document.getElementById('mensaje-carrito-vacio');
        const listaProductos = document.getElementById('lista-productos-carrito');
        const itemsList = document.getElementById('items-carrito');
        const btnVaciar = document.getElementById('btn-vaciar-carrito');
        const btnProcesar = document.getElementById('btn-procesar-compra');
        const resCantidad = document.getElementById('resumen-cantidad');
        const resSubtotal = document.getElementById('resumen-subtotal');
        const resTotal = document.getElementById('resumen-total');

        if (carrito.length === 0) {
            mensajeVacio.style.display = 'block';
            listaProductos.style.display = 'none';
            btnVaciar.disabled = true;
            btnProcesar.disabled = true;
            resCantidad.textContent = '0';
            resSubtotal.textContent = '$0.00';
            resTotal.textContent = '$0.00';
            return;
        }

        mensajeVacio.style.display = 'none';
        listaProductos.style.display = 'block';
        btnVaciar.disabled = false;
        btnProcesar.disabled = false;

        // Limpiar lista
        itemsList.innerHTML = '';
        let total = 0;
        let cantidadTotal = 0;

        carrito.forEach((producto, index) => {
            const subtotal = producto.precio * producto.cantidad;
            total += subtotal;
            cantidadTotal += producto.cantidad;

            const li = document.createElement('li');
            li.className = 'list-group-item py-3';
            li.innerHTML = `
                <div class="row align-items-center">
                    <div class="col-md-2 col-4 text-center">
                        <img src="${producto.imagen}" alt="${producto.nombre}" class="img-fluid rounded cart-item-image">
                    </div>
                    <div class="col-md-4 col-8">
                        <h6 class="mb-0 text-truncate" title="${producto.nombre}">${producto.nombre}</h6>
                        <small class="text-muted">Precio: $${producto.precio.toFixed(2)}</small>
                    </div>
                    <div class="col-md-3 col-6 mt-3 mt-md-0">
                        <div class="input-group input-group-sm">
                            <button class="btn btn-outline-secondary btn-restar" data-index="${index}">-</button>
                            <input type="number" class="form-control text-center input-cantidad" value="${producto.cantidad}" readonly>
                            <button class="btn btn-outline-secondary btn-sumar" data-index="${index}">+</button>
                        </div>
                    </div>
                    <div class="col-md-2 col-3 mt-3 mt-md-0 text-end">
                        <strong>$${subtotal.toFixed(2)}</strong>
                    </div>
                    <div class="col-md-1 col-3 mt-3 mt-md-0 text-end">
                        <button class="btn btn-sm btn-danger btn-eliminar" data-index="${index}" title="Eliminar">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            `;
            itemsList.appendChild(li);
        });

        // Actualizar resumen
        resCantidad.textContent = cantidadTotal;
        resSubtotal.textContent = `$${total.toFixed(2)}`;
        resTotal.textContent = `$${total.toFixed(2)}`;

        // Asignar eventos a los nuevos botones
        asignarEventosCarrito();
    }

    function asignarEventosCarrito() {
        // Sumar
        document.querySelectorAll('.btn-sumar').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const idx = e.target.dataset.index;
                if (carrito[idx].cantidad < carrito[idx].stock) {
                    carrito[idx].cantidad++;
                    guardarCarrito();
                    renderizarCarrito();
                } else {
                    alert('Stock máximo alcanzado.');
                }
            });
        });

        // Restar
        document.querySelectorAll('.btn-restar').forEach(btn => {
            btn.addEventListener('click', (e) => {
                const idx = e.target.dataset.index;
                if (carrito[idx].cantidad > 1) {
                    carrito[idx].cantidad--;
                    guardarCarrito();
                    renderizarCarrito();
                }
            });
        });

        // Eliminar
        document.querySelectorAll('.btn-eliminar').forEach(btn => {
            // El icono podría capturar el clic, usar closest asegura llegar al botón
            btn.addEventListener('click', (e) => {
                const boton = e.target.closest('.btn-eliminar');
                const idx = boton.dataset.index;
                if(confirm('¿Eliminar este producto del carrito?')) {
                    carrito.splice(idx, 1);
                    guardarCarrito();
                    renderizarCarrito();
                }
            });
        });
    }
});
