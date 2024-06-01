document.getElementById('contactForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const clientId = document.getElementById('clientId').value;
    const email = document.getElementById('email').value;
    const telefono = document.getElementById('telefono').value;
    const direccion = document.getElementById('direccion').value;

    try {
        const response = await fetch(`http://localhost:3000/api/contacto/${clientId}`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({email, telefono, direccion })
        });

        const result = await response.json();
        if (response.ok) {
            alert('Información de contacto actualizada correctamente');
        } else {
            throw new Error(result.message);
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al actualizar la información de contacto');
    }
});
