document.getElementById('reminderForm').addEventListener('submit', async function(e) {
    e.preventDefault();

    const reminderEmail = document.getElementById('reminderEmail').value;
    const reminderPhone = document.getElementById('reminderPhone').value;
    const reminderDate = document.getElementById('reminderDate').value;
    const token = localStorage.getItem('token');

    try {
        const response = await fetch('http://localhost:3000/api/send-reminder', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${token}`
            },
            body: JSON.stringify({
                email: reminderEmail,
                phone: reminderPhone,
                date: reminderDate
            })
        });

        if (!response.ok) {
            throw new Error('Error al enviar el recordatorio');
        }

        const result = await response.json();
        alert('Recordatorio enviado exitosamente');
    } catch (error) {
        console.error('Error:', error);
        alert('Error al enviar el recordatorio');
    }
});
