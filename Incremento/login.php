<?php
session_start();
require_once "conexion.php"; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $query = "SELECT * FROM usuarios WHERE nombre = ? AND password = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        $_SESSION["usuario_id"] = $row["id"];
        $_SESSION["usuario_tipo"] = $row["tipo"];
        
        if ($row["tipo"] == "admin") {
            header("location: admin_panel.php"); // Redirige al panel de administrador
        } else {
            header("location: home.php"); // Redirige al home para usuarios normales
        }
        exit(); // Termina el script después de redirigir
    } else {
        $error = "Nombre de usuario o contraseña incorrectos.";
    }
}
?>
