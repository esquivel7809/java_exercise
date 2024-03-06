<?php
require 'conexion/database.php'; 
$db = new Database();
$con = $db->conectar();

// Recibe los datos del formulario
$usu = $_POST['doc'];
$nom = $_POST['nom'];
$pas = $_POST['pas'];
$email = $_POST['email'];
$tip_usu = $_POST['tip_usu'];
$genero = $_POST['genero'];
$ciudad = $_POST['ciudad'];
   
// Consulta SQL para insertar los datos en la tabla 'user'
$sql = "INSERT INTO user (doc, name, contrasena, email, id_tip_user, id_genero, id_ciudad) 
        VALUES ('$usu', '$nom', '$pas', '$email', '$tip_usu', '$genero', $ciudad)";

// Ejecuta la consulta
if ($con->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $con->error;
}


$con->close();



?>
