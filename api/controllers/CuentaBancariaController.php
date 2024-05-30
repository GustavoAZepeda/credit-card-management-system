<?php
namespace ProyectoTC\Controllers;

require_once '../db.php';
require_once '../models/Cuenta.php';

use ProyectoTC\Models\CuentaBancaria;

class CuentaBancariaController {
    private $cuentaModel;

    public function __construct($pdo) {
        $this->cuentaModel = new CuentaBancaria($pdo);
    }

    public function getByClienteId($clienteId) {
        $cuentas = $this->cuentaModel->getByClienteId($clienteId);
        echo json_encode(['status' => 'success', 'data' => $cuentas]);
    }

    public function create() {
        $clienteId = $_POST['clienteId'];
        $numeroDeCuenta = $_POST['numeroDeCuenta'];
        $tipoDeCuenta = $_POST['tipoDeCuenta'];
        $saldo = $_POST['saldo'];

        if ($this->cuentaModel->create($clienteId, $numeroDeCuenta, $tipoDeCuenta, $saldo)) {
            echo json_encode(['status' => 'success', 'message' => 'Cuenta bancaria creada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear la cuenta bancaria']);
        }
    }

    public function update($id) {
        $numeroDeCuenta = $_POST['numeroDeCuenta'];
        $tipoDeCuenta = $_POST['tipoDeCuenta'];
        $saldo = $_POST['saldo'];

        if ($this->cuentaModel->update($id, $numeroDeCuenta, $tipoDeCuenta, $saldo)) {
            echo json_encode(['status' => 'success', 'message' => 'Cuenta bancaria actualizada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar la cuenta bancaria']);
        }
    }

    public function delete($id) {
        if ($this->cuentaModel->delete($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Cuenta bancaria eliminada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar la cuenta bancaria']);
        }
    }
}
?>
