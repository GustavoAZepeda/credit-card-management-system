const jwt = require('jsonwebtoken');
const bcrypt = require('bcryptjs');
const Credencial = require('../models/credencialModel');
const nodemailer = require('nodemailer')

const secretKey = 'your_secret_key'; // Cambia esto a una clave secreta segura

const login = async (req, res) => {
    const { codigo, password } = req.body;

    try {
        const credencial = await Credencial.getByCodigo(codigo);

        if (!credencial) {
            return res.status(404).json({ message: 'Usuario no encontrado' });
        }

        const isPasswordValid = await bcrypt.compare(password, credencial.Contraseña);

        if (!isPasswordValid) {
            return res.status(401).json({ message: 'Contraseña incorrecta' });
        }

        const token = jwt.sign({ id: credencial.ClienteID }, secretKey, { expiresIn: '1h' });

        res.json({ token });
    } catch (error) {
        res.status(500).json({ error: error.message });
    }
};

const logout = (req, res) => {
    // Aquí puedes eliminar el token del lado del servidor si estás almacenándolo en algún lugar (por ejemplo, una base de datos)
    res.status(200).json({ message: 'Cierre de sesión exitoso' });
};

const transporter = nodemailer.createTransport({
    service: 'gmail',
    auth: {
        user: 'gazhpz@gmail.com', // Reemplaza con tu correo
        pass: 'iumg nxne kklx rktq' // Reemplaza con tu contraseña
    }
});

const forgotPassword = async (req, res) => {
    const { email } = req.body;

    try {
        const user = await User.findOne({ where: { email } });
        
        if (!user) {
            return res.status(404).json({ message: 'Correo electrónico no encontrado' });
        }

        // Generar un token de restablecimiento de contraseña
        const resetToken = crypto.randomBytes(20).toString('hex');
        const resetTokenExpire = Date.now() + 3600000; // 1 hora de expiración

        user.resetPasswordToken = resetToken;
        user.resetPasswordExpire = resetTokenExpire;
        await user.save();

        // Configurar el correo
        const resetUrl = `http://localhost:3000/reset-password/${resetToken}`;
        const mailOptions = {
            from: 'tu_correo@gmail.com', // Reemplaza con tu correo
            to: email,
            subject: 'Recuperación de Contraseña',
            text: `Ha solicitado restablecer su contraseña. Haga clic en el siguiente enlace para restablecer su contraseña: ${resetUrl}`
        };

        // Enviar el correo
        transporter.sendMail(mailOptions, (error, info) => {
            if (error) {
                console.error(error);
                return res.status(500).json({ message: 'Error al enviar el correo' });
            } else {
                console.log('Correo enviado: ' + info.response);
                return res.status(200).json({ message: 'Correo de recuperación enviado exitosamente' });
            }
        });
    } catch (error) {
        console.error(error);
        res.status(500).json({ message: 'Error al procesar la solicitud' });
    }
};

const resetPassword = async (req, res) => {
    const { token } = req.params;
    const { newPassword } = req.body;

    try {
        const user = await User.findOne({
            where: {
                resetPasswordToken: token,
                resetPasswordExpire: { [Op.gt]: Date.now() }
            }
        });

        if (!user) {
            return res.status(400).json({ message: 'Token de restablecimiento inválido o expirado' });
        }

        user.password = await bcrypt.hash(newPassword, 10);
        user.resetPasswordToken = null;
        user.resetPasswordExpire = null;
        await user.save();

        res.status(200).json({ message: 'Contraseña actualizada correctamente' });
    } catch (error) {
        console.error(error);
        res.status(500).json({ message: 'Error al restablecer la contraseña' });
    }
};


module.exports = {
    login,
    logout,
    forgotPassword,
    resetPassword
};
