<?php
namespace ProyectoTC\Controllers;

require_once '../db.php';
require_once '../models/Sesion.php';

use ProyectoTC\Models\Sesion;

class SesionController {
    private $sesionModel;

    public function __construct($pdo) {
        $this->sesionModel = new Sesion($pdo);
    }

    public function getByClienteId($clienteId) {
        $sesiones = $this->sesionModel->getByClienteId($clienteId);
        echo json_encode(['status' => 'success', 'data' => $sesiones]);
    }

    public function create() {
        $clienteId = $_POST['clienteId'];
        $token = $_POST['token'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaExpiracion = $_POST['fechaExpiracion'];

        if ($this->sesionModel->create($clienteId, $token, $fechaInicio, $fechaExpiracion)) {
            echo json_encode(['status' => 'success', 'message' => 'Sesión creada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear la sesión']);
        }
    }

    public function update($id) {
        $token = $_POST['token'];
        $fechaInicio = $_POST['fechaInicio'];
        $fechaExpiracion = $_POST['fechaExpiracion'];

        if ($this->sesionModel->update($id, $token, $fechaInicio, $fechaExpiracion)) {
            echo json_encode(['status' => 'success', 'message' => 'Sesión actualizada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar la sesión']);
        }
    }

    public function delete($id) {
        if ($this->sesionModel->delete($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Sesión eliminada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar la sesión']);
        }
    }
}
?>
