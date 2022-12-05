<?php //inicio de un documento php

$server = "localhost:3307";// variable en jQuery ($() es un resumen o forma corta de invocar la función jQuery.)
$user = "root";
$pass = "";
$bd = "sse";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass, $bd) //variable para la coneccion con la base de datos
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

$buscar = $_POST['json']; //obtiene un valor de rBuscarMatricula.js
//generamos la consulta con el valor obtenido 
$registrar;
$id = $buscar;

$sql = "SELECT * FROM datos_usuaria WHERE id LIKE '%" . $id . "%';"; //consulta JOIN de sql
mysqli_set_charset($conexion, "utf8"); //el tipo de formato de datos que se usa es utf8

if (!$result = mysqli_query($conexion, $sql)) die(); //si los datos entre la coneccion y la consulta son correctos habra un resultado el cual se guardara en result
$registrar = array(); //creamos un array

while ($row = mysqli_fetch_array($result)) //relleno del array
{  //relleno del array segun los datos que se desean obtener de la consulta hasta que todos los datos se guarden en el
    $id = $row['id'];
    $nombre_municipio = $row['nombre_municipio'];
    $periodo = $row['periodo'];
    $nombre_atiende = $row['nombre_atiende'];
    $cargo_atiende = $row['cargo_atiende'];
    $tipo_servicio = $row['tipo_servicio'];
    $fecha = $row['fecha'];
    $sexo = $row['sexo'];
    $nombre = $row['nombre'];
    $edad = $row['edad'];
    $direccion = $row['direccion'];
    $telefono = $row['telefono'];
    $servicio_brindado = $row['servicio_brindado'];
    //Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos 
    $registrar[] = array('id'=> $id, 
    'nombre_municipio'=> $nombre_municipio, 
    'periodo'=> $periodo, 
    'nombre_atiende'=> $nombre_atiende, 
    'cargo_atiende'=> $cargo_atiende, 
    'tipo_servicio'=> $tipo_servicio,
    'fecha'=> $fecha, 
    'sexo'=> $sexo, 
    'nombre'=> $nombre, 
    'edad'=> $edad, 
    'direccion'=> $direccion, 
    'telefono'=> $telefono, 
    'servicio_brindado'=> $servicio_brindado,
 );
}

//desconectamos la base de datos
$close = mysqli_close($conexion)
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");



$json_string = json_encode($registrar); //documento json que se usa para almacenar los datos del array
echo $json_string;