<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $doc = $_POST["doc"];
    $nom = $_POST["nom"];
    $ape = $_POST["ape"];
    $pas = password_hash($_POST["pas"], PASSWORD_DEFAULT);
    $email = $_POST["email"];
    $direc = $_POST["direc"];
    $id_tip_usu = $_POST["tip_usu"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "bd_alirio";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }
    $sql_check_doc = "SELECT * FROM user WHERE doc='$doc'";
    $result = $conn->query($sql_check_doc);

    if ($result->num_rows > 0) {
        echo "El documento ya está registrado.";
    } else {
        $sql_insert = "INSERT INTO user (doc, name, apellido, contrasena, email, direccion, id_tip_user)
                       VALUES ('$doc', '$nom', '$ape', '$pas', '$email', '$direc', '$id_tip_usu')";

        if ($conn->query($sql_insert) === TRUE) {
            echo "Registro exitoso.";
        } else {
            echo "Error al registrar: " . $conn->error;
        }
    }

    $conn->close();
} else {
    echo "<script>alert('El formulario se envió incorrectamente');</script>";
}
