<?php

namespace ProyectoTC\Models;

class CuentaBancaria {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getByClienteId($clienteId) {
        $stmt = $this->pdo->prepare('SELECT * FROM Cuentas_Bancarias WHERE ClienteID = ?');
        $stmt->execute([$clienteId]);
        return $stmt->fetchAll();
    }

    public function create($clienteId, $numeroDeCuenta, $tipoDeCuenta, $saldo) {
        $stmt = $this->pdo->prepare('INSERT INTO Cuentas_Bancarias (ClienteID, Número_de_Cuenta, Tipo_de_Cuenta, Saldo) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$clienteId, $numeroDeCuenta, $tipoDeCuenta, $saldo]);
    }

    public function update($id, $numeroDeCuenta, $tipoDeCuenta, $saldo) {
        $stmt = $this->pdo->prepare('UPDATE Cuentas_Bancarias SET Número_de_Cuenta = ?, Tipo_de_Cuenta = ?, Saldo = ? WHERE CuentaID = ?');
        return $stmt->execute([$numeroDeCuenta, $tipoDeCuenta, $saldo, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Cuentas_Bancarias WHERE CuentaID = ?');
        return $stmt->execute([$id]);
    }
}
?>
