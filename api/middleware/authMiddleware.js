const jwt = require('jsonwebtoken');

const authMiddleware = (req, res, next) => {
    const authHeader = req.headers['authorization'];
    if (!authHeader) {
        console.log('Token no proporcionado en el encabezado de autorización');
        return res.status(403).json({ message: 'Token no proporcionado' });
    }

    const tokenParts = authHeader.split(' ');
    if (tokenParts.length !== 2 || tokenParts[0] !== 'Bearer') {
        console.log('El formato del token es incorrecto');
        return res.status(403).json({ message: 'Formato de token incorrecto' });
    }

    const token = tokenParts[1];
    if (!token) {
        console.log('Token no proporcionado después de dividir el encabezado');
        return res.status(403).json({ message: 'Token no proporcionado' });
    }

    try {
        const decoded = jwt.verify(token, 'your_secret_key'); // Usa la misma clave secreta
        console.log('Token decodificado correctamente:', decoded);
        req.userId = decoded.id; // Almacena el ClienteID en req.userId
        next();
    } catch (error) {
        console.log('Error al verificar el token:', error.message);
        return res.status(401).json({ message: 'Token inválido' });
    }
};

module.exports = authMiddleware;
