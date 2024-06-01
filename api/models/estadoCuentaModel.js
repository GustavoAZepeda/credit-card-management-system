const db = require('./database');

const EstadoCuenta = {
    getByCuentaId: async (cuentaId) => {
        const [rows] = await db.query('SELECT * FROM Estados_de_Cuenta WHERE CuentaID = ?', [cuentaId]);
        return rows;
    },
    create: async (estado) => {
        const { CuentaID, TarjetaID, FechaCorte, SaldoInicial, SaldoFinal, TotalPagos, TotalConsumos } = estado;
        const result = await db.query('INSERT INTO Estados_de_Cuenta (CuentaID, TarjetaID, FechaCorte, SaldoInicial, SaldoFinal, TotalPagos, TotalConsumos) VALUES (?, ?, ?, ?, ?, ?, ?)', [CuentaID, TarjetaID, FechaCorte, SaldoInicial, SaldoFinal, TotalPagos, TotalConsumos]);
        return result[0].insertId;
    },
    // Otros métodos CRUD (update, delete) pueden ser añadidos aquí
};

module.exports = EstadoCuenta;
