const db = require('./database');

const DetalleTarjeta = {
    getByTarjetaId: async (tarjetaId) => {
        const [rows] = await db.query('SELECT * FROM Detalles_de_tarjeta WHERE TarjetaID = ?', [tarjetaId]);
        return rows[0]; // Retornar el primer detalle encontrado
    },
    updateEstado: async (tarjetaId, estado) => {
        await db.query('UPDATE Detalles_de_tarjeta SET Estado = ? WHERE TarjetaID = ?', [estado, tarjetaId]);
    },
    // Otros métodos CRUD pueden ser añadidos aquí
};

module.exports = DetalleTarjeta;
