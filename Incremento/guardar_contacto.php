<?php
session_start();
require_once "conexion.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $nombre = $_POST["nombre"];
    $correo = $_POST["correo"];
    $asunto = $_POST["asunto"];
    $comentario = $_POST["comentario"];

    $insert_query = "INSERT INTO contacto (nombre, correo, asunto, comentario) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($insert_query);
    $stmt->bind_param("ssss", $nombre, $correo, $asunto, $comentario);

    if ($stmt->execute()) {
        echo "Mensaje enviado correctamente";
    } else {
        echo "Error al enviar el mensaje: " . $conn->error;
    }
} else {
    header("Location: formulario_contacto.php");
    exit;
}
?>
