<?php
require_once '../db.php';
require_once '../models/ContactoCliente.php';

use ProyectoTC\Models\ContactoCliente;

class ContactoClienteController {
    private $contactoModel;

    public function __construct($pdo) {
        $this->contactoModel = new ContactoCliente($pdo);
    }

    public function getByClienteId($clienteId) {
        $contactos = $this->contactoModel->getByClienteId($clienteId);
        echo json_encode(['status' => 'success', 'data' => $contactos]);
    }

    public function create() {
        $clienteId = $_POST['clienteId'];
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];

        if ($this->contactoModel->create($clienteId, $email, $telefono)) {
            echo json_encode(['status' => 'success', 'message' => 'Contacto creado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear el contacto']);
        }
    }

    public function update($id) {
        $email = $_POST['email'];
        $telefono = $_POST['telefono'];

        if ($this->contactoModel->update($id, $email, $telefono)) {
            echo json_encode(['status' => 'success', 'message' => 'Contacto actualizado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar el contacto']);
        }
    }

    public function delete($id) {
        if ($this->contactoModel->delete($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Contacto eliminado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el contacto']);
        }
    }
}
?>
