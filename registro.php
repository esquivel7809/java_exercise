<?php
// Verificar si se reciben todos los datos del formulario
if (isset($_POST['doc']) && isset($_POST['nom']) && isset($_POST['pas']) && isset($_POST['email']) && isset($_POST['tip_usu']) && isset($_POST['madre']) && isset($_POST['telefono'])) {

    // Obtener los datos del formulario y realizar la limpieza
    $doc = limpiar($_POST['doc']);
    $nom = limpiar($_POST['nom']);
    $pas = limpiar($_POST['pas']);
    $email = limpiar($_POST['email']);
    $tip_usu = limpiar($_POST['tip_usu']);
    $madre = limpiar($_POST['madre']);
    $telefono = limpiar($_POST['telefono']);

    // Validar los datos
    if (validarDocumento($doc) && validarNombre($nom) && validarContraseña($pas) && validarCorreo($email) && validarTelefono($telefono) && validarNombre($madre)) {

        // Realizar la conexión a la base de datos
        require 'conexion/database.php';
        $db = new Database();
        $con = $db->conectar();

        // Verificar si los datos ya existen en la base de datos
        $statement_check = $con->prepare("SELECT * FROM usuarios WHERE doc = :doc");
        $statement_check->bindParam(':doc', $doc);
        $statement_check->execute();
        $result = $statement_check->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            // Los datos ya existen en la base de datos, mostrar una alerta en JavaScript
            echo "<script>alert('Los datos ya existen');</script>";
        } else {
            // Los datos no existen, proceder con la inserción

            // Preparar la consulta SQL para insertar los datos en la base de datos
            $statement = $con->prepare("INSERT INTO usuarios (doc, nom, pas, email, tip_usu, madre, telefono) VALUES (:doc, :nom, :pas, :email, :tip_usu, :madre, :telefono)");
            $statement->bindParam(':doc', $doc);
            $statement->bindParam(':nom', $nom);
            $statement->bindParam(':pas', $pas);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':tip_usu', $tip_usu);
            $statement->bindParam(':madre', $madre);
            $statement->bindParam(':telefono', $telefono);

            // Ejecutar la consulta
            if ($statement->execute()) {
                // La inserción fue exitosa, mostrar una alerta en JavaScript
                echo "<script>alert('Los datos se guardaron correctamente');</script>";
            } else {
                // Ocurrió un error durante la inserción, mostrar una alerta en JavaScript
                echo "<script>alert('Error al guardar los datos');</script>";
            }
        }
    } else {
        // Si algún dato no pasa la validación, mostrar una alerta en JavaScript
        echo "<script>alert('Error: Datos no válidos');</script>";
    }
} else {
    // Si no se reciben todos los datos esperados, mostrar un mensaje de error
    echo "<script>alert('Error: Todos los campos son requeridos');</script>";
}

// Función para limpiar los datos
function limpiar($dato)
{
    $dato = trim($dato);
    $dato = stripslashes($dato);
    $dato = htmlspecialchars($dato);
    return $dato;
}

// Funciones de validación
function validarDocumento($doc)
{
    // Agrega aquí la lógica de validación para el documento
    return true; // Retorna true si el documento es válido, false de lo contrario
}

function validarNombre($nom)
{
    // Agrega aquí la lógica de validación para el nombre
    return true; // Retorna true si el nombre es válido, false de lo contrario
}

function validarContraseña($pas)
{
    // Agrega aquí la lógica de validación para la contraseña
    return true; // Retorna true si la contraseña es válida, false de lo contrario
}

function validarCorreo($email)
{
    // Agrega aquí la lógica de validación para el correo electrónico
    return true; // Retorna true si el correo es válido, false de lo contrario
}

function validarmadre($madre)
{
    // Agrega aquí la lógica de validación para el número de teléfono
    return true; // Retorna true si el teléfono es válido, false de lo contrario
}
function validarTelefono($telefono)
{
    // Agrega aquí la lógica de validación para el número de teléfono
    return true; // Retorna true si el teléfono es válido, false de lo contrario
}
