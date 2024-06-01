const db = require('./database');

const Notification = {
    getAll: async () => {
        const [rows] = await db.query('SELECT * FROM notificaciones');
        return rows;
    },
    getById: async (id) => {
        const [rows] = await db.query('SELECT * FROM notificaciones WHERE NotificacionID = ?', [id]);
        return rows[0];
    },
    create: async (notification) => {
        const { ClienteID, Descripcion, Monto, FechaHora, Leida } = notification;
        const result = await db.query(
            'INSERT INTO notificaciones (ClienteID, Descripcion, Monto, FechaHora, Leida) VALUES (?, ?, ?, ?, ?)', 
            [ClienteID, Descripcion, Monto, FechaHora, Leida]
        );
        return result[0].insertId;
    },
    update: async (id, notification) => {
        const { ClienteID, Descripcion, Monto, FechaHora, Leida } = notification;
        await db.query(
            'UPDATE notificaciones SET ClienteID = ?, Descripcion = ?, Monto = ?, FechaHora = ?, Leida = ? WHERE NotificacionID = ?',
            [ClienteID, Descripcion, Monto, FechaHora, Leida, id]
        );
    },
    delete: async (id) => {
        await db.query('DELETE FROM notificaciones WHERE NotificacionID = ?', [id]);
    }
};

module.exports = Notification;
