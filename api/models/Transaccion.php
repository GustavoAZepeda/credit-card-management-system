<?php

namespace ProyectoTC\Models;

class Transaccion {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getByTarjetaId($tarjetaId) {
        $stmt = $this->pdo->prepare('SELECT * FROM Transacciones WHERE TarjetaID = ?');
        $stmt->execute([$tarjetaId]);
        return $stmt->fetchAll();
    }

    public function create($tarjetaId, $fechaHora, $monto, $tipo, $descripcion) {
        $stmt = $this->pdo->prepare('INSERT INTO Transacciones (TarjetaID, FechaHora, Monto, Tipo, Descripción) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$tarjetaId, $fechaHora, $monto, $tipo, $descripcion]);
    }

    public function update($id, $fechaHora, $monto, $tipo, $descripcion) {
        $stmt = $this->pdo->prepare('UPDATE Transacciones SET FechaHora = ?, Monto = ?, Tipo = ?, Descripción = ? WHERE TransacciónID = ?');
        return $stmt->execute([$fechaHora, $monto, $tipo, $descripcion, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Transacciones WHERE TransacciónID = ?');
        return $stmt->execute([$id]);
    }
}
?>
