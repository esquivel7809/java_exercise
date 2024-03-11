const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	usuario: /^\d{7,11}$/, 
	nombre: /^[a-zA-ZÀ-ÿ\s]{15,40}$/, 
	eps: /^[a-zA-ZÀ-ÿ\s]{8,40}$/,
	password: /^.{8,12}$/, 
	correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
	// telefono: /^\d{7,14}$/ 
	
}

const campos = {
	usuario: false,
	eps: false,
	nombre: false,
	password: false,
	correo: false
	// telefono: false
	
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "usuario":
			validarCampo(expresiones.usuario, e.target, 'usuario');
		break;
		case "nombre":
			validarCampo(expresiones.nombre, e.target, 'nombre');
		break;
		case "eps":
			validarCampo(expresiones.eps, e.target, 'eps');
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
		// case "telefono":
		// 	validarCampo(expresiones.telefono, e.target, 'telefono');
		// break;
		
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
		var doc = document.getElementById('usuario').value;
		var eps = document.getElementById('eps').value;
		var nom = document.getElementById('nombre').value;
		var pas = document.getElementById('password').value;
		var email = document.getElementById('correo').value;
		var tip_usu = document.getElementById('id_tip_use').value;
		var cuidad = document.getElementById('cuidad').value;
<<<<<<< HEAD
=======
		var validar = "<?php echo $validar; >?";
		console.log(validar);
>>>>>>> 4486c7d5bd86023e16f48a6027a742162d2c3582

	const terminos = document.getElementById('terminos');
	if(campos.usuario && campos.nombre && campos.eps && campos.password && campos.correo  && terminos.checked ){
		formulario.reset();
		console.log(doc);console.log(nom);console.log(eps);console.log(pas);console.log(email);console.log(tip_usu); console.log(cuidad);
		$.post ("registro.php?cod=datos",{doc: doc, eps: eps, nom: nom, pas: pas, email: email, tip_usu: tip_usu, cuidad: cuidad,}, function(document){$("#mensaje").html(document);
		
		}),
		
		document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
		setTimeout(() => {
			document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
		}, 5000);

		if(validar ==1){
			alert ("Registro exitoso")
		}

		else{
			alert("Usuario ya existente");
		}

		document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
			icono.classList.remove('formulario__grupo-correcto');
		});
	} 
});
