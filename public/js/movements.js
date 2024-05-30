document.getElementById('movementsForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const startDate = document.getElementById('startDate').value;
    const endDate = document.getElementById('endDate').value;

    console.log('Consulta de movimientos:', { startDate, endDate });

    const results = [
        { date: '2024-05-01', description: 'Compra en tienda', amount: '-100.00' },
        { date: '2024-05-02', description: 'Pago recibido', amount: '200.00' }
    ];

    const movementsResults = document.getElementById('movementsResults');
    let html = '<table>';
    html += '<tr><th>Fecha</th><th>Descripción</th><th>Monto</th></tr>';
    results.forEach(result => {
        html += `<tr><td>${result.date}</td><td>${result.description}</td><td>${result.amount}</td></tr>`;
    });
    html += '</table>';
    movementsResults.innerHTML = html;
});
