const Cliente = require('../models/clienteModel');

const getAllClientes = async (req, res) => {
    try {
        const clientes = await Cliente.getAll();
        res.json(clientes);
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const getClienteById = async (req, res) => {
    try {
        const cliente = await Cliente.getById(req.params.id);
        if (cliente) {
            res.json(cliente);
        } else {
            res.status(404).json({ message: 'Cliente not found' });
        }
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const createCliente = async (req, res) => {
    try {
        const clienteId = await Cliente.create(req.body);
        res.status(201).json({ clienteId });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

// Otros métodos CRUD pueden ser añadidos aquí

module.exports = {
    getAllClientes,
    getClienteById,
    createCliente,
};
