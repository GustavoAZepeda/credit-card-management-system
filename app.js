const express = require('express');
const cors = require('cors');
const path = require('path');
const app = express();
const port = 3000;

app.use(cors());
app.use(express.json());
app.use(express.urlencoded({ extended: true }));

// Servir archivos estáticos desde la carpeta 'public'
app.use(express.static(path.join(__dirname, 'public')));

// Importar rutas

const creditCardRoutes = require('./api/routes/creditCardRoutes');
const authRoutes = require('./api/routes/authRoutes');
const creditLimitRoutes = require('./api/routes/creditLimitRoutes');
const notificationRoutes = require('./api/routes/notificacioneRoutes');
const reminderRoutes = require('./api/routes/reminderRoutes');
const contactoRoutes = require('./api/routes/contactoRoutes');

// Usar rutas
app.use('/api', creditLimitRoutes);
app.use('/api', creditCardRoutes);
app.use('/auth', authRoutes);
app.use('/api', notificationRoutes);
app.use('/api', reminderRoutes);
app.use('/api/contacto', contactoRoutes);




// Ruta de prueba
app.get('/auth/test', (req, res) => {
    res.send('Ruta de autenticación funcionando');
});

app.listen(port, () => {
    console.log(`Server is running on http://localhost:${port}`);
});