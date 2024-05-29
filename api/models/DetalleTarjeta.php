<?php

namespace ProyectoTC\Models;

class DetalleDeTarjeta {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getByTarjetaId($tarjetaId) {
        $stmt = $this->pdo->prepare('SELECT * FROM Detalles_de_Tarjeta WHERE TarjetaID = ?');
        $stmt->execute([$tarjetaId]);
        return $stmt->fetch();
    }

    public function create($tarjetaId, $limiteDeCredito, $saldoActual, $estadoDeTarjeta, $fechaDeCorte, $fechaDePago, $fechaDeActivacion, $interes) {
        $stmt = $this->pdo->prepare('INSERT INTO Detalles_de_Tarjeta (TarjetaID, Límite_de_Crédito, Saldo_Actual, Estado_de_tarjeta, Fecha_de_Corte, Fecha_de_Pago, Fecha_de_activacion, Interes) VALUES (?, ?, ?, ?, ?, ?, ?, ?)');
        return $stmt->execute([$tarjetaId, $limiteDeCredito, $saldoActual, $estadoDeTarjeta, $fechaDeCorte, $fechaDePago, $fechaDeActivacion, $interes]);
    }

    public function update($id, $limiteDeCredito, $saldoActual, $estadoDeTarjeta, $fechaDeCorte, $fechaDePago, $fechaDeActivacion, $interes) {
        $stmt = $this->pdo->prepare('UPDATE Detalles_de_Tarjeta SET Límite_de_Crédito = ?, Saldo_Actual = ?, Estado_de_tarjeta = ?, Fecha_de_Corte = ?, Fecha_de_Pago = ?, Fecha_de_activacion = ?, Interes = ? WHERE DetalleID = ?');
        return $stmt->execute([$limiteDeCredito, $saldoActual, $estadoDeTarjeta, $fechaDeCorte, $fechaDePago, $fechaDeActivacion, $interes, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Detalles_de_Tarjeta WHERE DetalleID = ?');
        return $stmt->execute([$id]);
    }
}
?>
