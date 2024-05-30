<?php
namespace ProyectoTC\Controllers;

require_once '../db.php';
require_once '../models/DetalleTarjeta.php';

use ProyectoTC\Models\DetalleDeTarjeta;

class DetalleDeTarjetaController {
    private $detalleModel;

    public function __construct($pdo) {
        $this->detalleModel = new DetalleDeTarjeta($pdo);
    }

    public function getByTarjetaId($tarjetaId) {
        $detalle = $this->detalleModel->getByTarjetaId($tarjetaId);
        echo json_encode(['status' => 'success', 'data' => $detalle]);
    }

    public function create() {
        $tarjetaId = $_POST['tarjetaId'];
        $limiteDeCredito = $_POST['limiteDeCredito'];
        $saldoActual = $_POST['saldoActual'];
        $estadoDeTarjeta = $_POST['estadoDeTarjeta'];
        $fechaDeCorte = $_POST['fechaDeCorte'];
        $fechaDePago = $_POST['fechaDePago'];
        $fechaDeActivacion = $_POST['fechaDeActivacion'];
        $interes = $_POST['interes'];

        if ($this->detalleModel->create($tarjetaId, $limiteDeCredito, $saldoActual, $estadoDeTarjeta, $fechaDeCorte, $fechaDePago, $fechaDeActivacion, $interes)) {
            echo json_encode(['status' => 'success', 'message' => 'Detalle de tarjeta creado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear el detalle de la tarjeta']);
        }
    }

    public function update($id) {
        $limiteDeCredito = $_POST['limiteDeCredito'];
        $saldoActual = $_POST['saldoActual'];
        $estadoDeTarjeta = $_POST['estadoDeTarjeta'];
        $fechaDeCorte = $_POST['fechaDeCorte'];
        $fechaDePago = $_POST['fechaDePago'];
        $fechaDeActivacion = $_POST['fechaDeActivacion'];
        $interes = $_POST['interes'];

        if ($this->detalleModel->update($id, $limiteDeCredito, $saldoActual, $estadoDeTarjeta, $fechaDeCorte, $fechaDePago, $fechaDeActivacion, $interes)) {
            echo json_encode(['status' => 'success', 'message' => 'Detalle de tarjeta actualizado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar el detalle de la tarjeta']);
        }
    }

    public function delete($id) {
        if ($this->detalleModel->delete($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Detalle de tarjeta eliminado exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar el detalle de la tarjeta']);
        }
    }
}
?>
