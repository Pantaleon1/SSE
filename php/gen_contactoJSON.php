<?php //inicio de un documento php

$server = "localhost:3307";// variable en jQuery ($() es un resumen o forma corta de invocar la función jQuery.)
$user = "root";
$pass = "";
$bd = "sse";

//Creamos la conexión
$conexion = mysqli_connect($server, $user, $pass, $bd) //variable para la coneccion con la base de datos
or die("Ha sucedido un error inexperado en la conexion de la base de datos");


//generamos la consulta
$sql = "SELECT * FROM primer_contacto;";//consulta JOIN de sql
mysqli_set_charset($conexion, "utf8"); //el tipo de formato de datos que se usa es utf8

if(!$result = mysqli_query($conexion, $sql)) die();//si los datos entre la coneccion y 
												   //la consulta son correctos habra un resultado el cual se guardara en result

$contacto = array(); //creamos un array

while($row = mysqli_fetch_array($result)) //relleno del array
{ 
    $id = $row['id'];
    $entidad_federativa = $row['entidad_federativa'];
    $nom_usuaria = $row['nom_usuaria'];
    $sexo = $row['sexo'];
    $loca_procedencia = $row['loca_procedencia'];
    $loca_radica = $row['loca_radica'];
    $telefono = $row['telefono'];
    $estad_civil = $row['estad_civil'];
    $grado_estudio = $row['grado_estudio'];
    $idioma = $row['idioma'];
    $grado_etnico = $row['grado_etnico'];
    $ocupacion = $row['ocupacion'];
    $tipo_atencion = $row['tipo_atencion'];
    $hijos = $row['hijos'];
    $domicilio_actual = $row['domicilio_actual'];
    $per_vi_casa = $row['per_vi_casa'];
    $per_confianza = $row['per_confianza'];
    $domi_per = $row['domi_per'];
    $telefono_per = $row['telefono_per'];
    $persona_canaliza = $row['persona_canaliza'];
	
	

	$contacto[] = array('id'=> $id, 
    'entidad_federativa'=> $entidad_federativa, 
    'nom_usuaria'=> $nom_usuaria, 
    'sexo'=> $sexo, 
    'loca_procedencia'=> $loca_procedencia, 
    'loca_radica'=> $loca_radica,
    'telefono'=> $telefono, 
    'estad_civil'=> $estad_civil, 
    'grado_estudio'=> $grado_estudio, 
    'idioma'=> $idioma, 
    'grado_etnico'=> $grado_etnico, 
    'ocupacion'=> $ocupacion, 
    'tipo_atencion'=> $tipo_atencion,
    'hijos'=> $hijos, 
    'domicilio_actual'=> $domicilio_actual, 
    'per_vi_casa'=> $per_vi_casa, 
    'per_confianza'=> $per_confianza, 
    'domi_per'=> $domi_per, 
    'telefono_per'=> $telefono_per, 
    'persona_canaliza'=> $persona_canaliza);
    

}
	
//desconectamos la base de datos
$close = mysqli_close($conexion) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
//$datos_usuaria['datos_usuaria'] = $datos_usuaria;
$json_string = json_encode($contacto);//documento json que se usa para almacenar los datos del array
echo $json_string;

//Si queremos crear un archivo json, sería de esta forma:
/*
$file = 'datos_usuaria.json';
file_put_contents($file, $json_string);
*/
	

?>