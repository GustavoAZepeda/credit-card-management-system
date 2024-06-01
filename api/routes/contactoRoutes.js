const express = require('express');
const router = express.Router();
const { updateContacto } = require('../controllers/contactoController');

router.put('/:id', updateContacto);

module.exports = router;
