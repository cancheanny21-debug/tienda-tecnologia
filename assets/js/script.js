// assets/js/script.js
document.addEventListener("DOMContentLoaded", () => {
    // Ejemplo de pequeña interactividad extra
    const alertElements = document.querySelectorAll('.alert');
    if (alertElements) {
        setTimeout(() => {
            alertElements.forEach(alert => {
                const bsAlert = new bootstrap.Alert(alert);
                bsAlert.close();
            });
        }, 5000); // Cierra alertas automáticamente después de 5 seg
    }
});
