const express = require('express');
const router = express.Router();
const clienteController = require('../controllers/clienteController');
const contactoController = require('../controllers/contactoController');
const credencialController = require('../controllers/credencialController');
const cuentaController = require('../controllers/cuentaController');
const tarjetaController = require('../controllers/tarjetaController');
const detalleTarjetaController = require('../controllers/detalleTarjetaController');
const transaccionController = require('../controllers/transaccionController');
const pagoController = require('../controllers/pagoController');
const notificacionController = require('../controllers/notificacionController');
const estadoCuentaController = require('../controllers/estadoCuentaController');
const sesionController = require('../controllers/sesionController');
const authMiddleware = require('../middleware/authMiddleware');

// Rutas para clientes
router.get('/clientes', clienteController.getAllClientes);
router.get('/clientes/:id', authMiddleware, clienteController.getClienteById);
router.post('/clientes', clienteController.createCliente);

// Rutas para contactos

// Rutas para credenciales
router.get('/credenciales/cliente/:clienteId', credencialController.getCredencialesByClienteId);
router.post('/credenciales', credencialController.createCredencial);


// Rutas para tarjetas
router.put('/change-pin', authMiddleware, tarjetaController.changePin);

// Rutas para detalles de tarjeta
router.get('/detalle-tarjeta', authMiddleware, detalleTarjetaController.getDetalleForClientId1);
router.put('/update-estado-tarjeta', authMiddleware, detalleTarjetaController.updateEstadoTarjeta);

// Rutas para transacciones
router.get('/transacciones', authMiddleware, transaccionController.getTransaccionesByDateRange);
router.post('/transacciones', transaccionController.getTransaccionesByDateRange);

// Rutas para pagos
router.get('/pagos/transaccion/:transaccionId', pagoController.getPagosByTransaccionId);
router.post('/pagos', pagoController.createPago);

// Rutas para estados de cuenta
router.get('/estados/cuenta/:cuentaId', estadoCuentaController.getEstadosByCuentaId);
router.post('/estados', estadoCuentaController.createEstadoCuenta);


module.exports = router;
