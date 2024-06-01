const db = require('./database');

const Cuenta = {
    getAll: async () => {
        const [rows] = await db.query('SELECT * FROM Cuentas_Bancarias');
        return rows;
    },
    getByClienteId: async (clienteId) => {
        const [rows] = await db.query('SELECT * FROM Cuentas_Bancarias WHERE ClienteID = ?', [clienteId]);
        return rows;
    },
    create: async (cuenta) => {
        const { ClienteID, Número_de_Cuenta, Tipo_de_Cuenta, Saldo } = cuenta;
        const result = await db.query('INSERT INTO Cuentas_Bancarias (ClienteID, Número_de_Cuenta, Tipo_de_Cuenta, Saldo) VALUES (?, ?, ?, ?)', [ClienteID, Número_de_Cuenta, Tipo_de_Cuenta, Saldo]);
        return result[0].insertId;
    },
    // Otros métodos CRUD (update, delete) pueden ser añadidos aquí
};

module.exports = Cuenta;
