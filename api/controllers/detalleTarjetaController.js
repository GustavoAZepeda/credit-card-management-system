const DetalleTarjeta = require('../models/detalleTarjetaModel');
const Tarjeta = require('../models/tarjetaModel');

const getDetalleForClientId1 = async (req, res) => {
    try {
        const clienteId = req.userId || 1;  // Usamos siempre el ClienteID 1
        const tarjetas = await Tarjeta.getByClienteId(clienteId);
        if (tarjetas.length === 0) {
            return res.status(404).json({ message: 'No se encontraron detalles de la tarjeta' });
        }

        const tarjetaId = tarjetas[0].TarjetaID;
        const detalles = await DetalleTarjeta.getByTarjetaId(tarjetaId);
        if (!detalles) {
            return res.status(404).json({ message: 'Detalles de la tarjeta no encontrados' });
        }
        res.json(detalles);
    } catch (error) {
        console.error(error);
        res.status(500).json({ message: error.message });
    }
};

const updateEstadoTarjeta = async (req, res) => {
    try {
        const { tarjetaId, estado } = req.body;
        await DetalleTarjeta.updateEstado(tarjetaId, estado);
        res.json({ message: 'Estado de la tarjeta actualizado correctamente' });
    } catch (error) {
        console.error(error);
        res.status(500).json({ message: error.message });
    }
};

module.exports = {
    getDetalleForClientId1,
    updateEstadoTarjeta,
};
