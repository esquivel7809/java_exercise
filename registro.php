<?php
	require 'conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

    $usu = $_POST['doc'];
    $nom = $_POST['nom'];
    $pas = $_POST['pas'];
    $email = $_POST['email'];
    $tip_usu = $_POST['tip_usu'];
    $edad = $_POST['edad'];
    $telefono = $_POST['telefono'];

    $sql = "INSERT INTO user (doc, name, edad, telefono, contrasena, email, id_tip_user)
    VALUES ($usu, '$nom', $edad, $telefono, '$pas', '$email', $tip_usu)";

    echo $sql;

    if ($con->query($sql) === TRUE) {
        echo "Registro exitoso";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }


    $con->close();

  
?>