document.getElementById('resetPasswordForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const newPassword = document.getElementById('newPassword').value;
    const token = window.location.pathname.split('/').pop();

    fetch(`http://localhost:3000/api/reset-password/${token}`, {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ newPassword })
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === 'Contraseña actualizada correctamente') {
            alert('Contraseña restablecida correctamente.');
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al restablecer la contraseña');
    });
});
