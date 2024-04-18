<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>libreria</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="css/styles.css" rel="stylesheet" />
    </head>
    <body id="page-top">
        <nav class="navbar navbar-expand-lg bg-secondary text-uppercase fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand" href="#page-top">LIBRERIA WEB</a>
                <button class="navbar-toggler text-uppercase font-weight-bold bg-primary text-white rounded" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Extensiones
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a class="nav-link" href="home.php">Inicio</a></li>
                    <li class="nav-item"><a class="nav-link" href="libros.php">Libros</a></li>
                    <li class="nav-item"><a class="nav-link" href="autores.php">Autores</a></li>
                    <li class="nav-item"><a class="nav-link" href="contacto.php">Contacto</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <br><br><br><br>
        <h1>Lista de Libros</h1>
    <div class="grid-container">
        <?php
        $conexion = new mysqli("localhost", "root", "", "pweb");

        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        
        $sql = "SELECT * FROM titulos";
        
        $resultado = $conexion->query($sql);
        
        if ($resultado->num_rows > 0) {
            
            while($fila = $resultado->fetch_assoc()) {
                echo "<div class='book-card'>";
                echo "<h2>".$fila["titulo"]."</h2>";
                echo "<p><strong>Tipo:</strong> ".$fila["tipo"]."</p>";
                echo "<p><strong>Precio:</strong> ".$fila["precio"]."</p>";
                echo "<p><strong>Avance:</strong> ".$fila["avance"]."</p>";
                echo "<p><strong>Total de Ventas:</strong> ".$fila["total_ventas"]."</p>";
                echo "<p><strong>Notas:</strong> ".$fila["notas"]."</p>";
                echo "<p><strong>Fecha de Publicación:</strong> ".$fila["fecha_pub"]."</p>";
                echo "</div>";
            }
        } else {
            echo "No se encontraron resultados";
        }
        
        $conexion->close();
        ?>
    </div>
</body>
</html>
        
       
        
        <footer class="footer text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4 mb-5 mb-lg-0">
                        <h4 class="text-uppercase mb-4">Ubicación</h4>
                        <p class="lead mb-0">
                            San Pedro De Macorís
                            <br />
                        </p>
                    </div>

                    
        <div class="copyright py-4 text-center text-white">
            <div class="container"><small>Copyright &copy; ITLA</small></div>
        </div>
        
        
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="js/scripts.js"></script>
        <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
    </body>
</html>
