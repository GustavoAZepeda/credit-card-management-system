<?php
namespace ProyectoTC\Controllers;

require_once '../db.php';
require_once '../models/Transaccion.php';

use ProyectoTC\Models\Transaccion;

class TransaccionController {
    private $transaccionModel;

    public function __construct($pdo) {
        $this->transaccionModel = new Transaccion($pdo);
    }

    public function getByTarjetaId($tarjetaId) {
        $transacciones = $this->transaccionModel->getByTarjetaId($tarjetaId);
        echo json_encode(['status' => 'success', 'data' => $transacciones]);
    }

    public function create() {
        $tarjetaId = $_POST['tarjetaId'];
        $fechaHora = $_POST['fechaHora'];
        $monto = $_POST['monto'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];

        if ($this->transaccionModel->create($tarjetaId, $fechaHora, $monto, $tipo, $descripcion)) {
            echo json_encode(['status' => 'success', 'message' => 'Transacción creada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear la transacción']);
        }
    }

    public function update($id) {
        $fechaHora = $_POST['fechaHora'];
        $monto = $_POST['monto'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];

        if ($this->transaccionModel->update($id, $fechaHora, $monto, $tipo, $descripcion)) {
            echo json_encode(['status' => 'success', 'message' => 'Transacción actualizada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar la transacción']);
        }
    }

    public function delete($id) {
        if ($this->transaccionModel->delete($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Transacción eliminada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar la transacción']);
        }
    }
}
?>
