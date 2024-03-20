<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Formulario con js</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/css.css">
</head>

<body>
    <main>
        <form method="POST" autocomplete="off" class="formulario" id="formulario" action="registro.php">


            <!-- div para capturar el documento -->

            <div class="formulario__label" id="grupo__usuario">
                <label for="usuario" class="formulario__label">Numero Serie *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="Documento" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El nuemro de serie tiene que ser de 6 a 11 dígitos y solo puede contener números.</p>
            </div>

            <!-- div para capturar la marca del automóvil -->
            <div class="formulario__label" id="grupo__marca">
                <label for="marca" class="formulario__label">Marca *</label>
                <div class="formulario__grupo-input">
                    <select class="formulario__input" name="marca" id="marca" required>
                        <option value="">Seleccione una marca</option>
                        <option value="Toyota">Toyota</option>
                        <option value="Honda">BMX</option>
                        <option value="Ford">Ford</option>
                        <option value="Chevrolet">Chevrolet</option>
                        <!-- Agrega más marcas si es necesario -->
                    </select>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Por favor seleccione la marca del automóvil.</p>
            </div>

            <!-- div para capturar el modelo del automóvil -->
            <div class="formulario__label" id="grupo__modelo">
                <label for="modelo" class="formulario__label">Modelo *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="modelo" id="modelo" placeholder="Modelo" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Por favor ingrese el modelo del automóvil.</p>
            </div>

            <!-- div para capturar el año del automóvil -->
            <div class="formulario__label" id="grupo__año">
    <label for="año" class="formulario__label">Año *</label>
    <div class="formulario__grupo-input">
        <input type="date" class="formulario__input" name="año" id="año" required>
        <i class="formulario__validacion-estado fas fa-times-circle"></i>
    </div>
    <p class="formulario__input-error">Por favor ingrese una fecha válida para el año del automóvil.</p>
</div>

            <!-- div para capturar el tipo del automóvil -->
            <div class="formulario__label" id="grupo__tipo">
                <label for="tipo" class="formulario__label">Tipo *</label>
                <div class="formulario__grupo-input">
                    <select class="formulario__input" name="tipo" id="tipo" required>
                        <option value="">Seleccione un tipo de automóvil</option>
                        <option value="Sedán">automovil</option>
                        <option value="SUV">camioneta</option>
                    </select>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Por favor seleccione el tipo de automóvil.</p>
            </div>


            <!-- Grupo: Correo Electrónico -->
          


            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>

            <p class="text-center">

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

    <!--  Javascript funcion para convertir en mayúsculas y minúsculas -->
    <script>
        function mayus(e) {
            e.value = e.value.toUpperCase();
        }

        function minus(e) {
            e.value = e.value.toLowerCase();
        }
    </script>
</body>

</html>

