<?php
namespace ProyectoTC\Controllers;

require_once '../db.php';
require_once '../models/EstadoDeCuenta.php';

use ProyectoTC\Models\EstadoDeCuenta;

class EstadoDeCuentaController {
    private $estadoModel;

    public function __construct($pdo) {
        $this->estadoModel = new EstadoDeCuenta($pdo);
    }

    public function getByCuentaId($cuentaId) {
        $estados = $this->estadoModel->getByCuentaId($cuentaId);
        echo json_encode(['status' => 'success', 'data' => $estados]);
    }

    public function create() {
        $cuentaId = $_POST['cuentaId'];
        $tarjetaId = $_POST['tarjetaId'];
        $fechaCorte = $_POST['fechaCorte'];
        $saldoInicial = $_POST['saldoInicial'];
        $saldoFinal = $_POST['saldoFinal'];
        $totalPagos = $_POST['totalPagos'];
        $totalConsumos = $_POST['totalConsumos'];

        if ($this->estadoModel->create($cuentaId, $tarjetaId, $fechaCorte, $saldoInicial, $saldoFinal, $totalPagos, $totalConsumos)) {
            echo json_encode(['status' => 'success', 'message' => 'Estado de cuenta creado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear el estado de cuenta']);
        }
    }

    public function update($id) {
        $fechaCorte = $_POST['fechaCorte'];
        $saldoInicial = $_POST['saldoInicial'];
        $saldoFinal = $_POST['saldoFinal'];
        $totalPagos = $_POST['totalPagos'];
        $totalConsumos = $_POST['totalConsumos'];

        if ($this->estadoModel->update($id, $fechaCorte, $saldoInicial, $saldoFinal, $totalPagos, $totalConsumos)) {
            echo json_encode(['status' => 'success', 'message' => 'Estado de cuenta actualizado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar el estado de cuenta']);
        }
    }

    public function delete($id) {
        if ($this->estadoModel->delete($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Estado de cuenta eliminado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el estado de cuenta']);
        }
    }
}
?>
