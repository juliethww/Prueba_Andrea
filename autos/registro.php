<?php

// Verificar si se reciben los datos del formulario
if(isset($_POST['num_serie'], $_POST['marca'], $_POST['modelo'], $_POST['año'], $_POST['tipo'])) {
    // Recibir los datos del formulario
    $num_serie = $_POST['num_serie'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $año = $_POST['año'];
    $tipo = $_POST['tipo'];

    // Establecer la conexión con la base de datos
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
    
    // Insertar los datos en la tabla autos
    $insercion = "INSERT INTO autos (id_auto, marca, modelo, año, tipo) VALUES ('$num_serie', '$marca', '$modelo', '$año', '$tipo')";
    
    // Ejecutar la consulta de inserción
    if ($conexion->query($insercion) === TRUE) {
        echo "Datos insertados correctamente en la tabla autos.";
    } else {
        echo "Error al insertar datos en la tabla autos: " . $conexion->error;
    }
    
    // Cerrar conexión
    $conexion->close();
} else {
    // Si no se reciben los datos correctamente
    echo "Error: No se recibieron todos los datos del formulario.";
}
?>
