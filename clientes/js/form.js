const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
    usuario: /^\d{7,11}$/,
    nombre: /^[a-zA-ZÀ-ÿ\s]{4,8}$/,
    apellido: /^[a-zA-ZÀ-ÿ\s]{4,8}$/,
    correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
}

const campos = {
    usuario: false,
    nombre: false,
    apellido: false,
    correo: false
}

const validarFormulario = (e) => {
    switch (e.target.name) {
        case "usuario":
            validarCampo(expresiones.usuario, e.target, 'usuario');
            break;
        case "nombre":
            validarCampo(expresiones.nombre, e.target, 'nombre');
            break;
        case "apellido":
            validarCampo(expresiones.apellido, e.target, 'apellido');
            break;
        case "correo":
            validarCampo(expresiones.correo, e.target, 'correo');
            break;
    }
}

const validarCampo = (expresion, input, campo) => {
    if (expresion.test(input.value)) {
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

inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
    e.preventDefault();
    var doc = document.getElementById('usuario').value;
    var nom = document.getElementById('nombre').value;
    var email = document.getElementById('correo').value;
    var apellido = document.getElementById('apellido').value;

    if (campos.usuario && campos.nombre && campos.correo && campos.apellido) {
        formulario.reset();
        console.log(doc); console.log(nom); console.log(email); console.log(apellido);

        // Crear objeto FormData y añadir los datos del formulario
        var formData = new FormData();
        formData.append('doc', doc);
        formData.append('nom', nom);
        formData.append('email', email);
        formData.append('apellido', apellido);

        // Enviar los datos mediante una petición POST a registro.php
        fetch('registro.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Mostrar la respuesta del servidor en una alerta
            alert(data);
            // Aquí puedes manejar la respuesta del servidor como desees
            // Por ejemplo, mostrar un mensaje en la página
            // document.getElementById('mensaje').innerText = data;
        })
        .catch(error => {
            console.error('Error:', error);
        });

        document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
        setTimeout(() => {
            document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
        }, 5000);

        document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
            icono.classList.remove('formulario__grupo-correcto');
        });
    }
});
