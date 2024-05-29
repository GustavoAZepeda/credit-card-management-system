<?php

namespace ProyectoTC\Models;

class Pago {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getByCuentaId($cuentaId) {
        $stmt = $this->pdo->prepare('SELECT * FROM Pagos WHERE CuentaID = ?');
        $stmt->execute([$cuentaId]);
        return $stmt->fetchAll();
    }

    public function create($transaccionId, $cuentaId, $fechaHora, $monto) {
        $stmt = $this->pdo->prepare('INSERT INTO Pagos (TransacciónID, CuentaID, FechaHora, Monto) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$transaccionId, $cuentaId, $fechaHora, $monto]);
    }

    public function update($id, $fechaHora, $monto) {
        $stmt = $this->pdo->prepare('UPDATE Pagos SET FechaHora = ?, Monto = ? WHERE PagoID = ?');
        return $stmt->execute([$fechaHora, $monto, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Pagos WHERE PagoID = ?');
        return $stmt->execute([$id]);
    }
}
?>
