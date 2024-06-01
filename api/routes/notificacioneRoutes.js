const express = require('express');
const router = express.Router();
const notificationController = require('..//controllers/notificacionController');

// Ruta para obtener las notificaciones
router.get('/notificaciones', notificationController.getNotificaciones);

module.exports = router;
