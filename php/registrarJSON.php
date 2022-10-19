<?php //inicio de un documento php

$server = "localhost";// variable en jQuery ($() es un resumen o forma corta de invocar la función jQuery.)
$user = "root";
$pass = "";
$bd = "sse";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass,$bd) //variable para la coneccion con la base de datos
or die("Ha sucedido un error inexperado en la conexion de la base de datos");

//generamos la consulta
$sql = "SELECT t1.nombre, t1.ubicacion, t1.mueble, t1.telefono, t2.pago_mes, t2.fecha FROM 
		cliente t1 LEFT JOIN  pago t2 ON t2.mueble = t1.mueble;";//consulta JOIN de sql
mysqli_set_charset($conexion, "utf8"); //el tipo de formato de datos que se usa es utf8

if(!$result = mysqli_query($conexion, $sql)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$cliente = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //relleno del array
{ 
	$nombre=$row['nombre'];//relleno del array segun los datos que se desean obtener de la consulta
	$ubicacion=$row['ubicacion'];
	$mueble=$row['mueble'];
	$telefono=$row['telefono'];
	$pago_mes=$row['pago_mes'];
	$fecha=$row['fecha'];
	
	

	$cliente[] = array('nombre'=> $nombre, 'ubicacion'=> $ubicacion,  
	 'mueble'=> $mueble, 'telefono'=> $telefono, 'pago_mes'=> $pago_mes, 'fecha'=> $fecha );

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
//$muebleria['muebleria'] = $muebleria;
$json_string = json_encode($cliente);//documento json que se usa para almacenar los datos del array
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'muebleria.json';
file_put_contents($file, $json_string);
*/
	

?>