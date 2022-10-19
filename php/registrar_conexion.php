<?php
define('DB_HOST','localhost'); //Definiendo el dominio
define('DB_USER','root');//usuario
define('DB_PASS','');//contraseña
define('DB_NAME','muebleria');//Base de datos
$con=@mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);//Peticion para la conexion
mysqli_set_charset( $con, 'utf8');
if(!$con){
    die("imposible conectarse: ".mysqli_error($con));
}
if (@mysqli_connect_errno()) {
    die("Conexión falló: ".mysqli_connect_errno()." : ". mysqli_connect_error());
}

?>