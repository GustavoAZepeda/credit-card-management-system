const nodemailer = require('nodemailer');

// Configurar el transporte de nodemailer
const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
        user: 'gazhpz@gmail.com', // Reemplaza con tu correo
        pass: 'iumg nxne kklx rktq' // Reemplaza con tu contraseña
    }
});

// Función para manejar la solicitud de aumento de límite de crédito
const requestCreditLimitIncrease = async (req, res) => {
    const { cardNumber, desiredLimit, email, phoneNumber } = req.body;

    try {
        // Configurar el correo
        const mailOptions = {
            from: 'tu_correo@gmail.com', // Reemplaza con tu correo
            to: email,
            subject: 'Solicitud de Aumento de Límite de Crédito',
            text: `Hemos recibido su solicitud de aumento de límite de crédito a ${desiredLimit}. Nos pondremos en contacto con usted pronto.`
        };

        // Enviar el correo
        transporter.sendMail(mailOptions, (error, info) => {
            if (error) {
                console.error(error);
                return res.status(500).json({ message: 'Error al enviar el correo' });
            } else {
                console.log('Correo enviado: ' + info.response);
                return res.status(200).json({ message: 'Solicitud enviada y correo enviado exitosamente' });
            }
        });
    } catch (error) {
        console.error(error);
        res.status(500).json({ message: 'Error al procesar la solicitud' });
    }
};

module.exports = {
    requestCreditLimitIncrease
};
