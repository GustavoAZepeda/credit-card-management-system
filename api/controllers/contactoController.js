const db = require('../models/database');

const updateContacto = async (req, res) => {
    const { id } = req.params;
    const { email, telefono, direccion } = req.body;

    try {
        const query = 'UPDATE contacto_del_cliente SET Email = ?, Teléfono = ?, Dirección = ? WHERE ClienteID = ?';
        const values = [email, telefono, direccion, id];
        
        await db.query(query, values);
        res.status(200).json({ message: 'Información de contacto actualizada correctamente' });
    } catch (error) {
        console.error('Error al actualizar la información de contacto:', error);
        res.status(500).json({ message: 'Error al actualizar la información de contacto' });
    }
};

module.exports = { updateContacto };
