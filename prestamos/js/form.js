// Definir constantes y variables
const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input, #formulario select');

// Expresiones regulares para validar los campos del formulario
const expresiones = {
    cliente: /^(?!\s*$).+/,
    auto: /^(?!\s*$).+/,
    destino: /^[a-zA-ZÀ-ÿ\s0-9]{5,20}$/,
    km_inicial: /^\d+(\.\d{1,2})?$/, // Formato para números con 2 decimales opcionales
    fecha_inicio: /^\d{4}-\d{2}-\d{2}$/, // Formato para fecha (YYYY-MM-DD)
    fecha_fin: /^\d{4}-\d{2}-\d{2}$/ // Formato para fecha (YYYY-MM-DD)
};

// Estado de validación de los campos del formulario
const campos = {
    cliente: false,
    auto: false,
    destino: false,
    km_inicial: false,
    fecha_inicio: false,
    fecha_fin: false
};

// Función para validar el formulario
const validarFormulario = (e) => {
    switch (e.target.name) {
        case "cliente":
        case "auto":
        case "destino":
            validarCampo(expresiones[e.target.name], e.target, e.target.name);
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
};

// Función para validar un campo específico
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
};

// Event listeners para validar los campos del formulario
inputs.forEach((input) => {
    input.addEventListener('keyup', validarFormulario);
    input.addEventListener('blur', validarFormulario);
});

formulario.addEventListener('submit', (e) => {
    e.preventDefault();

    // Obtener los valores de los campos del formulario
    const cliente = document.getElementById('cliente').value;
    const auto = document.getElementById('auto').value;
    const destino = document.getElementById('destino').value;
    const km_inicial = document.getElementById('km_inicial').value;
    const fecha_inicio = document.getElementById('fecha_inicio').value;
    const fecha_fin = document.getElementById('fecha_fin').value;

    // Verificar si todos los campos están llenos y son válidos
    if (campos.cliente && campos.auto && campos.destino && campos.km_inicial && campos.fecha_inicio && campos.fecha_fin) {
        // Crear un objeto FormData para enviar los datos al servidor
        const formData = new FormData();
        formData.append('cliente', cliente);
        formData.append('auto', auto);
        formData.append('destino', destino);
        formData.append('km_inicial', km_inicial);
        formData.append('fecha_inicio', fecha_inicio);
        formData.append('fecha_fin', fecha_fin);

        // Enviar los datos mediante una petición POST a registro.php
        fetch('registro.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Mostrar alerta según la respuesta del servidor
            alert(data);
            // Resetear el formulario después del envío
            formulario.reset();
        })
        .catch(error => {
            console.error('Error:', error);
        });
    } else {
        // Mostrar mensaje de error si el formulario no es válido
        document.getElementById('formulario__mensaje').classList.add('formulario__mensaje-activo');
        setTimeout(() => {
        document.getElementById('formulario__mensaje').classList.remove('formulario__mensaje-activo');
        }, 5000);
        }
        });