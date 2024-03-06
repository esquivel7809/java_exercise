<?php
require 'conexion/database.php'; 
$db = new Database();
$con = $db->conectar();

// Recibe los datos del formulario
$usu = $_POST['doc'];
$nom = $_POST['nom'];
$pas = $_POST['pas'];
$email = $_POST['email'];
$pin = $_POST['pin'];
$tel = $_POST['tel'];
$tip_usu = $_POST['tip_usu'];


// Consulta SQL para insertar los datos en la tabla 'user'
$sql = "INSERT INTO user (doc, name, contrasena, email, pin, telefono, id_tip_user) 
        VALUES ('$usu', '$nom', '$pas', '$email', '$pin', '$tel', '$tip_usu')";

// Ejecuta la consulta
if ($con->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


$con->close();
?>
