document.addEventListener('DOMContentLoaded', async function() {
    const token = localStorage.getItem('token');
    if (!token) {
        alert('No has iniciado sesión');
        window.location.href = '/index.html';
        return;
    }

    const switchElement = document.getElementById('statusSwitch');
    const statusSpan = document.getElementById('cardStatus');

    // Obtener el estado actual de la tarjeta al cargar la página
    try {
        const response = await fetch('http://localhost:3000/api/detalle-tarjeta', {
            method: 'GET',
            headers: {
                'Authorization': `Bearer ${token}`,
                'Content-Type': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error('Error al obtener los detalles de la tarjeta');
        }

        const detalles = await response.json();
        switchElement.checked = detalles.Estado_de_tarjeta;
        statusSpan.textContent = detalles.Estado_de_tarjeta ? 'Desbloqueada' : 'Bloqueada';

        // Agregar manejador de eventos para el switch
        switchElement.addEventListener('change', async function() {
            const nuevoEstado = switchElement.checked ? 1 : 0;

            try {
                const updateResponse = await fetch('http://localhost:3000/api/update-estado-tarjeta', {
                    method: 'PUT',
                    headers: {
                        'Authorization': `Bearer ${token}`,
                        'Content-Type': 'application/json'
                    },
                    body: JSON.stringify({ tarjetaId: detalles.TarjetaID, estado: nuevoEstado })
                });

                if (!updateResponse.ok) {
                    throw new Error('Error al actualizar el estado de la tarjeta');
                }

                const result = await updateResponse.json();
                statusSpan.textContent = nuevoEstado ? 'Desbloqueada' : 'Bloqueada';
                alert(result.message);
            } catch (error) {
                console.error('Error:', error);
                alert('Error al actualizar el estado de la tarjeta');
                switchElement.checked = !nuevoEstado;  // Revertir el cambio en el switch
            }
        });
    } catch (error) {
        console.error('Error:', error);
        alert('Error al obtener los detalles de la tarjeta');
    }
});
