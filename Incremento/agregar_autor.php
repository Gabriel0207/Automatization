
<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_tipo"] !== "admin") {
    header("location: login.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
   
    $nombre = $_POST["nombre"];
    $apellido = $_POST["apellido"];
    $telefono = $_POST["telefono"];
    $direccion = $_POST["direccion"];
    $ciudad = $_POST["ciudad"];
    $estado = $_POST["estado"];
    $pais = $_POST["pais"];
    $cod_postal = $_POST["cod_postal"];

    
    $query = "INSERT INTO autores (nombre, apellido, telefono, direccion, ciudad, estado, pais, cod_postal) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("sssssssi", $nombre, $apellido, $telefono, $direccion, $ciudad, $estado, $pais, $cod_postal);

    if ($stmt->execute()) {
        
        header("location: admin_panel.php");
        exit();
    } else {
        $error = "Error al agregar el autor. Inténtalo de nuevo.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agregar Autor</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>Agregar Autor</h1>
        
        <form action="" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" name="nombre" required>
            <label for="apellido">Apellido:</label>
            <input type="text" name="apellido" required>
            <label for="telefono">Teléfono:</label>
            <input type="text" name="telefono" required>
            <label for="direccion">Dirección:</label>
            <input type="text" name="direccion" required>
            <label for="ciudad">Ciudad:</label>
            <input type="text" name="ciudad" required>
            <label for="estado">Estado:</label>
            <input type="text" name="estado" required>
            <label for="pais">País:</label>
            <input type="text" name="pais" required>
            <label for="cod_postal">Código Postal:</label>
            <input type="text" name="cod_postal" required>
            <input type="submit" value="Agregar Autor">
            <?php if(isset($error)): ?>
                <div class="error"><?= $error ?></div>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
