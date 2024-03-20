<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Formulario con Javascript</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/css.css">
</head>

<body>
    <main>
        <h1>REGISTRAR CLIENTES</h1>
        <form method="POST" autocomplete="off" class="formulario" id="formulario" action="registro.php">


            <!-- div para capturar el documento -->

            <div class="formulario__label" id="grupo__usuario">
                <label for="usuario" class="formulario__label">Documento *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="Documento" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El documento tiene que ser de 6 a 11 dígitos y solo puede contener números.</p>
            </div>

            <!-- div para capturar el nombre -->

            <div class="formulario__label" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombre *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" onkeyup="mayus(this);" name="nombre" id="nombre" placeholder="Nombre">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El nombre tiene que ser de 6 a 8 caracteres y solo puede contener letras</p>
            </div>
            <div class="formulario__label" id="grupo__apellido">
                <label for="apellido" class="formulario__label">Apellido *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" onkeyup="mayus(this);" name="apellido" id="apellido" placeholder="Apellido">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El apellido tiene que ser de 6 a 8 caracteres y solo puede contener letras</p>
            </div>



            <!-- Grupo: Correo Electrónico -->
            <div class="formulario__label" id="grupo__correo">
                <label for="correo" class="formulario__label">Correo Electrónico *</label>
                <div class="formulario__grupo-input">
                    <input onkeyup="minus(this);" type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El correo solo puede contener letras, números, puntos, guiones y guion bajo.</p>

            </div>


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
