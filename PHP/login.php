<?php
// Incluir archivo de configuración
include 'conexion.php';

// Iniciar sesión
session_start();

// Verificar si el formulario ha sido enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $codigo = $_POST['codigo'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Escapar los datos para prevenir SQL injection
    $codigo = $conn->real_escape_string($codigo);
    $username = $conn->real_escape_string($username);

    // Consulta SQL para verificar el usuario
    $sql = "SELECT * FROM Credenciales_del_Cliente WHERE Usuario = '$username' AND ClienteID = '$codigo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Usuario encontrado
        $row = $result->fetch_assoc();
        // Verificar la contraseña hasheada
        if (password_verify($password, $row['Contraseña'])) {
            // Guardar datos del usuario en la sesión
            $_SESSION['username'] = $username;
            $_SESSION['cliente_id'] = $row['ClienteID'];

            // Redirigir a la página de detalles generales
            header("Location: /nav/generalDetails.html");
            exit();
        } else {
            echo "Invalid credentials";
        }
    } else {
        // Usuario no encontrado
        echo "Invalid credentials";
    }
}

// Cerrar conexión
$conn->close();
?>
