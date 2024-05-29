<?php

namespace ProyectoTC\Models;

class Tarjeta {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getByClienteId($clienteId) {
        $stmt = $this->pdo->prepare('SELECT * FROM Tarjetas WHERE ClienteID = ?');
        $stmt->execute([$clienteId]);
        return $stmt->fetchAll();
    }

    public function create($clienteId, $numeroDeTarjeta, $fechaDeExpiracion, $cvv, $pin) {
        $stmt = $this->pdo->prepare('INSERT INTO Tarjetas (ClienteID, Número_de_Tarjeta, Fecha_de_Expiración, CVV, PIN) VALUES (?, ?, ?, ?, ?)');
        return $stmt->execute([$clienteId, $numeroDeTarjeta, $fechaDeExpiracion, $cvv, $pin]);
    }

    public function update($id, $numeroDeTarjeta, $fechaDeExpiracion, $cvv, $pin) {
        $stmt = $this->pdo->prepare('UPDATE Tarjetas SET Número_de_Tarjeta = ?, Fecha_de_Expiración = ?, CVV = ?, PIN = ? WHERE TarjetaID = ?');
        return $stmt->execute([$numeroDeTarjeta, $fechaDeExpiracion, $cvv, $pin, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Tarjetas WHERE TarjetaID = ?');
        return $stmt->execute([$id]);
    }
}
?>
