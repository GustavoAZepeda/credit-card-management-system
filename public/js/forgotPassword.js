document.getElementById('forgotPasswordForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const email = document.getElementById('email').value;

    fetch('http://localhost:3000/api/forgot-password', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ email })
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === 'Correo de recuperación enviado exitosamente') {
            alert('Correo de recuperación enviado. Revise su correo para más detalles.');
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al enviar la solicitud de recuperación');
    });
});
