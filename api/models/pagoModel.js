const db = require('./database');

const Pago = {
    getByTransaccionId: async (transaccionId) => {
        const [rows] = await db.query('SELECT * FROM Pagos WHERE TransacciónID = ?', [transaccionId]);
        return rows;
    },
    create: async (pago) => {
        const { TransacciónID, CuentaID, FechaHora, Monto } = pago;
        const result = await db.query('INSERT INTO Pagos (TransacciónID, CuentaID, FechaHora, Monto) VALUES (?, ?, ?, ?)', [TransacciónID, CuentaID, FechaHora, Monto]);
        return result[0].insertId;
    },
    // Otros métodos CRUD (update, delete) pueden ser añadidos aquí
};

module.exports = Pago;
