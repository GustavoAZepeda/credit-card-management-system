document.addEventListener('DOMContentLoaded', function() {
    var toggleButtons = document.querySelectorAll('.submenu .toggle');

    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();  // Evita que el navegador siga el enlace

            var submenu = this.nextElementSibling;  // Selecciona el submenú asociado
            if (submenu.style.display === "block") {
                submenu.style.display = "none";  // Oculta el submenú si está visible
            } else {
                submenu.style.display = "block";  // Muestra el submenú si está oculto
            }
        });
    });
});