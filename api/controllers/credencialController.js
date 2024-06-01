const Credencial = require('../models/credencialModel');

const getCredencialesByClienteId = async (req, res) => {
    try {
        const credencial = await Credencial.getByClienteId(req.params.clienteId);
        if (credencial) {
            res.json(credencial);
        } else {
            res.status(404).json({ message: 'Credencial not found' });
        }
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const createCredencial = async (req, res) => {
    try {
        const credencialId = await Credencial.create(req.body);
        res.status(201).json({ credencialId });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

// Otros métodos CRUD pueden ser añadidos aquí

module.exports = {
    getCredencialesByClienteId,
    createCredencial,
};
