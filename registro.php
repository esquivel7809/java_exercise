<?php
require 'conexion/database.php'; 
$db = new Database();
$con = $db->conectar();

// Recibe los datos del formulario
$doc = $_POST['usuario'];
$nom = $_POST['nombre'];
$ape= $_POST['apellido'];
$pass = $_POST['contrasena'];
$email = $_POST['email'];
$tel = $_POST['telelefono'];
$tip_usu = $_POST['tip_usu'];


// Consulta SQL para insertar los datos en la tabla 'user'
$insertSQL = $con->prepare("INSERT INTO user (usuario , nombre , apellido, contrasena, email, telefono, id_tip_user) VALUES ('$doc', '$nom', '$ape', '$pass', '$email', '$tel', '$tip_usu')");

// Ejecuta la consulta
if ($con->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


$con->close();
?>