<?php
/* The `require_once` statements in the PHP code are used to include external PHP files into the
current script. In this case, the code is including various controller files and a database
connection file that are necessary for the functionality of the API. */
require_once '../db.php';   
require_once '../controllers/ClienteController.php';
require_once '../controllers/ContactoDelClienteController.php';
require_once '../controllers/CredencialesDelClienteController.php';
require_once '../controllers/CuentaBancariaController.php';
require_once '../controllers/DetalleDeTarjetaController.php';
require_once '../controllers/EstadoDeCuentaController.php';
require_once '../controllers/NotificacionController.php';
require_once '../controllers/PagoController.php';
require_once '../controllers/SesionController.php';
require_once '../controllers/TarjetaController.php';
require_once '../controllers/TransaccionController.php';

use ProyectoTC\Controllers\ClienteController;
use ProyectoTC\Controllers\ContactoDelClienteController;
use ProyectoTC\Controllers\CredencialesDelClienteController;
use ProyectoTC\Controllers\CuentaBancariaController;
use ProyectoTC\Controllers\DetalleDeTarjetaController;
use ProyectoTC\Controllers\EstadoDeCuentaController;
use ProyectoTC\Controllers\NotificacionController;
use ProyectoTC\Controllers\PagoController;
use ProyectoTC\Controllers\SesionController;
use ProyectoTC\Controllers\TarjetaController;
use ProyectoTC\Controllers\TransaccionController;

$pdo = new PDO('mysql:host=localhost;dbname=Proyecto_TC', 'root', 'Patineta1@$');

$clienteController = new ClienteController($pdo);
$contactoDelClienteController = new ContactoDelClienteController($pdo);
$credencialesDelClienteController = new CredencialesDelClienteController($pdo);
$cuentaBancariaController = new CuentaBancariaController($pdo);
$tarjetaController = new TarjetaController($pdo);
$detalleDeTarjetaController = new DetalleDeTarjetaController($pdo);
$transaccionController = new TransaccionController($pdo);
$pagoController = new PagoController($pdo);
$notificacionController = new NotificacionController($pdo);
$estadoDeCuentaController = new EstadoDeCuentaController($pdo);
$sesionController = new SesionController($pdo);

// Get the HTTP method, path and body of the request
$method = $_SERVER['REQUEST_METHOD'];
$path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);

// Handle CORS
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE, OPTIONS");
header("Access-Control-Allow-Headers: Content-Type");

// Preflight request handling for CORS
if ($method === 'OPTIONS') {
    http_response_code(200);
    exit();
}

