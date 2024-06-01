const express = require('express');
const router = express.Router();
const authController = require('../controllers/authController');

router.post('/login', authController.login);
router.post('/logout', authController.logout);
router.post('/forgot-password', authController.forgotPassword);
router.post('/reset-password/:token', authController.resetPassword);

// Ruta de prueba
router.get('/test', (req, res) => {
    res.send('Ruta de autenticación funcionando');
});

module.exports = router;
