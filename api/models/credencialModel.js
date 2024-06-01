const db = require('./database');

const Credencial = {
    getByCodigo: async (codigo) => {
        const [rows] = await db.query('SELECT * FROM Credenciales_del_Cliente WHERE ClienteID = ?', [codigo]);
        return rows[0];
    },
    // Otros métodos CRUD pueden ser añadidos aquí
};

module.exports = Credencial;
