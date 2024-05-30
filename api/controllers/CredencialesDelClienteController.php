<?php
namespace ProyectoTC\Controllers;

require_once '../db.php';
require_once '../models/CredencialCliente.php';

use ProyectoTC\Models\CredencialesDelCliente;

class CredencialesDelClienteController {
    private $credencialesModel;

    public function __construct($pdo) {
        $this->credencialesModel = new CredencialesDelCliente($pdo);
    }

    public function getByClienteId($clienteId) {
        $credenciales = $this->credencialesModel->getByClienteId($clienteId);
        echo json_encode(['status' => 'success', 'data' => $credenciales]);
    }

    public function create() {
        $clienteId = $_POST['clienteId'];
        $contraseña = $_POST['contraseña'];

        if ($this->credencialesModel->create($clienteId, $contraseña)) {
            echo json_encode(['status' => 'success', 'message' => 'Credenciales creadas exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear las credenciales']);
        }
    }

    public function update($id) {
        $contraseña = $_POST['contraseña'];

        if ($this->credencialesModel->update($id, $contraseña)) {
            echo json_encode(['status' => 'success', 'message' => 'Credenciales actualizadas exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar las credenciales']);
        }
    }

    public function delete($id) {
        if ($this->credencialesModel->delete($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Credenciales eliminadas exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar las credenciales']);
        }
    }
}
?>
