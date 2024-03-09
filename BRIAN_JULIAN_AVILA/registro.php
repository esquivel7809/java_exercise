<?php

// Verificar si se reciben los datos del formulario
if(isset($_POST['doc'], $_POST['nom'], $_POST['pas'], $_POST['email'], $_POST['tip_usu'], $_POST['edad'])) {
    // Recibir los datos del formulario
    $doc = $_POST['doc'];
    $nom = $_POST['nom'];
    $pas = $_POST['pas'];
    $email = $_POST['email'];
    $tip_usu = $_POST['tip_usu'];
    $edad = $_POST['edad'];
    
    // Realizar conexión a la base de datos (debes llenar estos datos con los de tu servidor)
    $servidor = "localhost"; // Cambia por tu servidor de base de datos
    $usuario = "root"; // Cambia por tu usuario de base de datos
    $password = ""; // Cambia por tu contraseña de base de datos
    $base_datos = "login"; // Cambia por el nombre de tu base de datos
    
    // Conexión
    $conexion = new mysqli($servidor, $usuario, $password, $base_datos);
    
    // Verificar conexión
    if ($conexion->connect_error) {
        die("La conexión falló: " . $conexion->connect_error);
    }
    
    // Verificar si el documento ya existe en la base de datos
    $consulta = "SELECT * FROM user WHERE doc = '$doc'";
    $resultado = $conexion->query($consulta);
    
    // Si se encontraron resultados, el documento está duplicado
    if ($resultado->num_rows > 0) {
        echo "El documento ya está registrado.";
    } else {
        // Si el documento no está duplicado, insertar los datos en la base de datos
        $insercion = "INSERT INTO user (doc, name, contrasena, email, id_tip_user, edad) VALUES ('$doc', '$nom', '$pas', '$email', '$tip_usu', '$edad')";
        
        // Ejecutar la consulta de inserción
        if ($conexion->query($insercion) === TRUE) {
            echo "Datos insertados correctamente.";
        } else {
            echo "Error al insertar datos: " . $conexion->error;
        }
    }
    
    // Cerrar conexión
    $conexion->close();
} else {
    // Si no se reciben los datos correctamente
    echo "Error: No se recibieron todos los datos del formulario.";
}
?>
