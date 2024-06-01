const express = require('express');
const router = express.Router();
const creditLimitController = require('../controllers/creditLimitController');

// Ruta para manejar la solicitud de aumento de límite de crédito
router.post('/credit-limit', creditLimitController.requestCreditLimitIncrease);

module.exports = router;
