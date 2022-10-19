<?php
require 'conexion_be.php';
//convierte el json a array
$cliente = json_decode($_POST['json'], true);//obtencion de datos del JSON
//recorrer el arreglo
foreach ($cliente as $cliente) {
    $id = $cliente['id'];
     $nombre_municipio = $cliente['nombre_municipio'];
     $periodo = $cliente['periodo'];
     $nombre_atiende = $cliente['nombre_atiende'];
     $cargo_atiende = $cliente['cargo_atiende'];
     $tipo_servicio = $cliente['tipo_servicio'];
     $fecha = $cliente['fecha'];
     $sexo = $cliente['sexo'];
     $nombre = $cliente['nombre'];
     $edad = $cliente['edad'];
     $direccion = $cliente['direccion'];
     $telefono = $cliente['telefono'];
     $servicio_brindado = $cliente['servicio_brindado'];


     $guardar = mysqli_query($con, "INSERT INTO datos_generales (id, nombre_municipio, periodo, nombre_atiende, cargo_atiende, tipo_servicio) 
     VALUES ('$id', '$nombre_municipio','$periodo', '$nombre_atiende', '$cargo_atiende', '$tipo_servicio' )");
     $guardar = mysqli_query($con, "INSERT INTO datos_usuarios (id, fecha, sexo, nombre, edad, direccion, telefono, servicio_brindado ) 
     VALUES ('$id', '$fecha', '$sexo', '$nombre', '$edad', '$direccion', '$telefono', '$servicio_brindado')");
}
?>