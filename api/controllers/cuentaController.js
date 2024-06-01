const Cuenta = require('../models/cuentaModel');

const getAllCuentas = async (req, res) => {
    try {
        const cuentas = await Cuenta.getAll();
        res.json(cuentas);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const getCuentasByClienteId = async (req, res) => {
    try {
        const cuentas = await Cuenta.getByClienteId(req.params.clienteId);
        res.json(cuentas);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const createCuenta = async (req, res) => {
    try {
        const cuentaId = await Cuenta.create(req.body);
        res.status(201).json({ cuentaId });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

// Otros métodos CRUD pueden ser añadidos aquí

module.exports = {
    getAllCuentas,
    getCuentasByClienteId,
    createCuenta,
};
