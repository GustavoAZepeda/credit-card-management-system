const Sesion = require('../models/sesionModel');

const getSesionesByClienteId = async (req, res) => {
    try {
        const sesiones = await Sesion.getByClienteId(req.params.clienteId);
        res.json(sesiones);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const createSesion = async (req, res) => {
    try {
        const sesionId = await Sesion.create(req.body);
        res.status(201).json({ sesionId });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

// Otros métodos CRUD pueden ser añadidos aquí

module.exports = {
    getSesionesByClienteId,
    createSesion,
};
