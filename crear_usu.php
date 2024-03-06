<?php
require 'conexion/database.php';
$db = new Database();
try {
    $con = $db->conectar();
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validación de Formulario con Javascript</title>
    <link rel="stylesheet" href="https://necolas.github.io/normalize.css/8.0.1/normalize.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/css.css">
</head>

<body>
    <main>
        <form method="POST" autocomplete="off" class="formulario" id="formulario">
            <!-- Div para capturar el documento -->
            <div class="formulario__label" id="grupo__usuario">
                <label for="usuario" class="formulario__label">Documento *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="Documento" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El documento tiene que ser de 7 a 11 dígitos y solo puede contener números.
                </p>
            </div>

            <!-- Div para capturar el nombre -->
            <div class="formulario__label" id="grupo__nombre">
                <label for="nombre" class="formulario__label">Nombres *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="Nombres" required>
                    <i class=""></i>
                </div>
                <p class="formulario__input-error">
                    El nombre tiene que ser de 12 a 40 caracteres y solo puede contener letras.
                </p>
            </div>
            <!-- Grupo: Contraseña -->
            <div class="formulario__label-input" id="grupo_password">
                <label for="password" class="formulario__label">Contraseña *</label>
                <div class="formulario__grupo-input">
                    <input type="password" class="formulario__input" name="password" id="password" autocomplete="new-password" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">La contraseña tiene que ser de 8 a 12 caracteres alfanuméricos.</p>
            </div>

            <!-- Grupo: Repetir Contraseña -->
            <div class="formulario__label-input" id="grupo_password2">
                <label for="password2" class="formulario__label">Repetir Contraseña *</label>
                <div class="formulario__grupo-input">
                    <input type="password" class="formulario__input" name="password2" id="password2" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
            </div>

            <div class="formulario__label" id="grupo__nombre_m">
                <label for="nombre_m" class="formulario__label">Nombres De La Madre *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="nombre_m" id="nombre_m" placeholder="Nombres" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El nombre tiene que ser de 12 a 40 caracteres y solo puede contener letras.
                </p>
            </div>

            <div class="formulario__label" id="grupo__nombre_p">
                <label for="nombre_p" class="formulario__label">Nombre del padre *</label>
                <div class="formulario__grupo-input">
                    <input type="text" class="formulario__input" name="nombre_p" id="nombre_p" placeholder="Nombres" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">
                    El nombre tiene que ser de 12 a 40 caracteres y solo puede contener letras.
                </p>
            </div>

            <!-- Grupo: Correo Electrónico -->
            <div class="formulario__label" id="grupo_correo">
                <label for="correo" class="formulario__label">Correo Electrónico *</label>
                <div class="formulario__grupo-input">
                    <input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com" required>
                    <i class="formulario__validacion-estado fas fa-times-circle"></i>
                </div>
                <p class="formulario__input-error">El correo solo puede contener letras, números, puntos, guiones y guion bajo.</p>
            </div>

            <!-- Grupo: Tipo de Usuario -->
            <div class="formulario__label" id="grupo_telefono">
                <label for="id_tip_use" class="formulario__label">Tipo Usuario *</label>
                <div class="formulario__grupo-select">
                    <select name="id_tip_use" id="id_tip_use" class="formulario__select " required>
                        <?php
                        $statement = $con->prepare('SELECT * from tip_use WHERE id_tip_use = 1');
                        $statement->execute();
                        while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
                            echo "<option value=" . $row['id_tip_use'] . ">" . $row['tip_use'] . "</option>";
                        }
                        ?> </select>
                </div>
            </div>

            <!-- Grupo: Terminos y Condiciones -->
            <div class="formulario__grupo-terminos" id="grupo_terminos">
                <label class="formulario__label">
                    <input class="formulario__checkbox" type="checkbox" name="terminos" id="terminos" required>
                    Acepto los Términos y Condiciones
                </label>
            </div>

            <div class="formulario__mensaje" id="formulario__mensaje">
                <p><i class="fas fa-exclamation-triangle"></i> <b>Error:</b> Por favor rellena el formulario correctamente. </p>
            </div>

            <p class="text-center"></p>
            <div class="formulario__grupo-btn-enviar">
                <button type="submit" class="formulario__btn" name="save" value="guardar">Enviar</button>
                <p class="formulario__mensaje-exito" id="formulario__mensaje-exito">Formulario enviado exitosamente!</p>
            </div>
        </form>
    </main>
    <script src="js/jquery.js"></script>
    <script src="js/formulario.js"></script>
    <script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>
</body>

</html>