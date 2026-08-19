# TechStore Ecuador - Aplicación Básica en PHP

## 1. Nombre del proyecto
Desarrollo y Despliegue de una Aplicación Básica en PHP: Página de Productos Tecnológicos (TechStore Ecuador).

## 2. Descripción general
TechStore Ecuador es una aplicación web de comercio electrónico simulada, desarrollada con PHP nativo, orientada a demostrar los principios del desarrollo web clásico y moderno. Incluye un catálogo dinámico de productos, carrito de compras persistente en el navegador y un diseño visual premium utilizando Bootstrap 5.

## 3. Objetivo de la aplicación
Crear una plataforma educativa funcional que implemente componentes reutilizables, navegación estructurada, interfaces dinámicas y diseño responsive, culminando con un despliegue público en la nube (Vercel) utilizando un runtime de PHP.

## 4. Tecnologías utilizadas
* **Backend:** PHP 8+ (nativo, sin frameworks).
* **Estructura y Estilos:** HTML5, CSS3, Bootstrap 5.
* **Lógica de Cliente:** JavaScript puro (ES6).
* **Control de Versiones:** Git y GitHub.
* **Despliegue:** Vercel (con runtime `bref/vercel-php`).

## 5. Arquitectura y estructura de carpetas
El proyecto utiliza una estructura orientada a componentes (`includes`) y compatible con Vercel (donde todo el backend está en la carpeta `api/`).

```
tienda-tecnologia/
├── api/                   # Archivos PHP procesados por Vercel
│   ├── index.php          # Página de inicio
│   ├── productos.php      # Catálogo
│   ├── producto.php       # Detalle de producto
│   ├── carrito.php        # Carrito
│   ├── nosotros.php       # Info del equipo
│   ├── contacto.php       # Formulario
│   ├── includes/          # Componentes reutilizables (UI y config)
│   │   ├── configuracion.php
│   │   ├── header.php
│   │   ├── navbar.php
│   │   ├── footer.php
│   │   └── tarjeta_producto.php
│   └── data/
│       └── productos.php  # "Base de datos" en Array PHP
├── assets/                # Archivos estáticos
│   ├── css/estilos.css
│   └── js/app.js
├── docs/capturas/         # Capturas de pantalla
├── vercel.json            # Configuración de despliegue
├── .gitignore
├── README.md
└── LICENSE
```

## 6. Funcionalidades implementadas
* **Inicio:** Landing page con productos destacados y beneficios.
* **Catálogo:** Buscador por texto, filtro de categorías y ordenamiento por precio.
* **Detalle de Producto:** Validación de stock dinámico por URL (`?id=X`).
* **Carrito de Compras:** Gestión completa (agregar, editar cantidad, eliminar, vaciar) y cálculo de totales con IVA.
* **Contacto:** Formulario con validación tanto en frontend (JS/HTML5) como en backend (PHP).

## 7. Explicación de los componentes reutilizables
Se utilizaron los comandos `require_once` de PHP para inyectar bloques de código repetitivos en múltiples páginas:
* `header.php`: Carga de CSS, fuentes e inicialización del `<head>`.
* `navbar.php`: Barra de navegación y contador del carrito.
* `footer.php`: Pie de página y carga de scripts.
* `tarjeta_producto.php`: Un componente visual que asume la existencia de una variable `$producto` e imprime una tarjeta (card) de Bootstrap. Demuestra cómo aislar la vista de la lógica.

## 8. Explicación del estado del carrito con `localStorage`
Debido a que Vercel funciona de manera **serverless** (funciones sin estado persistente en el servidor), utilizar `$_SESSION` de PHP no es confiable. 
Para solucionar esto, el carrito se gestiona con **JavaScript y `localStorage`**. 
* **Equivalencia:** `localStorage.setItem('carrito')` en JS equivale a guardar en `$_SESSION['carrito']` en un entorno PHP tradicional. Ambos permiten que los datos persistan mientras el usuario navega entre diferentes páginas.

## 9. Requisitos para ejecutar el proyecto
* PHP 8.0 o superior instalado.
* (Opcional) XAMPP, WAMP o similar si se desea usar Apache.
* Navegador web moderno.
* Conexión a internet (para cargar Bootstrap, imágenes de Unsplash y fuentes).

## 10. Instrucciones de instalación local
1. Clonar el repositorio: `git clone [URL_DEL_REPOSITORIO]`
2. Mover la carpeta del proyecto a tu entorno local.

## 11. Ejecución con XAMPP
1. Mover la carpeta `tienda-tecnologia` a `htdocs`.
2. Iniciar Apache en XAMPP.
3. El proyecto está diseñado con rutas relativas absolutas (`/`), por lo que en XAMPP tradicional (sin VirtualHost) las rutas podrían romperse. Es **altamente recomendado** usar el servidor interno de PHP.

## 12. Ejecución con `php -S localhost:8000`
Abre una terminal en la raíz del proyecto (`tienda-tecnologia`) y ejecuta:
```bash
php -S localhost:8000
```
Luego abre `http://localhost:8000` en tu navegador. 

## 13. Instrucciones de despliegue en Vercel
1. Sube tu código a un repositorio público en GitHub.
2. Inicia sesión en Vercel y haz clic en "Add New..." -> "Project".
3. Importa tu repositorio de GitHub.
4. En las opciones, deja el Framework Preset en "Other".
5. Haz clic en "Deploy".
6. Vercel leerá automáticamente el archivo `vercel.json` e instalará el runtime de PHP necesario.

## 14. Capturas de pantalla
*(Por agregar: Coloca las capturas en `docs/capturas/` y enlázalas aquí)*
* ![Inicio](docs/capturas/inicio.png)
* ![Catálogo](docs/capturas/catalogo.png)

## 15. Enlace del repositorio público
* [https://github.com/TU_USUARIO/tienda-tecnologia](https://github.com/TU_USUARIO/tienda-tecnologia) *(Reemplazar)*

## 16. Enlace funcional del despliegue
* [https://tienda-tecnologia-xyz.vercel.app](https://tienda-tecnologia-xyz.vercel.app) *(Reemplazar)*

## 17. Integrantes del grupo
* Integrante 1: Darwin Cabezas
* Integrante 2: Anny Canche
* Integrante 3: Mady Colobon

## 18. Pruebas realizadas
* Se verificó sintaxis con `php -l`.
* Funciona el buscador y los filtros combinados.
* El carrito restringe añadir cantidades mayores al stock simulado.
* El formulario de contacto valida el campo de correo en backend y frontend.
* El diseño es 100% responsive en móvil.

## 19. Problemas encontrados y soluciones
* **Problema:** Vercel no soporta `$_SESSION` por defecto ni .htaccess.
* **Solución:** Uso de `vercel.json` para enrutamiento y delegación del estado del carrito al cliente (`localStorage` con JS).

## 20. Conclusiones del proyecto
El desarrollo del proyecto permitió integrar conceptos fundamentales de backend y frontend, demostrando que PHP nativo combinado con herramientas modernas (como Bootstrap y arquitecturas serverless) puede producir aplicaciones robustas, limpias y altamente funcionales sin depender de frameworks complejos.