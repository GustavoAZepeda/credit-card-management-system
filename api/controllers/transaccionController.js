const Transaccion = require('../models/transaccionModel');

const getTransaccionesByDateRange = async (req, res) => {
    const { startDate, endDate } = req.query;

    try {
        const transacciones = await Transaccion.findByDateRange(startDate, endDate);
        res.status(200).json(transacciones);
    } catch (error) {
        console.error(error);
        res.status(500).json({ message: 'Error al obtener las transacciones' });
    }
};

module.exports = {
    getTransaccionesByDateRange,
    // otros métodos
};
