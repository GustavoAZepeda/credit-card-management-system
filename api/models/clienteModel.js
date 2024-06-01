const db = require('./database');

const Cliente = {
    getAll: async () => {
        const [rows] = await db.query('SELECT * FROM Clientes');
        return rows;
    },
    getById: async (id) => {
        const [rows] = await db.query('SELECT * FROM Clientes WHERE ClienteID = ?', [id]);
        return rows[0];
    },
    create: async (cliente) => {
        const { Nombre, DPI, Dirección } = cliente;
        const result = await db.query('INSERT INTO Clientes (Nombre, DPI, Dirección) VALUES (?, ?, ?)', [Nombre, DPI, Dirección]);
        return result[0].insertId;
    },
};

module.exports = Cliente;
