<?php

// Verificar si se reciben los datos del formulario
if(isset($_POST['doc'], $_POST['nom'], $_POST['apellido'], $_POST['email'])) {
    // Recibir los datos del formulario
    $doc = $_POST['doc'];
    $nom = $_POST['nom'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
   
    
    
    $servidor = "localhost"; 
    $usuario = "root"; 
    $password = ""; 
    $base_datos = "evaluacion"; 
    
    // Conexión
    $conexion = new mysqli($servidor, $usuario, $password, $base_datos);
    
    // Verificar conexión
    if ($conexion->connect_error) {
        die("La conexión falló: " . $conexion->connect_error);
    }
    
    // Verificar si el documento ya existe en la base de datos
    $consulta = "SELECT * FROM clientes WHERE id_cliente = '$doc'";
    $resultado = $conexion->query($consulta);
    
    // Si se encontraron resultados, el documento está duplicado
    if ($resultado->num_rows > 0) {
        echo "El documento ya está registrado.";
    } else {
        // Si el documento no está duplicado, insertar los datos en la base de datos
        $insercion = "INSERT INTO clientes (id_cliente, nombre, apellido, correo) VALUES ('$doc', '$nom', '$apellido', '$email')";
        
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
