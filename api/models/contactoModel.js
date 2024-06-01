const db = require('./database');

const Contacto = {
    getAll: async () => {
        const [rows] = await db.query('SELECT * FROM Contacto_del_Cliente');
        return rows;
    },
    getByClienteId: async (clienteId) => {
        const [rows] = await db.query('SELECT * FROM Contacto_del_Cliente WHERE ClienteID = ?', [clienteId]);
        return rows;
    },
    create: async (contacto) => {
        const { ClienteID, Email, Teléfono } = contacto;
        const result = await db.query('INSERT INTO Contacto_del_Cliente (ClienteID, Email, Teléfono) VALUES (?, ?, ?)', [ClienteID, Email, Teléfono]);
        return result[0].insertId;
    },
    // Otros métodos CRUD (update, delete) pueden ser añadidos aquí
};

module.exports = Contacto;
