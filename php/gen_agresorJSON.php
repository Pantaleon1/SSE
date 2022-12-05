<?php //inicio de un documento php

$server = "localhost:3307";// variable en jQuery ($() es un resumen o forma corta de invocar la función jQuery.)
$user = "root";
$pass = "";
$bd = "sse";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass, $bd) //variable para la coneccion con la base de datos
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


//generamos la consulta
$sql = "SELECT * FROM persona_violenta;";//consulta JOIN de sql
mysqli_set_charset($conexion, "utf8"); //el tipo de formato de datos que se usa es utf8

if(!$result = mysqli_query($conexion, $sql)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$agresor = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //relleno del array
{ 
    $id = $row['id'];
    $nombre_completo = $row['nombre_completo'];
    $edad = $row['edad'];
    $sexo = $row['sexo'];
    $gra_estudio = $row['gra_estudio'];
    $ocupacion = $row['ocupacion'];
    $ingre_mes = $row['ingre_mes'];
    $adiccion = $row['adiccion'];
    $vive_usuaria = $row['vive_usuaria'];
    $antecedentes = $row['antecedentes'];
    $tipo_violencias = $row['tipo_violencias'];
    $resena = $row['resena'];
	
	

	$agresor[] = array('id'=> $id, 
    'nombre_completo'=> $nombre_completo, 
    'edad'=> $edad, 
    'sexo'=> $sexo, 
    'gra_estudio'=> $gra_estudio, 
    'ocupacion'=> $ocupacion, 
    'ingre_mes'=> $ingre_mes,
    'adiccion'=> $adiccion, 
    'vive_usuaria'=> $vive_usuaria, 
    'antecedentes'=> $antecedentes, 
    'tipo_violencias'=> $tipo_violencias, 
    'resena'=> $resena);
    

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
//$datos_usuaria['datos_usuaria'] = $datos_usuaria;
$json_string = json_encode($agresor);//documento json que se usa para almacenar los datos del array
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'datos_usuaria.json';
file_put_contents($file, $json_string);
*/
	

?>