// Route the request
switch ($path) {
    case '/api/clientes':
        if ($method == 'GET') {
            $clienteController->getAll();
        } elseif ($method == 'POST') {
            $clienteController->create();
        }
        break;

    case (preg_match('/\/api\/clientes\/(\d+)/', $path, $matches) ? true : false):
        $id = $matches[1];
        if ($method == 'GET') {
            $clienteController->getById($id);
        } elseif ($method == 'PUT') {
            $clienteController->update($id);
        } elseif ($method == 'DELETE') {
            $clienteController->delete($id);
        }
        break;

    case '/api/contactos':
        if ($method == 'POST') {
            $contactoDelClienteController->create();
        }
        break;

    case (preg_match('/\/api\/contactos\/cliente\/(\d+)/', $path, $matches) ? true : false):
        $clienteId = $matches[1];
        if ($method == 'GET') {
            $contactoDelClienteController->getByClienteId($clienteId);
        }
        break;

    case (preg_match('/\/api\/contactos\/(\d+)/', $path, $matches) ? true : false):
        $id = $matches[1];
        if ($method == 'PUT') {
            $contactoDelClienteController->update($id);
        } elseif ($method == 'DELETE') {
            $contactoDelClienteController->delete($id);
        }
        break;

    case '/api/credenciales':
        if ($method == 'POST') {
            $credencialesDelClienteController->create();
        }
        break;

    case (preg_match('/\/api\/credenciales\/cliente\/(\d+)/', $path, $matches) ? true : false):
        $clienteId = $matches[1];
        if ($method == 'GET') {
            $credencialesDelClienteController->getByClienteId($clienteId);
        }
        break;

    case (preg_match('/\/api\/credenciales\/(\d+)/', $path, $matches) ? true : false):
        $id = $matches[1];
        if ($method == 'PUT') {
            $credencialesDelClienteController->update($id);
        } elseif ($method == 'DELETE') {
            $credencialesDelClienteController->delete($id);
        }
        break;

    case '/api/cuentas':
        if ($method == 'POST') {
            $cuentaBancariaController->create();
        }
        break;

    case (preg_match('/\/api\/cuentas\/cliente\/(\d+)/', $path, $matches) ? true : false):
        $clienteId = $matches[1];
        if ($method == 'GET') {
            $cuentaBancariaController->getByClienteId($clienteId);
        }
        break;

    case (preg_match('/\/api\/cuentas\/(\d+)/', $path, $matches) ? true : false):
        $id = $matches[1];
        if ($method == 'PUT') {
            $cuentaBancariaController->update($id);
        } elseif ($method == 'DELETE') {
            $cuentaBancariaController->delete($id);
        }
        break;

    case '/api/tarjetas':
        if ($method == 'POST') {
            $tarjetaController->create();
        }
        break;

    case (preg_match('/\/api\/tarjetas\/cliente\/(\d+)/', $path, $matches) ? true : false):
        $clienteId = $matches[1];
        if ($method == 'GET') {
            $tarjetaController->getByClienteId($clienteId);
        }
        break;

    case (preg_match('/\/api\/tarjetas\/(\d+)/', $path, $matches) ? true : false):
        $id = $matches[1];
        if ($method == 'PUT') {
            $tarjetaController->update($id);
        } elseif ($method == 'DELETE') {
            $tarjetaController->delete($id);
        }
        break;

    case '/api/detalles-tarjeta':
        if ($method == 'POST') {
            $detalleDeTarjetaController->create();
        }
        break;

    case (preg_match('/\/api\/detalles-tarjeta\/tarjeta\/(\d+)/', $path, $matches) ? true : false):
        $tarjetaId = $matches[1];
        if ($method == 'GET') {
            $detalleDeTarjetaController->getByTarjetaId($tarjetaId);
        }
        break;

    case (preg_match('/\/api\/detalles-tarjeta\/(\d+)/', $path, $matches) ? true : false):
        $id = $matches[1];
        if ($method == 'PUT') {
            $detalleDeTarjetaController->update($id);
        } elseif ($method == 'DELETE') {
            $detalleDeTarjetaController->delete($id);
        }
        break;

    case '/api/transacciones':
        if ($method == 'POST') {
            $transaccionController->create();
        }
        break;

    case (preg_match('/\/api\/transacciones\/tarjeta\/(\d+)/', $path, $matches) ? true : false):
        $tarjetaId = $matches[1];
        if ($method == 'GET') {
            $transaccionController->getByTarjetaId($tarjetaId);
        }
        break;

    case (preg_match('/\/api\/transacciones\/(\d+)/', $path, $matches) ? true : false):
        $id = $matches[1];
        if ($method == 'PUT') {
            $transaccionController->update($id);
        } elseif ($method == 'DELETE') {
            $transaccionController->delete($id);
        }
        break;

    case '/api/pagos':
        if ($method == 'POST') {
            $pagoController->create();
        }
        break;

    case (preg_match('/\/api\/pagos\/cuenta\/(\d+)/', $path, $matches) ? true : false):
        $cuentaId = $matches[1];
        if ($method == 'GET') {
            $pagoController->getByCuentaId($cuentaId);
        }
        break;

    case (preg_match('/\/api\/pagos\/(\d+)/', $path, $matches) ? true : false):
        $id = $matches[1];
        if ($method == 'PUT') {
            $pagoController->update($id);
        } elseif ($method == 'DELETE') {
            $pagoController->delete($id);
        }
        break;

    case '/api/notificaciones':
        if ($method == 'POST') {
            $notificacionController->create();
        }
        break;

    case (preg_match('/\/api\/notificaciones\/cliente\/(\d+)/', $path, $matches) ? true : false):
        $clienteId = $matches[1];
        if ($method == 'GET') {
            $notificacionController->getByClienteId($clienteId);
        }
        break;

    case (preg_match('/\/api\/notificaciones\/(\d+)/', $path, $matches) ? true : false):
        $id = $matches[1];
        if ($method == 'PUT') {
            $notificacionController->update($id);
        } elseif ($method == 'DELETE') {
            $notificacionController->delete($id);
        }
        break;

    case '/api/estados-cuenta':
        if ($method == 'POST') {
            $estadoDeCuentaController->create();
        }
        break;

    case (preg_match('/\/api\/estados-cuenta\/cuenta\/(\d+)/', $path, $matches) ? true : false):
        $cuentaId = $matches[1];
        if ($method == 'GET') {
            $estadoDeCuentaController->getByCuentaId($cuentaId);
        }
        break;

    case (preg_match('/\/api\/estados-cuenta\/(\d+)/', $path, $matches) ? true : false):
        $id = $matches[1];
        if ($method == 'PUT') {
            $estadoDeCuentaController->update($id);
        } elseif ($method == 'DELETE') {
            $estadoDeCuentaController->delete($id);
        }
        break;

    case '/api/sesiones':
        if ($method == 'POST') {
            $sesionController->create();
        }
        break;

    case (preg_match('/\/api\/sesiones\/cliente\/(\d+)/', $path, $matches) ? true : false):
        $clienteId = $matches[1];
        if ($method == 'GET') {
            $sesionController->getByClienteId($clienteId);
        }
        break;

    case (preg_match('/\/api\/sesiones\/(\d+)/', $path, $matches) ? true : false):
        $id = $matches[1];
        if ($method == 'PUT') {
            $sesionController->update($id);
        } elseif ($method == 'DELETE') {
            $sesionController->delete($id);
        }
        break;

    default:
        echo json_encode(['status' => 'error', 'message' => 'Ruta no encontrada']);
        break;
}
?>
