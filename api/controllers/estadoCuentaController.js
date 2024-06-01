const EstadoCuenta = require('../models/estadoCuentaModel');

const getEstadosByCuentaId = async (req, res) => {
    try {
        const estados = await EstadoCuenta.getByCuentaId(req.params.cuentaId);
        res.json(estados);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const createEstadoCuenta = async (req, res) => {
    try {
        const estadoCuentaId = await EstadoCuenta.create(req.body);
        res.status(201).json({ estadoCuentaId });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

// Otros métodos CRUD pueden ser añadidos aquí

module.exports = {
    getEstadosByCuentaId,
    createEstadoCuenta,
};
