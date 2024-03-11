<?php
require 'conexion/database.php';
$db = new Database();
$con = $db->conectar();

if (isset($_GET['cod']) && $_GET['cod'] == 'datos') {
    // Recuperar datos del formulario
    $doc = $_POST['doc'];
    $nom = $_POST['nom'];
    $dic = $_POST['dic'];
    $tel = $_POST['tel'];
    $pas = $_POST['pas'];
    $email = $_POST['email'];
    $tip_usu = $_POST['tip_usu'];

    // Validar si el usuario ya está registrado
    $consulta_existencia = "SELECT * FROM user WHERE doc = :doc";
    $statement_existencia = $con->prepare($consulta_existencia);
    $statement_existencia->bindParam(':doc', $doc);
    $statement_existencia->execute();

    if ($statement_existencia->rowCount() > 0) {
        // El usuario ya está registrado
        echo '<script>alert ("El usuario ya está registrado."); </script>';
    } else {
        // El usuario no está registrado, realizar el registro
        $consulta_registro = "INSERT INTO user (doc, name, direccion, telefono, contrasena, email, id_tip_user) 
                              VALUES (:doc, :nom, :dic, :tel, :pas, :email, :tip_usu)";
        $statement_registro = $con->prepare($consulta_registro);
        $statement_registro->bindParam(':doc', $doc);
        $statement_registro->bindParam(':nom', $nom);
        $statement_registro->bindParam(':dic', $dic);
        $statement_registro->bindParam(':tel', $tel);
        $statement_registro->bindParam(':pas', $pas);
        $statement_registro->bindParam(':email', $email);
        $statement_registro->bindParam(':tip_usu', $tip_usu);

        if ($statement_registro->execute()) {
            echo '<script> ("Registro exitoso.)"; </script>';
        } else {
            echo "Error al registrar el usuario: " . $statement_registro->errorInfo()[2];
        }
    }
}
?>