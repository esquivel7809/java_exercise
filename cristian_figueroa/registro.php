<?php
require '../conexion/database.php'; 
$db = new Database();
$con = $db->conectar();

// Recibe los datos del formulario
$usu = $_POST['doc'];
$nom = $_POST['nom'];
$pas = $_POST['pas'];
$email = $_POST['email'];
$edad= $_POST['edad'];
$apellidos=$_POST['ape'];
$tip_usu = $_POST['tip_usu'];

// Consulta SQL para insertar los datos en la tabla 'user'
$sql = $con->prepare("INSERT INTO user (doc, name, edad, apellidos, contrasena, email, id_tip_user, estado) 
                      VALUES (:usu, :nom, :edad, :apellidos, :pas, :email, :tip_usu, 2)");
$sql->bindParam(':usu', $usu);
$sql->bindParam(':nom', $nom);
$sql->bindParam(':edad', $edad, PDO::PARAM_INT);
$sql->bindParam(':apellidos', $apellidos);
$sql->bindParam(':pas', $pas);
$sql->bindParam(':email', $email);
$sql->bindParam(':tip_usu', $tip_usu, PDO::PARAM_INT);

// Ejecuta la consulta
if ($sql->execute()) {
    echo "Registro exitoso";
} else {
    // Manejar el error si ocurre
    echo "Error al registrar usuario: " . $sql->errorInfo()[2];
}
?>
