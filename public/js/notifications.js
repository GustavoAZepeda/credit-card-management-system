document.getElementById('filterForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const search = document.getElementById('search').value;
    const filter = document.querySelector('input[name="filter"]:checked').value;
    const token = localStorage.getItem('token');

    try {
        const response = await fetch(`http://localhost:3000/api/notificaciones?search=${search}&filter=${filter}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            }
        });

        if (!response.ok) {
            throw new Error('Error al obtener las notificaciones');
        }

        const notificaciones = await response.json();
        displayNotificaciones(notificaciones);
    } catch (error) {
        console.error('Error:', error);
        alert('Error al obtener las notificaciones');
    }
});

function displayNotificaciones(notificaciones) {
    const resultsDiv = document.getElementById('notificationsResults');
    resultsDiv.innerHTML = '';

    if (notificaciones.length === 0) {
        resultsDiv.textContent = 'No se encontraron notificaciones para los criterios seleccionados.';
        return;
    }

    const table = document.createElement('table');
    table.classList.add('table'); // Asignar clase para estilos CSS

    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    thead.innerHTML = `
        <tr>
            <th>Descripción</th>
            <th>Monto</th>
            <th>Fecha</th>
            <th>Leída</th>
        </tr>
    `;

    notificaciones.forEach(notificacion => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${notificacion.Descripcion}</td>
            <td>${notificacion.Monto}</td>
            <td>${new Date(notificacion.FechaHora).toLocaleString()}</td>
            <td>${notificacion.Leida ? 'Sí' : 'No'}</td>
        `;
        tbody.appendChild(row);
    });

    table.appendChild(thead);
    table.appendChild(tbody);
    resultsDiv.appendChild(table);
}
