document.getElementById('createClienteForm').addEventListener('submit', function(event) {
    event.preventDefault();

    const formData = new FormData(event.target);
    const data = {
        nombre: formData.get('nombre'),
        dpi: formData.get('dpi'),
        direccion: formData.get('direccion')
    };

    fetch('http://localhost:3000/api/clientes', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(response => response.json())
    .then(result => {
        if (result.status === 'success') {
            alert('Cliente creado exitosamente');
        } else {
            alert('Error al crear el cliente: ' + result.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al crear el cliente');
    });
});
