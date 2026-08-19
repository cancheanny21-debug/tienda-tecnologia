# TechStore Ecuador

## 1. Nombre del proyecto
**TechStore Ecuador** - Tienda web académica de productos tecnológicos.

## 2. Descripción general
TechStore Ecuador es una aplicación web académica que simula el funcionamiento de una tienda de tecnología. Permite visualizar un catálogo, ver detalles de productos, buscar, filtrar y agregar al carrito.

## 3. Objetivo de la aplicación
Demostrar el desarrollo de una aplicación web Full Stack utilizando PHP para la lógica del servidor, un arreglo como base de datos y JavaScript (`localStorage`) para gestionar el carrito de compras en el cliente. Todo bajo un enfoque de código sencillo, modular y explicable.

## 4. Tecnologías utilizadas
* **PHP 8**: Backend y enrutamiento.
* **HTML5 y CSS3**: Estructura y diseño.
* **Bootstrap 5**: Framework CSS para un diseño responsive y moderno.
* **JavaScript puro**: Gestión del carrito y localStorage.
* **Git y GitHub**: Control de versiones.
* **Vercel**: Despliegue en la nube mediante el runtime `vercel-community/php`.

## 5. Arquitectura y estructura de carpetas
La aplicación sigue una arquitectura modular en la que los componentes comunes se separan en la carpeta `includes`:
```text
tienda-tecnologia/
│
├── api/                  # Archivos PHP procesados por Vercel
│   ├── index.php         # Inicio
│   ├── productos.php     # Catálogo
│   ├── producto.php      # Detalle de producto
│   ├── carrito.php       # Carrito
│   ├── nosotros.php      # Página de información
│   ├── contacto.php      # Formulario de contacto
│   │
│   ├── includes/         # Componentes reutilizables
│   │   ├── configuracion.php
│   │   ├── header.php
│   │   ├── navbar.php
│   │   ├── footer.php
│   │   └── tarjeta_producto.php
│   │
│   └── data/
│       └── productos.php # Arreglo de productos simulando base de datos
│
├── assets/               # Archivos estáticos
│   ├── css/estilos.css
│   └── js/app.js
│
├── docs/capturas/        # Evidencias del proyecto
├── vercel.json           # Configuración de despliegue
└── README.md
```

## 6. Funcionalidades implementadas
1. **Catálogo dinámico:** Carga de productos desde un arreglo PHP.
2. **Buscador:** Búsqueda por nombre o descripción.
3. **Filtro y ordenamiento:** Filtrado por categoría y orden por precio.
4. **Carrito de compras:** Funciona 100% en el cliente con JavaScript.
5. **Persistencia:** Uso de `localStorage` para no perder el carrito al recargar.
6. **Formulario de contacto:** Procesado mediante PHP POST.

## 7. Explicación de componentes reutilizables
Para evitar repetir código y hacer el mantenimiento más fácil, usamos `require_once` de PHP:
* `header.php`: Contiene el `<head>`, la inclusión de Bootstrap y CSS.
* `navbar.php`: Barra de navegación responsive.
* `footer.php`: Pie de página con información del proyecto.
* `tarjeta_producto.php`: Una función PHP que recibe un arreglo de producto y genera el HTML de la tarjeta, permitiendo usarlo tanto en Inicio como en el Catálogo.

## 8. Explicación del estado del carrito con localStorage
En esta arquitectura:
* **PHP** se encarga de procesar las rutas y servir el HTML inicial de los productos.
* **JavaScript** captura los clics de "Agregar al carrito".
* **localStorage** guarda el estado del carrito en el navegador web del usuario, permitiendo conservar los productos aunque recargue la página. Esto es esencial ya que Vercel funciona en un entorno *serverless* donde las sesiones PHP tradicionales no son persistentes.

## 9. Equivalencia de componentes y estado
Los componentes PHP (`require_once`) nos permiten ensamblar el frontend en el servidor como piezas de lego. Por su parte, `localStorage` actúa como una mini base de datos local en el navegador del cliente para mantener el estado del carrito activo sin depender del backend.

## 10. Uso de GET y POST
* **GET**: Lo usamos en el buscador y filtros del catálogo (`/productos?buscar=laptop`) y en el detalle del producto (`/producto?id=1`). Los datos viajan por la URL.
* **POST**: Lo usamos en el formulario de contacto para enviar los datos de forma segura sin exponerlos en la URL.

## 11. Validación y seguridad
* **`htmlspecialchars()`**: Utilizado en todo el HTML para escapar caracteres especiales y prevenir ataques XSS (Cross-Site Scripting).
* **`filter_var()`**: Usado para validar enteros en el ID del producto y validar el formato del correo.
* **Validaciones JS**: Previenen envíos erróneos antes de ir al servidor.

## 12. Requisitos para ejecutar el proyecto
* PHP 8.0 o superior instalado.
* Navegador web moderno.

## 13. Instalación local
1. Clonar el repositorio.
2. Entrar a la carpeta del proyecto.
3. Iniciar un servidor local.

## 14. Ejecución con XAMPP
Mueve la carpeta `tienda-tecnologia` a `C:\xampp\htdocs\`. Luego ingresa a `http://localhost/tienda-tecnologia/api/` en tu navegador.

## 15. Ejecución con PHP Built-in Server
Abre la terminal en la raíz del proyecto y ejecuta:
```bash
php -S localhost:8000
```
Luego visita `http://localhost:8000/api/index.php`.

## 16. Git
Para inicializar el repositorio:
```bash
git init
git add .
git commit -m "Inicializar estructura del proyecto"
```

## 17. GitHub
Para subir el proyecto a GitHub:
```bash
git branch -M main
git remote add origin PENDIENTE_DE_PUBLICACION
git push -u origin main
```

## 18. Despliegue en Vercel
1. Crear cuenta en Vercel.
2. Seleccionar "Add New Project" e importar el repositorio de GitHub.
3. Vercel leerá el archivo `vercel.json` que configura el runtime `vercel-community/php`.
4. Hacer clic en "Deploy".
5. Una vez finalizado, probar todas las rutas generadas.

## 19. Capturas de pantalla
* [Inicio Desktop](docs/capturas/inicio-desktop.png) (Pendiente)
* [Catálogo](docs/capturas/catalogo.png) (Pendiente)
* [Detalle](docs/capturas/detalle-producto.png) (Pendiente)
* [Carrito](docs/capturas/carrito.png) (Pendiente)
* [Móvil](docs/capturas/vista-movil.png) (Pendiente)
* [Vercel](docs/capturas/vercel-produccion.png) (Pendiente)

## 20. Enlace del repositorio público
Pendiente de publicación

## 21. Enlace funcional del despliegue
Pendiente de despliegue

## 22. Integrantes
- Darwin Cabezas
- Anny Canche
- Mady Colobon

## 23. Pruebas realizadas
- Sintaxis PHP evaluada con `php -l`.
- Navegación entre rutas sin errores 404.
- Filtrado y búsqueda comprobada.
- Adición de productos al carrito y validación de límites de stock.
- Formulario de contacto validado.
- Responsividad verificada en diferentes tamaños de pantalla.

## 24. Problemas encontrados y soluciones
No se encontraron problemas críticos durante las pruebas realizadas.

## 25. Conclusiones
Este proyecto demostró la viabilidad de utilizar PHP para aplicaciones web eficientes junto con tecnologías frontend estándar. El uso de `localStorage` permitió superar las limitaciones de estado en entornos *serverless*, logrando un proyecto completamente funcional, desplegable y de alto valor educativo.
