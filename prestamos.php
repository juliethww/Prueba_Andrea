<?php
	require 'conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

?>


<!--  -->

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Prestamos</title>
	<link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
	<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" href="css/css.css">
</head>

<body>
   <main>
        <form  method="POST" autocomplete="off" class="formulario" id="formulario">
            

                <!-- div para capturar el documento -->

                <div class="formulario__grupo-input" id="grupo__id_prestamo">
                    <label for="usuario" class="formulario__label">ID Prestamo*</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="id_prestamo" id="id_prestamo" placeholder="ID Prestamo" readonly>
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">
                            </p>
                </div>

                <!-- div para capturar el nombre -->

                <div class="formulario__grupo-input" id="grupo__id_cliente">
                    <label for="nombre" class="formulario__label">Documento *</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" onkeyup="mayus(this);" name="id_cliente" id="id_cliente" placeholder="Documento">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">
                            El Docuemnto tiene que ser de 8 a 10 dígitos y solo puede contener numeros</p>
                </div>

                <!-- div para capturar el Placa -->

                <div class="formulario__grupo-input" id="grupo__id_auto">
                    <label for="telefono" class="formulario__label"> ID Auto *</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" name="id_auto" id="id_auto" placeholder="Placa">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">
                            La placa tiene que ser de 6 digitos debe contecer letras y numeros</p>
                </div>

                <!-- div para capturar la ocupacion -->

                <div class="formulario__grupo-input" id="grupo__destino">
                    <label for="ocupacion" class="formulario__label">Destino *</label>
                        <div class="formulario__grupo-input">
                            <input type="text" class="formulario__input" onkeyup="mayus(this);" name="destino" id="destino" placeholder="Destino">
                            <i class="formulario__validacion-estado fas fa-times-circle"></i>
                        </div>
                        <p class="formulario__input-error">
                            El destino debe contener letras</p>
                </div>

                <!-- Grupo: Contraseña -->
                <div class="formulario__grupo-input" id="grupo__km_inicial">
                    <label for="password" class="formulario__label">Kilometro Inicial *</label>
                    <div class="formulario__grupo-input">
                        <input  onkeyup="minus(this);" type="text" class="formulario__input" name="km_inicial" id="km_inicial" placeholder="Kilometro Inicial">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Ingrese el kilometrahe inicial</p>
                </div>

                <!-- Grupo: Contraseña 2 -->
                <div class="formulario__grupo-input" id="grupo__fecha_inicio">
                    <label for="password2" class="formulario__label">Fecha Inicial *</label>
                    <div class="formulario__grupo-input">
                        <input type="date" class="formulario__input" name="fecha_inicio" id="fecha_inicio">
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Ingrese una fecha valida</p>
                </div>
        

                <!-- Grupo: Correo Electronico -->
                <div class="formulario__grupo-input" id="grupo__fecha_fin">
                    <label for="correo" class="formulario__label">Fecha Fin *</label>
                    <div class="formulario__grupo-input">
                        <input onkeyup="minus(this);" type="date" class="formulario__input" name="fecha_fin" id="fecha_fin" >
                        <i class="formulario__validacion-estado fas fa-times-circle"></i>
                    </div>
                    <p class="formulario__input-error">Ingrese una fecha valida</p>
                </div>


                
                <!-- Grupo: Terminos y Condiciones -->
			<div class="formulario__grupo-terminos" id="grupo__terminos">
				<label class="formulario__label">
					<input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos">
					Acepto los Terminos y Condiciones
				</label>
			</div>

			<div class="formulario__mensaje" id="formulario__mensaje">
				<p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
			</div>
            
            <p class="text-center">
                      
            <div class="formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" name="save" value="guardar" >Enviar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
                
        
        </form>
   </main>
   <script src="js/jquery.js"></script>
   <script src="js/formulario.js"></script>
	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

    <!--  Javascript funcion para convertor en mayusculas y minusculas -->
    <!-- <script src="../js/main.js"></script> -->
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