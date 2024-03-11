<?php
    require 'conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

?>
<?php

    $usu = $_POST['doc'];
    $nom = $_POST['nom'];
    $eps = $_POST['eps'];
    $pas = $_POST['pas'];
    $email = $_POST['email'];
    $cuidad = $_POST['cuidad'];
    $tip_usu = $_POST['tip usu'];


    echo $usu;
    echo $nom;
    echo $pas;
    echo $email;
    echo $tip_usu;

    $insertSQL = $con->prepare("INSERT INTO user(usu, nom, eps, pas, email, cuidad, tip_usu) VALUES('$usu', '$nom', '$eps', '$pass_cifrado', '$email', '$cuidad', '$tip_usu')");
    $insertSQL -> execute();
    echo '<script> alert("Registro exito");</script>';

    
?>
=======
    $validar = 0;

    $doc = $_POST['doc'];
    $nom = $_POST['nom'];
    $eps = $_POST['eps'];
    $pas = $_POST['pas']; 
    $email = $_POST['email'];
    $cuidad = $_POST['cuidad'];
    $tip_usu = $_POST['tip_usu']; 

    // Prepara la consulta SQL para insertar los datos en la base de datos
    $sql = $con->prepare("SELECT * FROM user WHERE doc");
    $sql->execute();
    $fila = $sql->fetch(PDO::FETCH_ASSOC);

    if ($fila) {
        echo '<script>alert("Este usuario ya existe. Por favor cámbielo.");</script>';
        $validar = 0;
    } else {
        $cifrado = password_hash($pas, PASSWORD_DEFAULT, array("pass" => 12)); // contraseña incriptada

        $insertSQL = $con->prepare("INSERT INTO user (doc, name, contrasena, email, id_tip_user, eps, cuidad) VALUES (:doc, :nom, :cifrado, :email, :tip_usu, :eps, :cuidad)");
        $insertSQL->execute(array(':doc' => $doc, ':nom' => $nom, ':cifrado' => $cifrado, ':email' => $email, ':tip_usu' => $tip_usu, ':eps' => $eps, ':cuidad' => $cuidad));
        $validar = 1;
    
    }
?>

<script src="formulario.js"></script>
