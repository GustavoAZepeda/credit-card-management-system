document.getElementById('logout').addEventListener('click', async function(e) {
    e.preventDefault();

    try {
        const response = await fetch('http://localhost:3000/auth/logout', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            }
        });

        if (!response.ok) {
            throw new Error('Error al cerrar sesión');
        }

        localStorage.removeItem('token');
        alert('Sesión cerrada correctamente');
        window.location.href = '/index.html';
    } catch (error) {
        console.error('Error:', error);
        alert('Error al cerrar sesión');
    }
});
