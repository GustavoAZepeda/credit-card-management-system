document.addEventListener('DOMContentLoaded', function() {
    console.log("changePin.js está cargado");

    document.getElementById('changePinForm').addEventListener('submit', async function(event) { // Asegúrate de que el ID coincide
        event.preventDefault();
        console.log("Evento submit capturado");

        const currentPin = document.getElementById('currentPin').value;
        const newPin = document.getElementById('newPin').value;
        const confirmPin = document.getElementById('confirmNewPin').value; // Corregir el ID aquí

        if (newPin !== confirmPin) {
            alert("El nuevo PIN y la confirmación no coinciden.");
            return;
        }

        const token = localStorage.getItem('token');

        const response = await fetch('http://localhost:3000/api/change-pin', {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify({
                tarjetaId: 1,
                pinActual: currentPin,
                pinNuevo: newPin
            })
        });

        const data = await response.json();

        if (response.ok) {
            alert("PIN actualizado correctamente");
        } else {
            alert(data.message || "Error al cambiar el PIN");
        }
    });
});
