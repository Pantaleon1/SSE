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
$reporte;
$id = $buscar;

$sql = "SELECT * FROM reporta_caso WHERE id LIKE '%" . $id . "%';"; //consulta JOIN de sql
mysqli_set_charset($conexion, "utf8"); //el tipo de formato de datos que se usa es utf8

if (!$result = mysqli_query($conexion, $sql)) die(); //si los datos entre la coneccion y la consulta son correctos habra un resultado el cual se guardara en result
$reporte = array(); //creamos un array

while ($row = mysqli_fetch_array($result)) //relleno del array
{  //relleno del array segun los datos que se desean obtener de la consulta hasta que todos los datos se guarden en el
    $id = $row['id'];
    $entidad_federal = $row['entidad_federal'];
    $municipio = $row['municipio'];
    $responsable = $row['responsable'];
    $person_report = $row['person_report'];
    $sexo = $row['sexo'];
    $edad = $row['edad'];
    $local_radica = $row['local_radica'];
    $telefono = $row['telefono'];
    $domicilio = $row['domicilio'];
    $grado_estu = $row['grado_estu'];
    $idioma = $row['idioma'];
    $grupo_etnico = $row['grupo_etnico'];
    $ocupacion = $row['ocupacion'];
    $parentesco = $row['parentesco'];
    //Una vez terminado el proceso se guardaran los datos en el array  creado anteriormente para poder usarlos 
    $reporte[] = array('id'=> $id, 
    'entidad_federal'=> $entidad_federal, 
    'municipio'=> $municipio, 
    'responsable'=> $responsable, 
    'person_report'=> $person_report, 
    'sexo'=> $sexo, 
    'edad'=> $edad,
    'local_radica'=> $local_radica, 
    'telefono'=> $telefono, 
    'domicilio'=> $domicilio, 
    'grado_estu'=> $grado_estu, 
    'idioma'=> $idioma,
    'grupo_etnico'=> $grupo_etnico,
    'ocupacion'=> $ocupacion,
    'parentesco'=> $parentesco,
    );
}

//desconectamos la base de datos
$close = mysqli_close($conexion)
    or die("Ha sucedido un error inexperado en la desconexion de la base de datos");



$json_string = json_encode($reporte); //documento json que se usa para almacenar los datos del array
echo $json_string;