<?php
session_start();
require_once "conexion.php";


if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_tipo"] !== "admin") {
    header("location: login.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    $titulo = $_POST["titulo"];
    $tipo = $_POST["tipo"];
    $precio = $_POST["precio"];
    $avance = $_POST["avance"];
    $total_ventas = $_POST["total_ventas"];
    $notas = $_POST["notas"];
    $fecha_pub = $_POST["fecha_pub"];

    
    $query = "INSERT INTO titulos (titulo, tipo, precio, avance, total_ventas, notas, fecha_pub) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("ssddiss", $titulo, $tipo, $precio, $avance, $total_ventas, $notas, $fecha_pub);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        
        header("location: admin_panel.php");
        exit();
    } else {
        $error = "Error al agregar el libro. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Libro</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>Agregar Libro</h1>
        <!-- Formulario para agregar libros -->
        <form action="" method="post">
            <label for="titulo">Título:</label>
            <input type="text" name="titulo" required>
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" required>
            <label for="precio">Precio:</label>
            <input type="number" name="precio" required>
            <label for="avance">Avance:</label>
            <input type="number" name="avance" required>
            <label for="total_ventas">Total de Ventas:</label>
            <input type="number" name="total_ventas" required>
            <label for="notas">Notas:</label>
            <input type="text" name="notas">
            <label for="fecha_pub">Fecha de Publicación:</label>
            <input type="date" name="fecha_pub" required>
            <input type="submit" value="Agregar Libro">
            <?php if(isset($error)): ?>
                <div class="error"><?= $error ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
