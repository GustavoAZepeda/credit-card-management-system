<?php

namespace ProyectoTC\Models;

class Cliente {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM Clientes');
        return $stmt->fetchAll();
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM Clientes WHERE ClienteID = ?');
        $stmt->execute([$id]);
        return $stmt->fetch();
    }

    public function create($nombre, $dpi, $direccion) {
        $stmt = $this->pdo->prepare('INSERT INTO Clientes (Nombre, DPI, Dirección) VALUES (?, ?, ?)');
        return $stmt->execute([$nombre, $dpi, $direccion]);
    }

    public function update($id, $nombre, $dpi, $direccion) {
        $stmt = $this->pdo->prepare('UPDATE Clientes SET Nombre = ?, DPI = ?, Dirección = ? WHERE ClienteID = ?');
        return $stmt->execute([$nombre, $dpi, $direccion, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Clientes WHERE ClienteID = ?');
        return $stmt->execute([$id]);
    }
}
?>
