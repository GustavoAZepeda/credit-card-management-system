const db = require('./database');

const Transaccion = {
    findByDateRange: async (startDate, endDate) => {
        const [rows] = await db.query('SELECT * FROM Transacciones WHERE FechaHora BETWEEN ? AND ?', [startDate, endDate]);
        return rows;
    },
    // otros métodos
};

module.exports = Transaccion;
