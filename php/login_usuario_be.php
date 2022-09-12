<?php

session_start();

include 'conexion_be.php';

$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];
//$contrasena = hash('sha512', $contrasena); si quiero validar el incriptamiento debo aunmentar el numero de caracteres en la base de datos para contrasena//

$validar_login = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo='$correo' and contrasena='$contrasena'");

if(mysqli_num_rows($validar_login) > 0){
    $_SESSION['usuario'] = $correo;
    header("location: ../principal.php");
exit;
}else
echo'
<script>
alert("Usuario no existente");
window.location = "../index.php";
</script>
';
exit;
?>