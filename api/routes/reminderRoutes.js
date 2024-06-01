const express = require('express');
const router = express.Router();
const reminderController = require('../controllers/reminderController');
const authMiddleware = require('../middleware/authMiddleware');

router.post('/send-reminder', authMiddleware, reminderController.sendReminder);

module.exports = router;
