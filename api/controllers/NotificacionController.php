<?php
namespace ProyectoTC\Controllers;

require_once '../db.php';
require_once '../models/Notificacion.php';

use ProyectoTC\Models\Notificacion;

class NotificacionController {
    private $notificacionModel;

    public function __construct($pdo) {
        $this->notificacionModel = new Notificacion($pdo);
    }

    public function getByClienteId($clienteId) {
        $notificaciones = $this->notificacionModel->getByClienteId($clienteId);
        echo json_encode(['status' => 'success', 'data' => $notificaciones]);
    }

    public function create() {
        $clienteId = $_POST['clienteId'];
        $descripcion = $_POST['descripcion'];
        $monto = $_POST['monto'];
        $fechaHora = $_POST['fechaHora'];

        if ($this->notificacionModel->create($clienteId, $descripcion, $monto, $fechaHora)) {
            echo json_encode(['status' => 'success', 'message' => 'Notificación creada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear la notificación']);
        }
    }

    public function update($id) {
        $descripcion = $_POST['descripcion'];
        $monto = $_POST['monto'];
        $fechaHora = $_POST['fechaHora'];

        if ($this->notificacionModel->update($id, $descripcion, $monto, $fechaHora)) {
            echo json_encode(['status' => 'success', 'message' => 'Notificación actualizada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar la notificación']);
        }
    }

    public function delete($id) {
        if ($this->notificacionModel->delete($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Notificación eliminada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar la notificación']);
        }
    }
}
?>
