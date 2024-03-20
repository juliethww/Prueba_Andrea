const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	id_prestamo:/^\d{1,11}$/, 
	id_cliente: /^\d{8,10}$/, 
	id_auto: /^[a-zA-Z0-9]{3,7}$/,
	destino: /^[a-zA-ZÀ-ÿ\s]{5,40}$/, 
	km_inicial: /^.{2,20}$/, 
	fecha_inicio: /^\d{4}-\d{2}-\d{2}$/,
	fecha_fin: /^\d{4}-\d{2}-\d{2}$/
}

const campos = {
	id_prestamo: false,
	id_cliente: false,
	id_auto: false,
	destino: false,
	km_inicial: false,
	fecha_inicio: false,
	fecha_fin:false
	
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "id_prestamo":
			validarCampo(expresiones.id_prestamo, e.target, 'id_prestamo');
		break;
		case "id_cliente":
			validarCampo(expresiones.id_cliente, e.target, 'id_cliente');
		break;
		case "id_auto":
			validarCampo(expresiones.id_auto, e.target, 'id_auto');
		break;
		case "destino":
			validarCampo(expresiones.destino, e.target, 'destino');
		break;
		case "km_inicial":
			validarCampo(expresiones.km_inicial, e.target, 'km_inicial');
		break;
		case "fecha_inicio":
			validarCampo(expresiones.fecha_inicio, e.target, 'fecha_inicio');																																						
		break;
		case "fecha_fin":
			validarCampo(expresiones.fecha_fin, e.target, 'fecha_fin');																																						
		break;
		
	}
}

const validarCampo = (expresion, input, campo) => {
	if(expresion.test(input.value)){
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos[campo] = true;
	} else {
		document.getElementById(`grupo__${campo}`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__${campo}`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__${campo} i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__${campo} i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__${campo} .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos[campo] = false;
	}
}

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if(inputPassword1.value !== inputPassword2.value){
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['password'] = false;
	} else {
		document.getElementById(`grupo__password2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__password2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__password2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__password2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__password2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['password'] = true;
	}
}

inputs.forEach((input) => {
	input.addEventListener('keyup', validarFormulario);
	input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
	e.preventDefault();
		var id_cliente = document.getElementById('id_cliente').value;
		var id_auto = document.getElementById('id_auto').value;
		var destino = document.getElementById('destino').value;
		var km_inicial = document.getElementById('km_inicial').value;
		var fecha_inicio = document.getElementById('fecha_inicio').value;
		var fecha_fin = document.getElementById('fecha_fin').value;

	const terminos = document.getElementById('terminos');
	if(campos.id_prestamo && campos.id_cliente && campos.id_auto && campos.destino && campos.km_inicial && campos.fecha_inicio && campos.fecha_fin && terminos.checked ){
		formulario.reset();
		console.log(id_prestamo);console.log(id_cliente);console.log(id_auto);console.log(destino);console.log(km_inicial);console.log(fecha_inicio);console.log(fecha_fin);
		$.post ("registro.php?cod=datos",{id_prestamo: id_prestamo, id_cliente: id_cliente, id_auto: id_auto, destino: destino, km_inicial: km_inicial, fecha_inicio: fecha_inicio, fecha_fin: fecha_fin}, function(document){$("#mensaje").html(document);
		
		}),
		
		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} 
});
