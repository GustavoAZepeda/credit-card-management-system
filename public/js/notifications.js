document.addEventListener('DOMContentLoaded', function() {
    loadNotifications();

    var toggleButtons = document.querySelectorAll('.submenu .toggle');
    toggleButtons.forEach(function(button) {
        button.addEventListener('click', function(event) {
            event.preventDefault();  // Evita que el navegador siga el enlace

            var submenu = this.nextElementSibling;  // Selecciona el submenú asociado

            // Cierra todos los submenús abiertos
            var allSubmenus = document.querySelectorAll('.submenu-items');
            allSubmenus.forEach(function(sub) {
                if (sub !== submenu) {
                    sub.style.display = 'none';
                }
            });

            // Muestra u oculta el submenú seleccionado
            if (submenu.style.display === "block") {
                submenu.style.display = "none";  // Oculta el submenú si está visible
            } else {
                submenu.style.display = "block";  // Muestra el submenú si está oculto
            }
        });
    });
});

function loadNotifications() {
    // Aquí puedes cargar las notificaciones desde tu base de datos o API
    const notifications = [
        { id: 1, text: "Compra en Supermercado X", amount: "Q150.00", place: "Supermercado X", unread: true },
        { id: 2, text: "Pago de Servicio de Internet", amount: "Q200.00", place: "Internet S.A.", unread: false },
        { id: 3, text: "Retiro de Cajero Automático", amount: "Q500.00", place: "Cajero ABC", unread: true },
        // Agrega más notificaciones según sea necesario
    ];

    const notificationList = document.getElementById('notifications');
    notificationList.innerHTML = '';
    
    notifications.forEach(notification => {
        const li = document.createElement('li');
        li.className = notification.unread ? 'unread' : '';
        li.innerHTML = `
            <span class="text">${notification.text} - ${notification.place}</span>
            <span class="amount">${notification.amount}</span>
        `;
        notificationList.appendChild(li);
    });
}

function filterNotifications() {
    const searchTerm = document.getElementById('searchTerm').value.toLowerCase();
    const filter = document.querySelector('input[name="filter"]:checked').value;

    const notificationList = document.getElementById('notifications');
    const notifications = notificationList.getElementsByTagName('li');
    
    for (let i = 0; i < notifications.length; i++) {
        const text = notifications[i].getElementsByClassName('text')[0].innerText.toLowerCase();
        const isUnread = notifications[i].classList.contains('unread');

        let display = true;

        if (searchTerm && !text.includes(searchTerm)) {
            display = false;
        }

        if (filter === 'unread' && !isUnread) {
            display = false;
        }

        notifications[i].style.display = display ? '' : 'none';
    }
}
