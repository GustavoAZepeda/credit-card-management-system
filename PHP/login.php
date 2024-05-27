<?php
// Incluir archivo de configuración
include 'conexion.php';

// Iniciar sesión
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $codigo = (int)$_POST['codigo']; // Asegúrate de que sea un entero
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Preparar la consulta SQL para verificar el usuario
    $sql = "SELECT * FROM Credenciales_del_Cliente WHERE Usuario = ? AND ClienteID = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("si", $username, $codigo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Usuario encontrado
        $row = $result->fetch_assoc();
        // Verificar la contraseña en texto plano
        if ($password === $row['Contraseña']) {
            // Guardar datos del usuario en la sesión
            $_SESSION['username'] = $username;
            $_SESSION['cliente_id'] = $row['ClienteID'];

            // Redirigir a la página de detalles generales
            header("Location: ..//nav/generalDetails.html");
            exit();
        } else {
            echo "Credenciales inválidas";
        }
    } else {
        // Usuario no encontrado
        echo "Credenciales inválidas";
    }

    // Cerrar el statement
    $stmt->close();
}

// Cerrar conexión
$conn->close();
?>
