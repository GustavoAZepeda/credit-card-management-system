const db = require('./database');

const Sesion = {
    getByClienteId: async (clienteId) => {
        const [rows] = await db.query('SELECT * FROM Sesiones WHERE ClienteID = ?', [clienteId]);
        return rows;
    },
    create: async (sesion) => {
        const { ClienteID, Token, FechaInicio, FechaExpiracion } = sesion;
        const result = await db.query('INSERT INTO Sesiones (ClienteID, Token, FechaInicio, FechaExpiracion) VALUES (?, ?, ?, ?)', [ClienteID, Token, FechaInicio, FechaExpiracion]);
        return result[0].insertId;
    },
    // Otros métodos CRUD (update, delete) pueden ser añadidos aquí
};

module.exports = Sesion;
