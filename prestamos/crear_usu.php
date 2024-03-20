<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Préstamo</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/css.css">
</head>

<body>
    <main>
        <form method="POST" autocomplete="off" class="formulario" id="formulario" action="procesar_prestamo.php">

            <!-- Menú desplegable para seleccionar cliente -->
            <div class="formulario__label" id="grupo__cliente">
                <label for="cliente" class="formulario__label">Cliente *</label>
                <div class="formulario__grupo-input">
                    <select class="formulario__input" name="cliente" id="cliente" required>
                        <option value="">Seleccione un cliente</option>
                        <?php
                        // Conexión a la base de datos
                        $servidor = "localhost"; 
                        $usuario = "root"; 
                        $password = ""; 
                        $base_datos = "evaluacion"; 
                        $conexion = new mysqli($servidor, $usuario, $password, $base_datos);
                        if ($conexion->connect_error) {
                            die("La conexión falló: " . $conexion->connect_error);
                        }
                        
                        // Consulta para obtener los clientes
                        $consulta_clientes = "SELECT id_cliente, nombre FROM clientes";
                        $result_clientes = $conexion->query($consulta_clientes);
                        if ($result_clientes->num_rows > 0) {
                            while($row = $result_clientes->fetch_assoc()) {
                                echo "<option value='" . $row['id_cliente'] . "'>" . $row['nombre'] . '-' .$row['id_cliente'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Por favor seleccione un cliente.</p>
            </div>

            <!-- Menú desplegable para seleccionar auto -->
            <div class="formulario__label" id="grupo__auto">
                <label for="auto" class="formulario__label">Auto *</label>
                <div class="formulario__grupo-input">
                    <select class="formulario__input" name="auto" id="auto" required>
                        <option value="">Seleccione un auto</option>
                        <?php
                        // Consulta para obtener los autos
                        $consulta_autos = "SELECT id_auto, marca, modelo FROM autos";
                        $result_autos = $conexion->query($consulta_autos);
                        if ($result_autos->num_rows > 0) {
                            while($row = $result_autos->fetch_assoc()) {
                                echo "<option value='" . $row['id_auto'] . "'>" . $row['marca'] . " " . $row['modelo'] . '-' .$row['id_auto'] . "</option>";
                            }
                        }
                        ?>
                    </select>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Por favor seleccione un auto.</p>
            </div>

            <!-- Otros campos para el préstamo -->
            <div class="formulario__label" id="grupo__destino">
                <label for="destino" class="formulario__label">Destino *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="destino" id="destino" placeholder="Destino" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Por favor ingrese el destino del préstamo puede contener letras y numeros (maximo 20 caracteres).</p>
            </div>

            <div class="formulario__label" id="grupo__km_inicial">
                <label for="km_inicial" class="formulario__label">Kilometraje Inicial *</label>
                <div class="formulario__grupo-input">
                    <input type="number" class="formulario__input" name="km_inicial" id="km_inicial" placeholder="Kilometraje Inicial" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Por favor ingrese el kilometraje inicial.</p>
            </div>

            <div class="formulario__label" id="grupo__fecha_inicio">
                <label for="fecha_inicio" class="formulario__label">Fecha de Inicio *</label>
                <div class="formulario__grupo-input">
                    <input type="date" class="formulario__input" name="fecha_inicio" id="fecha_inicio" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Por favor ingrese la fecha de inicio del préstamo.</p>
            </div>

            <div class="formulario__label" id="grupo__fecha_fin">
                <label for="fecha_fin" class="formulario__label">Fecha de Fin *</label>
                <div class="formulario__grupo-input">
                    <input type="date" class="formulario__input" name="fecha_fin" id="fecha_fin" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Por favor ingrese la fecha de fin del préstamo.</p>
            </div>

            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>

            <div class="formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" name="save" id="boton_enviar" value="guardar">Enviar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
            <a href="../index.php"  class="formulario__grupo-btn-enviar" >VOLVER AL INICIO</a>

        </form>
    </main>
    <script src="js/jquery.js"></script>
    <script src="js/form.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
    <script>
        // Aquí puedes agregar tu código JavaScript para cargar dinámicamente los clientes y autos
        // y validar el formulario de préstamo
    </script>
</body>

</html>
