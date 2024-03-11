<?php
require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usu = $_POST['doc'];
    $nom = $_POST['nom'];
    $pass = $_POST['password'];
    $email = $_POST['email'];
    $tip_usu = $_POST['tip_usu'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];

    // Verificar si el usuario ya existe en la base de datos
    $sql = $con->prepare("SELECT * FROM user WHERE doc = :usu");
    $sql->bindParam(':usu', $usu);
    $sql->execute();
    $fila = $sql->fetch(PDO::FETCH_ASSOC);

    if ($fila) {
        echo '<script>alert("ESTE PAQUETE YA EXISTE //CAMBIELO//");</script>';
        $validacion = 0;
    } else {
        // Cifrar la contraseña antes de almacenarla en la base de datos
        $cifrado = password_hash($pass, PASSWORD_DEFAULT);

        // Insertar los datos en la base de datos
        $insertSQL = $con->prepare("INSERT INTO user (doc, name, contrasena, email, direccion, telefono, id_tip_user) VALUES (:usu, :nom, :pass, :email, :direccion, :telefono, :tip_usu)");
        $insertSQL->bindParam(':usu', $usu);
        $insertSQL->bindParam(':nom', $nom);
        $insertSQL->bindParam(':pass', $cifrado);
        $insertSQL->bindParam(':email', $email);
        $insertSQL->bindParam(':direccion', $direccion);
        $insertSQL->bindParam(':telefono', $telefono);
        $insertSQL->bindParam(':tip_usu', $tip_usu);
        $insertSQL->execute();
        $validacion = 1;
    }
} else {
    echo "Error: El formulario no ha sido enviado correctamente.";
}
?>
<script src="formulario.js"></script>
