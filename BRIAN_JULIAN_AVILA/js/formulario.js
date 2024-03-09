const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^\d{7,11}$/,
	nombre: /^[a-zA-ZÀ-ÿ\s]{15,40}$/,
	password: /^.{8,12}$/,
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	edad: /^\d{1,3}$/,
	verify: /^[A-Z0-9].{5,5}$/,
	
}

const campos = {
	usuario: false,
	nombre: false,
	password: false,
	correo: false,
	edad: false,
	verify: false,
	
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarCampo(expresiones.usuario, e.target, 'usuario');
			break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
			break;
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();
			break;
		case "password2":
			validarPassword2();
			break;
		case "correo":
			validarCampo(expresiones.correo, e.target, 'correo');
			break;
		case "edad":
			validarCampo(expresiones.edad, e.target, 'edad');
			break;
		case "verify":
			validarVr2();
			break;
		case "vr2":
			validarVr2();
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

const validarPassword2 = () => {
	const inputPassword1 = document.getElementById('password');
	const inputPassword2 = document.getElementById('password2');

	if (inputPassword1.value !== inputPassword2.value) {
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

const validarVr2 = () => {
	const inputVerify = document.getElementById('verify');
	const inputVr2 = document.getElementById('vr2');

	if (inputVerify.value === inputVr2.value) {
		document.getElementById(`grupo__vr2`).classList.remove('formulario__grupo-incorrecto');
		document.getElementById(`grupo__vr2`).classList.add('formulario__grupo-correcto');
		document.querySelector(`#grupo__vr2 i`).classList.remove('fa-times-circle');
		document.querySelector(`#grupo__vr2 i`).classList.add('fa-check-circle');
		document.querySelector(`#grupo__vr2 .formulario__input-error`).classList.remove('formulario__input-error-activo');
		campos['verify'] = true;
	} else {
		document.getElementById(`grupo__vr2`).classList.add('formulario__grupo-incorrecto');
		document.getElementById(`grupo__vr2`).classList.remove('formulario__grupo-correcto');
		document.querySelector(`#grupo__vr2 i`).classList.add('fa-times-circle');
		document.querySelector(`#grupo__vr2 i`).classList.remove('fa-check-circle');
		document.querySelector(`#grupo__vr2 .formulario__input-error`).classList.add('formulario__input-error-activo');
		campos['verify'] = false;
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
    var pas = document.getElementById('password').value;
    var email = document.getElementById('correo').value;
    var tip_usu = document.getElementById('id_tip_use').value;
    var edad = document.getElementById('edad').value;

    const terminos = document.getElementById('terminos');
    if (campos.usuario && campos.nombre && campos.password && campos.correo && campos.edad && terminos.checked) {
        formulario.reset();
        console.log(doc); console.log(nom); console.log(pas); console.log(email); console.log(tip_usu); console.log(edad);

        // Crear objeto FormData y añadir los datos del formulario
        var formData = new FormData();
        formData.append('doc', doc);
        formData.append('nom', nom);
        formData.append('pas', pas);
        formData.append('email', email);
        formData.append('tip_usu', tip_usu);
        formData.append('edad', edad);

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


