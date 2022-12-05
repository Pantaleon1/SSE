<?php

include 'php/conexion_be.php';
$registrar = json_decode($_POST['json'],true);
foreach ($registrar as $registrar){
     $id = $registrar['id'];
     $nombre_municipio = $registrar['nombre_municipio'];
     $periodo = $registrar['periodo'];
     $nombre_atiende = $registrar['nombre_atiende'];
     $cargo_atiende = $registrar['cargo_atiende'];
     $tipo_servicio = $registrar['tipo_servicio'];
     $fecha = $registrar['fecha'];
     $sexo = $registrar['sexo'];
     $nombre = $registrar['nombre'];
     $edad = $registrar['edad'];
     $direccion = $registrar['direccion'];
     $telefono = $registrar['telefono'];
     $servicio_brindado = $registrar['servicio_brindado'];
     $guardar = mysqli_query($conexion, "INSERT INTO datos_usuaria (id, nombre_municipio, periodo, nombre_atiende, cargo_atiende, 
     tipo_servicio, fecha, sexo, nombre, edad, direccion, telefono, servicio_brindado) 
     VALUES ('$id', '$nombre_municipio','$periodo', '$nombre_atiende', '$cargo_atiende', 
     '$tipo_servicio', '$fecha', '$sexo', '$nombre', '$edad', '$direccion', '$telefono', '$servicio_brindado' )");
     
     $ejecutar = mysqli_query($conexion, $query);

    if($ejecutar){
        echo '
        <script>
        alert("Usuario almacenado exitosamente");
        window.location = "registrar.html";
        </script>
        
        ';
    }else{
        echo '
        <script>
        alert("Intentalo de nuevo, Usuario NO almacenado exitosamente");
        window.location = "registar.html";
        </script>
        
        ';
    }
     mysqli_close($conexion);
}
?>