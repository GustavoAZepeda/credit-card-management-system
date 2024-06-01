document.addEventListener('DOMContentLoaded', async function() {
    const token = localStorage.getItem('token');
    if (!token) {
        alert('No has iniciado sesión');
        window.location.href = '/index.html';
        return;
    }

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

        const saldoDisponible = detalles.Límite_de_Crédito;
        const saldoAlDia = detalles.Saldo_Actual;
        const pagoMinimo = (detalles.Límite_de_Crédito * 0.10).toFixed(2);  // 10% del límite de crédito
        const pagoContado = detalles.Saldo_Actual;
        const fechaPago = new Date(detalles.Fecha_de_Pago).toLocaleDateString('es-ES', { day: 'numeric', month: 'short' });
        const fechaCorte = new Date(detalles.Fecha_de_Corte).toLocaleDateString('es-ES', { day: 'numeric', month: 'short' });
        const interes = detalles.Interes + '%';

        document.getElementById('saldoDisponible').innerText = saldoDisponible;
        document.getElementById('saldoAlDia').innerText = saldoAlDia;
        document.getElementById('pagoMinimo').innerText = pagoMinimo;
        document.getElementById('pagoContado').innerText = pagoContado;
        document.getElementById('fechaPago').innerText = fechaPago;
        document.getElementById('fechaCorte').innerText = fechaCorte;
        document.getElementById('interes').innerText = interes;
    } catch (error) {
        console.error('Error:', error);
        alert('Error al obtener los detalles de la tarjeta');
    }
});
