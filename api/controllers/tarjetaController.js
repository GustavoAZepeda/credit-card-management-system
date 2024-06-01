const Tarjeta = require('../models/tarjetaModel');

const changePin = async (req, res) => {
    const { tarjetaId, pinActual, pinNuevo } = req.body;

    try {
        const tarjeta = await Tarjeta.findById(tarjetaId);

        if (!tarjeta) {
            return res.status(404).json({ message: 'Tarjeta no encontrada' });
        }

        if (tarjeta.PIN != pinActual) {
            return res.status(400).json({ message: 'PIN actual incorrecto' });
        }

        await Tarjeta.updatePin(tarjetaId, pinNuevo);

        res.status(200).json({ message: 'PIN actualizado correctamente' });
    } catch (error) {
        console.error(error);
        res.status(500).json({ message: 'Error al cambiar el PIN' });
    }
};

module.exports = {
    changePin,
};
