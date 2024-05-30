<?php
namespace ProyectoTC\Controllers;

require_once '../db.php';
require_once '../models/Pago.php';

use ProyectoTC\Models\Pago;

class PagoController {
    private $pagoModel;

    public function __construct($pdo) {
        $this->pagoModel = new Pago($pdo);
    }

    public function getByCuentaId($cuentaId) {
        $pagos = $this->pagoModel->getByCuentaId($cuentaId);
        echo json_encode(['status' => 'success', 'data' => $pagos]);
    }

    public function create() {
        $transaccionId = $_POST['transaccionId'];
        $cuentaId = $_POST['cuentaId'];
        $fechaHora = $_POST['fechaHora'];
        $monto = $_POST['monto'];

        if ($this->pagoModel->create($transaccionId, $cuentaId, $fechaHora, $monto)) {
            echo json_encode(['status' => 'success', 'message' => 'Pago creado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear el pago']);
        }
    }

    public function update($id) {
        $fechaHora = $_POST['fechaHora'];
        $monto = $_POST['monto'];

        if ($this->pagoModel->update($id, $fechaHora, $monto)) {
            echo json_encode(['status' => 'success', 'message' => 'Pago actualizado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar el pago']);
        }
    }

    public function delete($id) {
        if ($this->pagoModel->delete($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Pago eliminado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el pago']);
        }
    }
}
?>
