
        const formulario = document.getElementById('formulario');
        const inputs = document.querySelectorAll('#formulario input');

        const expresiones = {
            usuario: /^\d{7,11}$/, 
            nombre: /^[a-zA-ZÀ-ÿ\s]{15,40}$/, 
            nombre_m: /^[a-zA-ZÀ-ÿ\s]{15,40}$/, 
            nombre_p: /^[a-zA-ZÀ-ÿ\s]{15,40}$/, 
            password: /^.{8,12}$/, 
            correo: /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/
        }

        const campos = {
            usuario: false,
            nombre: false,
            nombre_m: false,
            nombre_p: false,
            password: false,
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
                case "nombre_p":
                    validarCampo(expresiones.nombre_p, e.target, 'nombre_p');
                    break;
                case "nombre_m":
                    validarCampo(expresiones.nombre_m, e.target, 'nombre_m');
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

        inputs.forEach((input) => {
            input.addEventListener('input', validarFormulario);
            input.addEventListener('blur', validarFormulario);
        });

        formulario.addEventListener('submit', (e) => {
            e.preventDefault();
            const terminos = document.getElementById('terminos');
            if (campos.usuario && campos.nombre && campos.nombre_m && campos.nombre_p && campos.password && campos.correo && terminos.checked) {
                formulario.reset();
                document.getElementById('formulario__mensaje-exito').classList.add('formulario__mensaje-exito-activo');
                setTimeout(() => {
                    document.getElementById('formulario__mensaje-exito').classList.remove('formulario__mensaje-exito-activo');
                }, 5000);

                document.querySelectorAll('.formulario__grupo-correcto').forEach((icono) => {
                    icono.classList.remove('formulario__grupo-correcto');
                });
            } 
        });
    