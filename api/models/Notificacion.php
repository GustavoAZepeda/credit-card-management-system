<?php

namespace ProyectoTC\Models;

class Notificacion {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getByClienteId($clienteId) {
        $stmt = $this->pdo->prepare('SELECT * FROM Notificaciones WHERE ClienteID = ?');
        $stmt->execute([$clienteId]);
        return $stmt->fetchAll();
    }

    public function create($clienteId, $descripcion, $monto, $fechaHora) {
        $stmt = $this->pdo->prepare('INSERT INTO Notificaciones (ClienteID, Descripcion, Monto, FechaHora) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$clienteId, $descripcion, $monto, $fechaHora]);
    }

    public function update($id, $descripcion, $monto, $fechaHora) {
        $stmt = $this->pdo->prepare('UPDATE Notificaciones SET Descripcion = ?, Monto = ?, FechaHora = ? WHERE NotificacionID = ?');
        return $stmt->execute([$descripcion, $monto, $fechaHora, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Notificaciones WHERE NotificacionID = ?');
        return $stmt->execute([$id]);
    }
}
?>
