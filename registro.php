<?php
    require'conexion/database.php';
    $db = new Database();
    $con = $db->conectar();

?>

<?php

    $usu = $_POST['doc'];
    $nom = $_POST['nom'];
    $ape = $_POST['ape'];
    $pin = $_POST['pin'];
    $pas = $_POST['pas'];
    $email = $_POST['email'];
    $tip_usu = $_POST['tip_usu'];
    echo $usu;
    echo $nom;
    echo $ape;
    echo $pin;
    echo $pas;
    echo $email;
    echo $tip_usu;

<<<<<<< HEAD
    $sql = "INSERT INTO user (nitc, nombre, direccion, telefono) VALUES (:nitc, :nombre, :direccion, :telefono)";


=======
    $sql = "INSERT INTO user (doc, name, apellido, pin, contrasena, email, id_tip_user) 
    VALUES ('$usu', '$nom', '$ape', '$pin', '$pas', '$email', '$tip_usu')";

    if ($con->query($sql) === TRUE) {
    echo "Usuario registrado exitosamente";
    } else {
    echo "Error al registrar usuario: " . $sql . "<br>" . $con->error;
    }


    $con->close();

>>>>>>> bb3fdd76e602b746b869bfbecde6877104b5db49
?>