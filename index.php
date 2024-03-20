<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h2 class="text-center mb-4">Préstamos Registrados</h2>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>ID Préstamo</th>
                            <th>ID Cliente</th>
                            <th>ID Auto</th>
                            <th>Destino</th>
                            <th>Km Inicial</th>
                            <th>Fecha Inicio</th>
                            <th>Fecha Fin</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        // Establecer la conexión con la base de datos
                        $servidor = "localhost";
                        $usuario = "root";
                        $password = "";
                        $base_datos = "evaluacion";

                        $conexion = new mysqli($servidor, $usuario, $password, $base_datos);

                        // Verificar conexión
                        if ($conexion->connect_error) {
                            die("La conexión falló: " . $conexion->connect_error);
                        }

                        // Consulta a la tabla de préstamos
                        $consulta_prestamos = "SELECT * FROM prestamos";
                        $result_prestamos = $conexion->query($consulta_prestamos);

                        if ($result_prestamos->num_rows > 0) {
                            while ($row = $result_prestamos->fetch_assoc()) {
                                echo "<tr>";
                                echo "<td>" . $row['id_prestamo'] . "</td>";
                                echo "<td>" . $row['id_cliente'] . "</td>";
                                echo "<td>" . $row['id_auto'] . "</td>";
                                echo "<td>" . $row['destino'] . "</td>";
                                echo "<td>" . $row['km_inicial'] . "</td>";
                                echo "<td>" . $row['fecha_inicio'] . "</td>";
                                echo "<td>" . $row['fecha_fin'] . "</td>";
                                echo "</tr>";
                            }
                        } else {
                            echo "<tr><td colspan='7'>No hay préstamos registrados.</td></tr>";
                        }

                        // Cerrar conexión
                        $conexion->close();
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-4">
                <a href="prestamos/crear_usu.php" class="btn btn-primary btn-block">Registrar Préstamo</a>
            </div>
            <div class="col-md-4">
                <a href="clientes/crear_usu.php" class="btn btn-success btn-block">Registrar Cliente</a>
            </div>
            <div class="col-md-4">
                <a href="autos/crear_usu.php" class="btn btn-info btn-block">Registrar Auto</a>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>

</html>
