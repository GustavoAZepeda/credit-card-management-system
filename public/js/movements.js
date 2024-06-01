document.getElementById('movementsForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;
    const token = localStorage.getItem('token');

    try {
        const response = await fetch(`http://localhost:3000/api/transacciones?startDate=${startDate}&endDate=${endDate}`, {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            }
        });

        if (!response.ok) {
            throw new Error('Error al obtener las transacciones');
        }

        const transacciones = await response.json();
        displayTransacciones(transacciones);
    } catch (error) {
        console.error('Error:', error);
        alert('Error al obtener las transacciones');
    }
});

function displayTransacciones(transacciones) {
    const resultsDiv = document.getElementById('movementsResults');
    resultsDiv.innerHTML = '';

    if (transacciones.length === 0) {
        resultsDiv.textContent = 'No se encontraron transacciones para el rango de fechas seleccionado.';
        return;
    }

    const table = document.createElement('table');
    const thead = document.createElement('thead');
    const tbody = document.createElement('tbody');

    thead.innerHTML = `
        <tr>
            <th>FechaHora</th>
            <th>Monto</th>
            <th>Tipo</th>
            <th>Descripción</th>
        </tr>
    `;

    transacciones.forEach(transaccion => {
        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${new Date(transaccion.FechaHora).toLocaleString()}</td>
            <td>${transaccion.Monto}</td>
            <td>${transaccion.Tipo}</td>
            <td>${transaccion.Descripción}</td>
        `;
        tbody.appendChild(row);
    });

    table.appendChild(thead);
    table.appendChild(tbody);
    resultsDiv.appendChild(table);
}
