<?php
session_start();
require_once "conexion.php";

if (!isset($_SESSION["usuario_id"]) || $_SESSION["usuario_tipo"] !== "admin") {
    header("location: login.php");
    exit();
}

$query = "SELECT * FROM contacto";
$result = $conn->query($query);

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["borrar_comentario"])) {
    $comentario_id = $_POST["comentario_id"];
    $delete_query = "DELETE FROM contacto WHERE id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $comentario_id);
    $stmt->execute();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestionar Comentarios</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet">
    <link href="css/styles.css" rel="stylesheet" />
</head>
<body>
    <div class="container">
        <h1>Gestionar Comentarios</h1>
        <?php if ($result->num_rows > 0): ?>
            <ul>
                <?php while($row = $result->fetch_assoc()): ?>
                    <li>
                        <strong>Nombre:</strong> <?php echo $row["nombre"]; ?><br>
                        <strong>Correo:</strong> <?php echo $row["correo"]; ?><br>
                        <strong>Asunto:</strong> <?php echo $row["asunto"]; ?><br>
                        <strong>Comentario:</strong> <?php echo $row["comentario"]; ?><br>
                        <form action="" method="post">
                            <input type="hidden" name="comentario_id" value="<?php echo $row["id"]; ?>">
                            <input type="submit" name="borrar_comentario" value="Borrar">
                        </form>
                    </li>
                <?php endwhile; ?>
            </ul>
        <?php else: ?>
            <p>No hay comentarios para mostrar.</p>
        <?php endif; ?>
    </div>
</body>
</html>
