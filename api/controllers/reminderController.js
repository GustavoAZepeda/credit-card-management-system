const nodemailer = require('nodemailer');

const sendReminder = async (req, res) => {
    const { email, phone, date } = req.body;

    try {
        // Configuración del transportador de nodemailer
        const transporter = nodemailer.createTransport({
            service: 'Gmail',
            auth: {
                user: 'gazhpz@gmail.com',
                pass: 'iumg nxne kklx rktq'
            }
        });

        // Contenido del correo electrónico
        const mailOptions = {
            from: 'gazhpz@gmail.com',
            to: email,
            subject: 'Recordatorio de Pago',
            text: `Hola,

Este es un recordatorio de que tienes un pago pendiente para la fecha: ${date}.

Detalles:
Teléfono: ${phone}

Saludos,
Banco Nexus`
        };

        // Envío del correo electrónico
        await transporter.sendMail(mailOptions);

        res.status(200).json({ message: 'Recordatorio enviado exitosamente' });
    } catch (error) {
        console.error('Error al enviar el recordatorio:', error);
        res.status(500).json({ message: 'Error al enviar el recordatorio' });
    }
};

module.exports = {
    sendReminder,
};
