const Notification = require('../models/notificacionModel');

const getNotificaciones = async (req, res) => {
    try {
        const notificaciones = await Notification.getAll();
        res.json(notificaciones);
    } catch (error) {
        console.error('Error al obtener las notificaciones:', error);
        res.status(500).json({ message: 'Error al obtener las notificaciones' });
    }
};

module.exports = {
    getNotificaciones,
};
