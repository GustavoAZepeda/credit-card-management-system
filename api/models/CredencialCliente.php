<?php

namespace ProyectoTC\Models;

class CredencialesDelCliente {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getByClienteId($clienteId) {
        $stmt = $this->pdo->prepare('SELECT * FROM Credenciales_del_Cliente WHERE ClienteID = ?');
        $stmt->execute([$clienteId]);
        return $stmt->fetch();
    }

    public function create($clienteId, $contraseña) {
        $stmt = $this->pdo->prepare('INSERT INTO Credenciales_del_Cliente (ClienteID, Contraseña) VALUES (?, ?)');
        return $stmt->execute([$clienteId, password_hash($contraseña, PASSWORD_BCRYPT)]);
    }

    public function update($id, $contraseña) {
        $stmt = $this->pdo->prepare('UPDATE Credenciales_del_Cliente SET Contraseña = ? WHERE CredencialID = ?');
        return $stmt->execute([password_hash($contraseña, PASSWORD_BCRYPT), $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Credenciales_del_Cliente WHERE CredencialID = ?');
        return $stmt->execute([$id]);
    }
}
?>
