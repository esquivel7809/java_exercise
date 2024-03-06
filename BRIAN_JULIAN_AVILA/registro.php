<?php
require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();
?>
<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doc = $_POST['usuario'];
    $nom = $_POST['nombre'];
    $contrasena = $_POST['password'];
    $edad = $_POST['edad'];
    $correo = $_POST['correo'];
    
    $ssl = "SELECT * FROM user WHERE doc = $doc";
    if ($doc == "doc") {
        echo'<script>alert("el numero de documento que registro ya se encuentra en la base de datos");</script>';
    } else {
        $sql = "INSERT INTO user (doc,namer,contrasena,edad,email) VALUES ($doc,'$nom','$contrasena','$edad','$correo')";

    if ($con->query($sql) == TRUE) {
        echo'<script>alert("datos insertados correctamente");</script>';
    } else {
        echo'<script>alert("existen campos vacios");</script>';
    }
}
    }

    

?>