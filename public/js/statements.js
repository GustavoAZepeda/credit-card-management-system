document.getElementById('statementsForm').addEventListener('submit', function(e) {
    e.preventDefault();
    const month = document.getElementById('month').value;
    const year = document.getElementById('year').value;

    console.log('Consulta de estados de cuenta:', { month, year });

    const results = [
        { date: '2024-05-01', description: 'Saldo inicial', amount: '1000.00' },
        { date: '2024-05-31', description: 'Saldo final', amount: '1100.00' }
    ];
 
    const statementsResults = document.getElementById('statementsResults');
    let html = '<table>';
    html += '<tr><th>Fecha</th><th>Descripción</th><th>Monto</th></tr>';
    results.forEach(result => {
        html += `<tr><td>${result.date}</td><td>${result.description}</td><td>${result.amount}</td></tr>`;
    });
    html += '</table>';
    statementsResults.innerHTML = html;
});
