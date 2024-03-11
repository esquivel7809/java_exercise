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