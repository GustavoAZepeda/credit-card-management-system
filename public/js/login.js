document.getElementById('loginForm').addEventListener('submit', async function(event) {
    event.preventDefault();

    const codigo = document.getElementById('codigo').value;
    const password = document.getElementById('password').value;

    try {
        const response = await fetch('http://localhost:3000/auth/login', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ codigo, password })
        });

        const data = await response.json();

        if (response.ok) {
            localStorage.setItem('token', data.token); // Guarda el token en localStorage
            alert('Inicio de sesión exitoso');
            window.location.href = '/public/nav/generalDetails.html'; // Redirige a la página deseada
        } else {
            alert(data.message || 'Error al iniciar sesión');
        }
    } catch (error) {
        console.error('Error:', error);
        alert('Error al realizar la solicitud');
    }
});
