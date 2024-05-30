<?php
namespace ProyectoTC\Controllers;

require_once '../db.php';
require_once '../models/Tarjeta.php';

use ProyectoTC\Models\Tarjeta;

class TarjetaController {
    private $tarjetaModel;

    public function __construct($pdo) {
        $this->tarjetaModel = new Tarjeta($pdo);
    }

    public function getByClienteId($clienteId) {
        $tarjetas = $this->tarjetaModel->getByClienteId($clienteId);
        echo json_encode(['status' => 'success', 'data' => $tarjetas]);
    }

    public function create() {
        $clienteId = $_POST['clienteId'];
        $numeroDeTarjeta = $_POST['numeroDeTarjeta'];
        $fechaDeExpiracion = $_POST['fechaDeExpiracion'];
        $cvv = $_POST['cvv'];
        $pin = $_POST['pin'];

        if ($this->tarjetaModel->create($clienteId, $numeroDeTarjeta, $fechaDeExpiracion, $cvv, $pin)) {
            echo json_encode(['status' => 'success', 'message' => 'Tarjeta creada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al crear la tarjeta']);
        }
    }

    public function update($id) {
        $numeroDeTarjeta = $_POST['numeroDeTarjeta'];
        $fechaDeExpiracion = $_POST['fechaDeExpiracion'];
        $cvv = $_POST['cvv'];
        $pin = $_POST['pin'];

        if ($this->tarjetaModel->update($id, $numeroDeTarjeta, $fechaDeExpiracion, $cvv, $pin)) {
            echo json_encode(['status' => 'success', 'message' => 'Tarjeta actualizada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al actualizar la tarjeta']);
        }
    }

    public function delete($id) {
        if ($this->tarjetaModel->delete($id)) {
            echo json_encode(['status' => 'success', 'message' => 'Tarjeta eliminada exitosamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al eliminar la tarjeta']);
        }
    }
}
?>
