<?php

namespace ProyectoTC\Models;

class EstadoDeCuenta {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getByCuentaId($cuentaId) {
        $stmt = $this->pdo->prepare('SELECT * FROM Estados_de_Cuenta WHERE CuentaID = ?');
        $stmt->execute([$cuentaId]);
        return $stmt->fetchAll();
    }

    public function create($cuentaId, $tarjetaId, $fechaCorte, $saldoInicial, $saldoFinal, $totalPagos, $totalConsumos) {
        $stmt = $this->pdo->prepare('INSERT INTO Estados_de_Cuenta (CuentaID, TarjetaID, FechaCorte, SaldoInicial, SaldoFinal, TotalPagos, TotalConsumos) VALUES (?, ?, ?, ?, ?, ?, ?)');
        return $stmt->execute([$cuentaId, $tarjetaId, $fechaCorte, $saldoInicial, $saldoFinal, $totalPagos, $totalConsumos]);
    }

    public function update($id, $fechaCorte, $saldoInicial, $saldoFinal, $totalPagos, $totalConsumos) {
        $stmt = $this->pdo->prepare('UPDATE Estados_de_Cuenta SET FechaCorte = ?, SaldoInicial = ?, SaldoFinal = ?, TotalPagos = ?, TotalConsumos = ? WHERE EstadoCuentaID = ?');
        return $stmt->execute([$fechaCorte, $saldoInicial, $saldoFinal, $totalPagos, $totalConsumos, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Estados_de_Cuenta WHERE EstadoCuentaID = ?');
        return $stmt->execute([$id]);
    }
}
?>
