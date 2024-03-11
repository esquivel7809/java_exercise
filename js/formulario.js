const formulario = document.getElementById('formulario');
const inputs = document.querySelectorAll('#formulario input');

const expresiones = {
	doc: /^\d{7,11}$/, 
	name: /^[a-zA-ZÀ-ÿ\s]{15,40}$/, 
	password: /^.{8,12}$/, 
	email: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/,
	edad: /^\d{1,2}$/, 
	direccion: /^[a-zA-ZÀ-ÿ\s]{10,40}$/ 
	
	
}

const campos = {
	doc: false,
	name: false,
	password: false,
	email: false,
	edad: false,
	direccion: false

	
}

const validarFormulario = (e) => {
	switch (e.target.name) {
		case "doc":
			validarCampo(expresiones.doc, e.target, 'doc');
		break;
		case "name":
			validarCampo(expresiones.name, e.target, 'name');
		break;
		case "password":
			validarCampo(expresiones.password, e.target, 'password');
			validarPassword2();
		break;
		case "password2":
			validarPassword2();
		break;
		case "email":
			validarCampo(expresiones.email, e.target, 'email');
		break;
		case "edad":
			validarCampo(expresiones.edad, e.target, 'edad');
		break;
		case "direccion":
			validarCampo(expresiones.direccion, e.target, 'direccion');
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
		var doc = document.getElementById('doc').value;
		var name = document.getElementById('name').value;
		var password = document.getElementById('password').value;
		var email = document.getElementById('email').value;
		var tip_usu = document.getElementById('id_tip_use').value;
		var edad = document.getElementById('edad').value;
		var direccion= document.getElementById('direccion').value;

	const terminos = document.getElementById('terminos');
	if(campos.doc && campos.nombre && campos.password && campos.email  && terminos.checked ){
		formulario.reset();
		console.log(doc);console.log(nom);console.log(password);console.log(email);console.log(edad);console.log(direccion);console.log(tip_usu);
		$.post ("registro.php?cod=datos",{doc: doc, nom: nom, password: pas, email: email, edad: edad, direccion: direccion, tip_usu: tip_usu}, function(document){$("#mensaje").html(document);
		
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
