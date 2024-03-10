<?php
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


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Capturar variables del formulario
    $doc = limpiarDatos($_POST["doc"]);
    $nombre = limpiarDatos($_POST["nom"]);
    $telefono = limpiarDatos($_POST["tel"]);
    $ocupacion = limpiarDatos($_POST["ocu"]);
    $password = password_hash(limpiarDatos($_POST["pas"]), PASSWORD_DEFAULT); 
    $email = limpiarDatos($_POST["email"]);
    $tip_usu = limpiarDatos($_POST["tip_usu"]);


    $sql = "SELECT * FROM user WHERE doc = '$doc'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        echo "El documento ya está registrado. Por favor, intente con otro.";
    } else {
        $sql_insert = "INSERT INTO user (doc, name, contrasena, email, id_tip_user) VALUES ('$doc', '$nombre', '$password', '$email', '$tip_usu')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "Registro exitoso. Los datos han sido insertados correctamente.";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>

