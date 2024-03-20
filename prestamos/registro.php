<?php

// Verificar si se reciben los datos del formulario
if(isset($_POST['cliente'], $_POST['auto'], $_POST['destino'], $_POST['km_inicial'], $_POST['fecha_inicio'], $_POST['fecha_fin'])) {
    // Recibir los datos del formulario
    $cliente = $_POST['cliente'];
    $auto = $_POST['auto'];
    $destino = $_POST['destino'];
    $km_inicial = $_POST['km_inicial'];
    $fecha_inicio = $_POST['fecha_inicio'];
    $fecha_fin = $_POST['fecha_fin'];

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
    
    // Insertar los datos en la tabla prestamos
    $insercion = "INSERT INTO prestamos (id_cliente, id_auto, destino, km_inicial, fecha_inicio, fecha_fin) VALUES ('$cliente', '$auto', '$destino', '$km_inicial', '$fecha_inicio', '$fecha_fin')";
    
    // Ejecutar la consulta de inserción
    if ($conexion->query($insercion) === TRUE) {
        echo "Datos insertados correctamente en la tabla prestamos.";
    } else {
        echo "Error al insertar datos en la tabla prestamos: " . $conexion->error;
    }
    
    // Cerrar conexión
    $conexion->close();
} else {
    // Si no se reciben los datos correctamente
    echo "Error: No se recibieron todos los datos del formulario.";
}
?>
