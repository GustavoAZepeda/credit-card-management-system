const db = require('./database');

const Tarjeta = {
    getByClienteId: async (TarjetaID) => {
        const [rows] = await db.query('SELECT * FROM Detalles_de_tarjeta WHERE TarjetaID = ?', [TarjetaID]);
        return rows; // Retornar todas las filas
    },
    updatePin: async (tarjetaId, pinNuevo) => {
        await db.query('UPDATE Tarjetas SET PIN = ? WHERE TarjetaID = ?', [pinNuevo, tarjetaId]);
    },
    // Otros métodos CRUD pueden ser añadidos aquí
};

module.exports = Tarjeta;
