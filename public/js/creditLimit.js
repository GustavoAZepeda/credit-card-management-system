document.getElementById('creditLimitForm').addEventListener('submit', function(e) {
    e.preventDefault();

    const cardNumber = document.getElementById('cardNumber').value;
    const desiredLimit = document.getElementById('desiredLimit').value;
    const email = document.getElementById('email').value;
    const phoneNumber = document.getElementById('phoneNumber').value;

    fetch('http://localhost:3000/api/credit-limit', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ cardNumber, desiredLimit, email, phoneNumber })
    })
    .then(response => response.json())
    .then(data => {
        if (data.message === 'Solicitud enviada y correo enviado exitosamente') {
            alert('Solicitud enviada exitosamente. Revise su correo para más detalles.');
        } else {
            alert('Error: ' + data.message);
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error al enviar la solicitud');
    });
});
