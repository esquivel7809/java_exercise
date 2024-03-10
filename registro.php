<?php
// Conexión a la base de datos (asegúrate de actualizar los detalles de la conexión)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "bd";

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para limpiar y validar datos
function limpiarDatos($datos) {
    $datos = trim($datos);
    $datos = stripslashes($datos);
    $datos = htmlspecialchars($datos);
    return $datos;
}

// Verificar si se han enviado los datos por POST
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar variables del formulario
    $doc = limpiarDatos($_POST["doc"]);
    $nombre = limpiarDatos($_POST["nom"]);
    $telefono = limpiarDatos($_POST["tel"]);
    $ocupacion = limpiarDatos($_POST["ocu"]);
    $password = password_hash(limpiarDatos($_POST["pas"]), PASSWORD_DEFAULT); // Se aplica hash a la contraseña
    $email = limpiarDatos($_POST["email"]);
    $tip_usu = limpiarDatos($_POST["tip_usu"]);

    // Verificar si el documento ya existe en la base de datos
    $sql = "SELECT * FROM user WHERE doc = '$doc'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Documento duplicado, enviar mensaje de error
        echo "El documento ya está registrado. Por favor, intente con otro.";
    } else {
        // Documento no duplicado, realizar la inserción
        $sql_insert = "INSERT INTO user (doc, name, contrasena, email, id_tip_user) VALUES ('$doc', '$nombre', '$password', '$email', '$tip_usu')";

        if ($conn->query($sql_insert) === TRUE) {
            // Inserción exitosa, enviar mensaje de éxito
            echo "Registro exitoso. Los datos han sido insertados correctamente.";
        } else {
            // Error en la inserción, enviar mensaje de error
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    }

    // Cerrar la conexión a la base de datos
    $conn->close();
}
?>

