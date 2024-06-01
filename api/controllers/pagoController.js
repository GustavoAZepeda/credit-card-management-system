const Pago = require('../models/pagoModel');

const getPagosByTransaccionId = async (req, res) => {
    try {
        const pagos = await Pago.getByTransaccionId(req.params.transaccionId);
        res.json(pagos);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const createPago = async (req, res) => {
    try {
        const pagoId = await Pago.create(req.body);
        res.status(201).json({ pagoId });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

// Otros métodos CRUD pueden ser añadidos aquí

module.exports = {
    getPagosByTransaccionId,
    createPago,
};
