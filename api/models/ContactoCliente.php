<?php

namespace ProyectoTC\Models;

class ContactoDelCliente {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getByClienteId($clienteId) {
        $stmt = $this->pdo->prepare('SELECT * FROM Contacto_del_Cliente WHERE ClienteID = ?');
        $stmt->execute([$clienteId]);
        return $stmt->fetchAll();
    }

    public function create($clienteId, $email, $telefono) {
        $stmt = $this->pdo->prepare('INSERT INTO Contacto_del_Cliente (ClienteID, Email, Teléfono) VALUES (?, ?, ?)');
        return $stmt->execute([$clienteId, $email, $telefono]);
    }

    public function update($id, $email, $telefono) {
        $stmt = $this->pdo->prepare('UPDATE Contacto_del_Cliente SET Email = ?, Teléfono = ? WHERE ContactoID = ?');
        return $stmt->execute([$email, $telefono, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM Contacto_del_Cliente WHERE ContactoID = ?');
        return $stmt->execute([$id]);
    }
}
?>
