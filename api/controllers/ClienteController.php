<?php
require_once '../db.php';
require_once '../models/Cliente.php';

use ProyectoTC\Models\Cliente;

class ClienteController {
    private $clienteModel;

    public function __construct($pdo) {
        $this->clienteModel = new Cliente($pdo);
    }

    public function getAll() {
        $clientes = $this->clienteModel->getAll();
        echo json_encode(['status' => 'success', 'data' => $clientes]);
    }

    public function getById($id) {
        $cliente = $this->clienteModel->getById($id);
        echo json_encode(['status' => 'success', 'data' => $cliente]);
    }

    public function create() {
        $nombre = $_POST['nombre'];
        $dpi = $_POST['dpi'];
        $direccion = $_POST['direccion'];

        if ($this->clienteModel->create($nombre, $dpi, $direccion)) {
            echo json_encode(['status' => 'success', 'message' => 'Cliente creado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear el cliente']);
        }
    }

    public function update($id) {
        $nombre = $_POST['nombre'];
        $dpi = $_POST['dpi'];
        $direccion = $_POST['direccion'];

        if ($this->clienteModel->update($id, $nombre, $dpi, $direccion)) {
            echo json_encode(['status' => 'success', 'message' => 'Cliente actualizado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar el cliente']);
        }
    }

    public function delete($id) {
        if ($this->clienteModel->delete($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Cliente eliminado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el cliente']);
        }
    }
}
?>
