<?php

namespace ProyectoTC\Models;

class Sesion {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getByClienteId($clienteId) {
        $stmt = $this->pdo->prepare('SELECT * FROM Sesiones WHERE ClienteID = ?');
        $stmt->execute([$clienteId]);
        return $stmt->fetchAll();
    }

    public function create($clienteId, $token, $fechaInicio, $fechaExpiracion) {
        $stmt = $this->pdo->prepare('INSERT INTO Sesiones (ClienteID, Token, FechaInicio, FechaExpiracion) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$clienteId, $token, $fechaInicio, $fechaExpiracion]);
    }

    public function update($id, $token, $fechaInicio, $fechaExpiracion) {
        $stmt = $this->pdo->prepare('UPDATE Sesiones SET Token = ?, FechaInicio = ?, FechaExpiracion = ? WHERE SesionID = ?');
        return $stmt->execute([$token, $fechaInicio, $fechaExpiracion, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Sesiones WHERE SesionID = ?');
        return $stmt->execute([$id]);
    }
}
?>
